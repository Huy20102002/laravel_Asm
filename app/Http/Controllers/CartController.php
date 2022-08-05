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

    public function index()
    {
        return view('client.order.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $userId = auth()->user()->id;
        $product = Product::find($request->id_product);
        $id_color = null;
        $id_size = null;
        $name_size = null;
        $name_color = null;
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
        $cart = array();
        if (!Session::get('cart')) {
            $cart[] = [
                'userId' => $userId,
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

            Session::put('cart', $cart);
        } else {

            // $cart = Session::get('cart')['product_id'];
            $cart = Session::get('cart');
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['product_id'] == $request->id_product && ($cart[$i]['color_id'] == $id_color && $cart[$i]['size_id'] == $id_size)) {
                    $cart[$i]['quantity'] += +$request->quantity;
                    session::put('cart', $cart);
                    // dd($cart);
                }
                if ($cart[$i]['product_id'] == $request->id_product && ($cart[$i]['color_id'] != $id_color || $cart[$i]['size_id'] != $id_size)) {
                    $cart_properties = [
                        'userId' => $userId,
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
                    array_push($cart, $cart_properties);
                    session::put('cart', $cart);

                }
            }
            // Check product_id exist in $cart
            $key = array_search($request->id_product, array_column($cart, 'product_id'));
        
            if ($cart[$key]['product_id'] != $request->id_product) {
                $newcart = [
                    'userId' => $userId,
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
                array_push($cart, $newcart);
            }
            Session::put('cart', $cart);

        }
    }
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
    public function show($id)
    {
        //
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
