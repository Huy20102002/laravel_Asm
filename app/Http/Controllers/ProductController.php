<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexAdmin()
    {
        return view('admin.product.index');
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
        return view('admin.product.add', ['dataCate' => $dataCate]);
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
    public function edit($id)
    {
        return view('admin.product.edit');
    }
    public function update(ProductRequest $request, $id)
    {
    }
    private function saveFile($file, $prefixName = '', $folder = 'public')
    {
        $fileName = $file->hashName();
        $fileName = $prefixName ? $prefixName . '_' . $fileName : $fileName;
        return $file->storeAs($folder, $fileName);
    }
}
