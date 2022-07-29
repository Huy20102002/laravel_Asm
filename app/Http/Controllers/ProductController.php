<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Product_detail;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexAdmin()
    {
        $all = Product::select('*')->with(['category'])
            ->paginate(10);
        return view('admin.product.index', ['data' => $all]);
    }

    public function index()
    {
        return view('client.products.index');
    }
    public function indexDetails($id)
    {
        return view('client.products.products-details');
    }
    public function create()
    {
        $dataCate = Category::all();
        $dataSize = Size::all();
        $dataColor = Color::all();
        return view(
            'admin.product.add',
            [
                'dataCate' => $dataCate,
                'dataSize' => $dataSize,
                'dataColor' => $dataColor
            ]
        );
    }
    public function store(ProductRequest $request)
    {

        $product = new Product();
        $product_detail = new Product_detail();
        $product->fill($request->all());
        if ($request->hasFile('image')) {
            $product->image = $this->saveFile(
                $request->image,
                $request->name,
                'image/product'
            );
        }
        if ($request->sale == 1) {
            $price_sale = $request->price * (100 - $request->discount) / 100;
        } else {
            $price_sale = 0;
        }
        $product_detail->fill($request->all());
        $product->save();
        $product_detail->product_id = $product->id;
        $product_detail->price_sale = $price_sale;
        $product_detail->size_id = json_encode($request->size_id);
        $product_detail->color_id = json_encode($request->color_id);
        $product_detail->view = 0;
        $product_detail->save();
        return redirect()->route('admin.products.index');
    }
    public function show($id)
    {
        $data = Product::find($id);
        $dataCate = Category::all();
        return response()->json(['data' => $data, 'dataCate' => $dataCate]);
    }
    public function edit($id)
    {
        $dataCate = Category::all();
        $dataSize = Size::all();
        $dataColor = Color::all();
        $data = Product::find($id);

        $data_detail = $data->product_detail;
        $detail_size = json_decode($data_detail->size_id);
        $detail_color = json_decode($data_detail->color_id);
        return view('admin.product.edit', [
            'data' => $data,
            'data_detail' => $data_detail,
            'dataCate' => $dataCate,
            'dataSize' => $dataSize,
            'dataColor' => $dataColor,
            'detail_color' => $detail_color,
            'detail_size' => $detail_size,
        ]);
    }
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $data_detail = $product->product_detail;
        $product_detail = Product_detail::find($data_detail->id);
        if ($request->hasFile('image')) {
            $request->image = $this->saveFile(
                $request->image,
                $request->name,
                'image/product'
            );
        } else {
            $product->image = $product->image;
        }
        if ($request->sale == 1) {
            $price_sale = $request->price * (100 - $request->discount) / 100;
        } else {
            $price_sale = 0;
        }
        $product_detail->fill($request->all());
        $product->save();
        $product_detail->product_id = $product->id;
        $product_detail->price_sale = $price_sale;
        $product_detail->size_id = json_encode($request->size_id);
        $product_detail->color_id = json_encode($request->color_id);
        $product_detail->view = 0;
        $product_detail->save();
        return redirect()->route('admin.products.index');
    }
    public function apiUpdate(ProductRequest $request, $id)
    {
        $product =  Product::find($id);
        $product->fill($request->all());
        if ($request->hasFile('image')) {
            $product->image = $this->saveFile(
                $request->image,
                $request->name,
                'image/product'
            );
        } else {
            $product->image = $product->image;
        }
        $product->save();
        return response()->json(200);
    }
    private function saveFile($file, $prefixName = '', $folder = 'public')
    {
        $fileName = $file->hashName();
        $fileName = $prefixName ? $prefixName . '_' . $fileName : $fileName;
        return $file->storeAs($folder, $fileName);
    }
    public function destroy($id)
    {

        $product = Product::find($id);
        $product->delete();
        Product_detail::where('product_id', $id)->delete();
        return redirect()->back();
    }
}
