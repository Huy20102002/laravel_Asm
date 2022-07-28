<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexAdmin()
    {
        $all = Product::all();
        return view('admin.product.index',['data'=>$all]);
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
        return view('admin.product.add',
         ['dataCate' => $dataCate,
         'dataSize'=>$dataSize,
         'dataColor'=>$dataColor]);
    }
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        if ($request->hasFile('image')) {
            $product->image = $this->saveFile(
                $request->image,
                $request->name,
                'image/product'
            );
        }
        $product->save();
        return redirect()->route('admin.products.index');
    }
    public function show($id){
        $data = Product::find($id);
        $dataCate = Category::all();
        return response()->json(['data'=>$data,'dataCate'=>$dataCate]);
    }
    public function edit($id)
    {
        return view('admin.product.edit');
    }
    public function update(ProductRequest $request, $id)
    {
            
    }
    public function apiUpdate(ProductRequest $request,$id){
        $product =  Product::find($id);
        $product->fill($request->all());
        if ($request->hasFile('image')) {
            $product->image = $this->saveFile(
                $request->image,
                $request->name,
                'image/product'
            );
        }else{
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
    public function destroy($id){
        
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
