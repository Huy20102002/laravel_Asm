@extends('client.layouts.layout')
@section('title', 'Thanh Toán')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cart/checkout.css') }}">
@endsection
@section('content')
    <div class="container bg-light mt-5 mb-3">
        <h2 class="p-3">Thông tin thanh toán</h2>
        <div class="row">
            <div class="col-75">
                <div class="container ">
                    <form action="{{ route('save-checkout') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-50">
                                <h3>Địa chỉ</h3>
                                @php
                                    $sum = 0;
                                @endphp
                                @foreach (Session::get('cart') as $item)
                                    @php
                                        $total = $item['price'] * $item['quantity'];
                                        $sum += $total;
                                    @endphp
                                @endforeach
                                <input type="hidden" name="total" value="{{ $sum }}">
                                <label for="fname"><i class="fa fa-user"></i>Họ và tên</label>
                                <input type="text" id="fname" name="name" placeholder="John M. Doe">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif

                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="email" placeholder="john@example.com">
                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="phone">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">
                                        {{ $errors->first('phone') }}
                                    </span>
                                @endif
                                <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
                                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                                @if ($errors->has('address'))
                                    <span class="text-danger">
                                        {{ $errors->first('address') }}
                                    </span>
                                @endif
                                <label for="city"><i class="fa fa-institution"></i>Thành phố</label>
                                <input type="text" id="city" name="country" placeholder="New York">
                                @if ($errors->has('country'))
                                    <span class="text-danger">
                                        {{ $errors->first('country') }}
                                    </span>
                                @endif
                                <div class="row">
                                    <div class="col-50">
                                        <label for="state">Quận / Huyện</label>
                                        <input type="text" id="state" name="district" placeholder="NY">
                                    </div>

                                    <div class="col-50">
                                        <label for="zip">Zip</label>
                                        <input type="text" id="zip" name="zipcode" placeholder="10001">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <label>
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                        </label>
                        <button type="submit" class="btn">Thanh Toán</button>
                    </form>
                </div>
            </div>
            <div class="col-25">
                <div class="container">

                    <h4>Sản phẩm <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i>
                            <b>{{ count(Session::get('cart')) }}</b></span></h4>
                    @foreach (Session::get('cart') as $item)
                        <p><a href="#" class="text-dark">{{ $item['product_name'] }}</a> <span
                                class="price text-dark">{{ $item['price'] }}</span></p>
                        <img src="{{ asset($item['image']) }}" width="100" alt="">
                        @php
                            $total = $item['price'] * $item['quantity'];
                            $sum += $total;
                        @endphp
                    @endforeach


                    <hr>
                    <p>Tổng tiền <span class="price" style="color:black"><b>{{ $sum }}</b></span></p>
                </div>
            </div>
        </div>

    </div>
@endsection
