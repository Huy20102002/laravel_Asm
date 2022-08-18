<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\SendMail;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Darryldecode\Cart\CartServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $cartData = Session::get('cart');
        return view('client.order.index', compact('cartData'));
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
        $this->cart = Session::get('cart');

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
        if (!Session::get('cart')) {
            $this->cart[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]  = array(
                'product_id' => $product->id,
                'product_name' => $product->name,
                'color' => $name_color,
                'color_id' => $id_color,
                'size' => $name_size,
                'size_id' => $id_size,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'image' => $request->image
            );
            Session::put('cart', $this->cart);
        } else {

            $item = Session::get('cart');
            $idCart = isset($item[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['product_id']) ? $item[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['product_id'] : '';
            if ($idCart != $product->id) {
                $this->cart[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]  = array(
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'color' => $name_color,
                    'color_id' => $id_color,
                    'size' => $name_size,
                    'size_id' => $id_size,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'image' => $request->image
                );
                Session::put('cart', $this->cart);
            }
            if ($idCart == $product->id && $item[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['color_id'] == $request->id_color &&  $item[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['size_id'] == $request->id_size) {
                $item[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['quantity'] += +$request->quantity;
                Session::put('cart', $item);
            }
            if ($idCart == $product->id && $item[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['color_id'] != $request->id_color ||  $item[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['size_id'] != $request->id_size) {
                $newcart[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]  = array(
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'color' => $name_color,
                    'color_id' => $id_color,
                    'size' => $name_size,
                    'size_id' => $id_size,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'image' => $request->image
                );
                Session::put('cart', $newcart);
            }
        }
    }

    public function showcart()
    {

        $value = Session::get('cart');
        return response()->json($value);
    }
    public function checkout()
    {
        return view('client.order.checkout');
    }
    public function save_checkout(OrderRequest $request)
    {
        $order = new Order();

        // Order
        $order->name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->country = $request->country;
        $order->district = $request->district;
        $order->zipcode = $request->zipcode;
        $order->total = $request->total;
        $order->phone = $request->phone;
        $order->status = 0;
        $order->save();

        // Cart 

        $carts = session::get('cart');

        foreach ($carts as $item) {
            $cart = new Cart();
            $Product = Product::where('id', $item['product_id'])->first();
            $cart->id_order = $order->id;
            $cart->id_product = $item['product_id'];
            $cart->id_size = $item['size_id'] ? $item['size_id'] : 0;
            $cart->id_color = $item['color_id'] ? $item['color_id'] : 0;
            $cart->quantity = $item['quantity'];
            $cart->price = $item['price'];
            $Product->quantity = $Product->quantity - $request->quantity;
            $Product->save();
            // $product->quantity = $newquantity;
            // $product->save();

            $cart->save();
        }
        // ;
        return redirect()->route('order-success');
    }
    public function order_success()
    {
        return view('client.order.success');
    }
    public function increasingQuantity(Request $request)
    {
        $product = Product::find($request->id_product);
        $id_color = null;
        $id_size = null;
        $name_size = null;
        $name_color = null;
        $this->cart = Session::get('cart');

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
        $cart = Session::get('cart');
        $idCart = isset($item[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['product_id']) ? $item[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['product_id'] : '';
        if ($idCart == $product->id && $cart[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['color_id'] == $request->id_color &&  $cart[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['size_id'] == $request->id_size) {
            $cart[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['quantity'] += +$request->quantity;
            Session::put('cart', $cart);
        }
        return response()->json(200);
    }
    public function updateQuantity(Request $request)
    {
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
        $cart = Session::get('cart');
        $idCart = isset($item[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['product_id']) ? $item[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['product_id'] : '';

        $cart[$product->id . $id_color . $id_size . str_replace(' ', '', $product->name)]['quantity'] = $request->quantity;
        Session::put('cart', $cart);
        // dd($cart);
        return redirect()->back();
    }
    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $content = '';
        if ($request->status1 == 1) {
            $order->status = $request->status1;
            $content = 'Đơn hàng của bạn đã được xác nhận';
        }
        if ($request->status2 == 2) {
            $order->status = $request->status2;
            $content = 'Đơn hàng của bạn đã được giao cho đơn vị vận chuyển';
        }
        if ($request->status3 == 3) {
            $order->status = $request->status3;
            $content = 'Đơn hàng của bạn đã được giao thành công';
        }
        $to_email = $request->email;
        $data = [
            'subject' => "Xin chào $request->name Cảm ơn bạn đã đặt hàng của chúng tôi !",
            'name' => $request->name,
            'email' => $request->email,
            'content' => $content,
            'address' => $request->address
        ];
        Mail::to($to_email)->send(new SendMail($data));

        $order->save();
        return redirect()->back();
    }
    public function cancelOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->status4;

        $order->save();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function i\
    public function listOrder()
    {
        $dataOrder = Order::select('*')->orderBy("orders.created_at",'desc')->paginate(10);
        return view('admin.order.list', ['dataOrder' => $dataOrder]);
    }
    public function orderDetail($id)
    {
        $dataDetail = Order::where('id', $id)->with('Cart')->first();
        $cart = Cart::where('id_order', $id)->with('product')->get();
        return view('admin.order.order_detail', ['dataDetail' => $dataDetail, 'cart' => $cart]);
    }

    public function delete(Request $request)
    {
        // str_replace(' ', '', $product->name)
        $cart = Session::get('cart');
        unset($cart[$request->id_product . $request->id_size . $request->id_color . str_replace(' ', '', $request->product_name)]);
        Session::put('cart', $cart);
    }
    public function deleteAll(Request $request)
    {
        Session::forget('cart');
        return redirect()->back();
    }
}
