<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Product_detail;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $all = Product::select('*')->with(['category'])
            ->with('product_detail')
            ->paginate(20);
        $allCate = Category::select('name', 'id')->get();
        $Size = Size::select('name', 'id')->get();
        return view('client.products.index', ['data' => $all, 'dataCate' => $allCate, 'dataSize' => $Size]);
    }
    public function indexDetails($id)
    {
        $product = Product::where('id', $id)
            ->select('*')
            ->with('product_detail')
            ->with('size')
            ->first();
        $items_size = array();
        $items_color = array();
        $product_detail = Product_detail::where('product_id', $product->id)->first();
        $size = json_decode($product->product_detail->size_id);
        $color = json_decode($product->product_detail->color_id);
        $comment = Comment::where('id_product',$id)->with('User')->get();
        $related_product = Product::where('category_id',$product->category_id)->get();
            if($size != null){
            foreach ($size as $value) {
                $items_size[] = Size::find($value);
            }
        }
        if ($color != null) {
            foreach ($color as $value) {
                $items_color[] = Color::find($value);
            }
        }
        return view('client.products.products-details', [
            'product' => $product,
            'comment'=>$comment,
            'related_product'=>$related_product,
            'size' => $size, 'items_size' => $items_size, 'color' => $color, 'items_color' => $items_color
        ]);
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
            $price_sale = $request->price *  $request->discount / 100;
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
        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công');
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
        $product_size  = json_decode($data_detail->size_id);
        $product_color  = json_decode($data_detail->color_id);
        $items_color = array();
        $items_size = array();
        if ($product_color != null) {
            foreach ($product_color as $value) {
                $items_color[] = $value;
            }
        }
        if ($product_size != null) {
            foreach ($product_size as $value) {
                $items_size[] = $value;
            }
        }


        return view('admin.product.edit', [
            'data' => $data,
            'data_detail' => $data_detail,
            'dataCate' => $dataCate,
            'dataSize' => $dataSize,
            'dataColor' => $dataColor,
            'product_size' => $product_size,
            'product_color' => $product_color,
            'items_color' =>  $items_color,
            'items_size' => $items_size

        ]);
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data_detail = $product->product_detail;
        $product_detail = Product_detail::find($data_detail->id);
        $product->fill($request->all());
        if ($request->hasFile('thumb_img')) {
            $product->image = $request->image = $this->saveFile(
                $request->thumb_img,
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
        $product->save();
        $product_detail->fill($request->all());
        $product_detail->product_id = $product->id;
        $product_detail->price_sale = $price_sale;
        $product_detail->size_id = json_encode($request->size_id);
        $product_detail->color_id = json_encode($request->color_id);
        $product_detail->view = 0;
        $product_detail->save();
        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công');
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
        unlink($product->image);
        Product_detail::where('product_id', $id)->delete();
        return redirect()->back();
    }
}
