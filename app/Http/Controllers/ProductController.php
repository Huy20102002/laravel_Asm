<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('client.products.index');
    }
    public function indexDetails($id){
        return view('client.products.products-details');
    }
}
