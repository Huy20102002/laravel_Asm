<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        return view('admin.stacials.order');
    }
    public function destroyComment($id)
    {
        Comment::destroy($id);
        return redirect()->back();
    }
}
