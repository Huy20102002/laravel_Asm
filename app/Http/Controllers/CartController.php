<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Darryldecode\Cart\CartServiceProvider;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cart = array();
    public function index()
    {
        $this->cart = Session::get('cart');
        return view('client.order.index', ['cart' =>  $this->cart]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = Product::find($request->id_product);
        $id_color = null;
        $id_size = null;
        $name_size = null;
        $name_color = null;
        $i_array = null;
        dd($request);
        $quantity = $request->quantity;
        if ($request->id_color != null) {
            $color = Color::find($request->id_color);
            $id_color = $color->id;
            $name_color = $color->name;
        }
        if ($request->id_size != null) {
            $size = Size::find($request->id_size);
            $id_size = $size->id;
            $name_size = $size->name;
        }
     
            $this->cart[] = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'color' => $name_color,
                'color_id' => $id_color,
                'size' => $name_size,
                'size_id' => $id_size,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'image' => $request->image
            ];

            Session::put('cart', $this->cart);
        } 

    // public function showa()
    // {
    //     if (!Session::get('cart')) {
    //         $this->cart[] = [
    //             'product_id' => $product->id,
    //             'product_name' => $product->name,
    //             'color' => $name_color,
    //             'color_id' => $id_color,
    //             'size' => $name_size,
    //             'size_id' => $id_size,
    //             'price' => $request->price,
    //             'quantity' => $request->quantity,
    //             'image' => $request->image
    //         ];

    //         Session::put('cart', $this->cart);
    //     } else {
    //         $this->cart = Session::get('cart');

    //         $size = array_search($request->id_color, array_column($this->cart, 'size_id'));
    //         $color = array_search($request->id_color, array_column($this->cart, 'color_id'));
    //         $key = array_search($request->id_product, array_column($this->cart, 'product_id'));
    //         if ($this->cart[$key]['product_id'] == $request->id_product) {
    //             for ($i = 0; $i < count($this->cart); $i++) {
    //                 if ($this->cart[$i]['product_id'] == $request->id_product && $this->cart[$i]['color_id'] == $id_color && $this->cart[$i]['size_id'] == $id_size) {
    //                     $this->cart[$i]['quantity'] += +$request->quantity;
    //                     Session::put('cart', $this->cart);
    //                 }
    //             }
    //         }
    //         if ($this->cart[$key]['product_id'] != $request->id_product) {
    //             $newcarts = [
    //                 'product_id' => $product->id,
    //                 'product_name' => $product->name,
    //                 'color' => $name_color,
    //                 'color_id' => $id_color,
    //                 'size' => $name_size,
    //                 'size_id' => $id_size,
    //                 'price' => $request->price,
    //                 'quantity' => $request->quantity,
    //                 'image' => $request->image
    //             ];
    //             array_push($this->cart, $newcarts);
    //             Session::put('cart', $this->cart);
    //         }
    //         if ($this->cart[$key]['product_id'] == $request->id_product) {
    //             if ($this->cart[$key]['color_id'] != $id_color || $this->cart[$key]['size_id'] != $id_size) {
    //                 $cart[] = [
    //                     'product_id' => $product->id,
    //                     'product_name' => $product->name,
    //                     'color' => $name_color,
    //                     'color_id' => $id_color,
    //                     'size' => $name_size,
    //                     'size_id' => $id_size,
    //                     'price' => $request->price,
    //                     'quantity' => $request->quantity,
    //                     'image' => $request->image
    //                 ];
    //                 Session::put('cart', array_push($this->cart, $cart));
    //             }
    //         }
    //     }
    // }
    public function showcart()
    {
        $userId = auth()->user()->id;

        $value = Session::get('cart');
        return response()->json($value);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cartDetail()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
