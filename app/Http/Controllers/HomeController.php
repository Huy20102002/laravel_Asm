<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {


        $newproduct = Product::limit(10)
            ->orderBy("products.created_at")
            ->get();
        $suggestProduct = Product::limit(10)
        ->orderBy('products.view')
        ->get();
        return view('client.home.index',['newproduct'=>$newproduct,'suggestProduct'=>$suggestProduct]);
    }
}
