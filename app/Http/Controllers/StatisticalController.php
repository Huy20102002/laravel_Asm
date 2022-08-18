<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stacials.index');
    }
    public function comment()
    {
        //   $data = Comment::
        $data_product = Product::select('*')->withCount('comment')->paginate(20);
        return view('admin.stacials.comment', ['data_product' => $data_product]);
    }
    public function comment_detail($id){
        $details_comment = Comment::where('id_product',$id)->with('User')->get();
        $data_product = Product::find($id);
        return view('admin.stacials.details_comment',['details_comment'=>$details_comment,'data_product'=>$data_product]);
    }
    public function order()
    {
            $cart = Cart::join('products','carts.id_product','=','products.id')
            
          ->select('carts.id_product','carts.quantity as cartquantity')->groupBy('carts.id_product','carts.quantity')->get();
                        return view('admin.stacials.order',['cart'=>$cart]);
    }
    public function destroyComment($id)
    {
        Comment::destroy($id);
        return redirect()->back();
    }
}
