@extends('client.layouts.layout')
@section('title', 'Giỏ Hàng')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cart/style.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="content mt-4 mb-4">
            <h3>Giỏ Hàng</h3>

            <div class="shopping-cart">

                <div class="column-labels">
                    <label class="product-image">Ảnh</label>
                    <label class="product-details">Sản Phẩm</label>
                    <label class="product-price">Giá Tiền</label>
                    <label class="product-quantity">Số lượng</label>
                    <label class="product-removal">Xóa</label>
                    <label class="product-line-price">Tổng</label>
                </div>
                @php
                $total = 0;
            @endphp
                @foreach ($cart as $cars)
                    <div class="product">
                        <div class="product-image">
                            <img src="{{ asset($cars['image']) }}">
                        </div>
                        <div class="product-details">
                            <div class="product-title">{{ $cars['product_name'] }}</div>
                            <p class="product-description">The best dog bones of all time. Holy crap. Your dog will be
                                begging
                                for these things! I got curious once and ate one myself. I'm a fan.</p>
                        </div>
                      
                        <div class="product-price">{{ $cars['price'] }}</div>
                        @php
                            $sum = $cars['price'] * $cars['quantity'];
                            $total+=$sum;
                        @endphp
                        <div class="product-quantity">
                            <input type="number" value="{{ $cars['quantity'] }}" min="1">
                        </div>
                        <div class="product-removal">
                            <button class="remove-product">
                                Xóa
                            </button>
                        </div>
                        <div class="product-line-price">{{ $cars['price'] * $cars['quantity'] }}</div>
                    </div>
                @endforeach
                <div class="totals">
                    <div class="totals-item">
                        <label>Tạm tính</label>
                        <div class="totals-value" id="cart-subtotal">{{ $total }}</div>
                    </div>
                    <div class="totals-item">
                        <label>Thuế (5%)</label>
                        @php
                           $fax =  5*$total /100;
                        @endphp
                        <div class="totals-value" id="cart-tax">{{$fax}}</div>
                    </div>
                    <div class="totals-item">
                        <label>Tiền ship</label>
                        <div class="totals-value" id="cart-shipping">15.00</div>
                    </div>
                    @php
                    $total_price = $fax + $total;
                    @endphp
                    <div class="totals-item totals-item-total">
                        <label>Tổng tiền</label>
                        <div class="totals-value" id="cart-total">{{$total_price}}</div>
                    </div>
                </div>

                <button class="checkout">Thanh Toán</button>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        /* Set rates + misc */
        var taxRate = 0.05;
        var shippingRate = 15.00;
        var fadeTime = 300;


        /* Assign actions */
        $('.product-quantity input').change(function() {
            updateQuantity(this);
        });

        $('.product-removal button').click(function() {
            removeItem(this);
        });


        /* Recalculate cart */
        function recalculateCart() {
            var subtotal = 0;

            /* Sum up row totals */
            $('.product').each(function() {
                subtotal += parseFloat($(this).children('.product-line-price').text());
            });

            /* Calculate totals */
            var tax = subtotal * taxRate;
            var shipping = (subtotal > 0 ? shippingRate : 0);
            var total = subtotal + tax + shipping;

            /* Update totals display */
            $('.totals-value').fadeOut(fadeTime, function() {
                $('#cart-subtotal').html(subtotal.toFixed(2));
                $('#cart-tax').html(tax.toFixed(2));
                $('#cart-shipping').html(shipping.toFixed(2));
                $('#cart-total').html(total.toFixed(2));
                if (total == 0) {
                    $('.checkout').fadeOut(fadeTime);
                } else {
                    $('.checkout').fadeIn(fadeTime);
                }
                $('.totals-value').fadeIn(fadeTime);
            });
        }


        /* Update quantity */
        function updateQuantity(quantityInput) {
            /* Calculate line price */
            var productRow = $(quantityInput).parent().parent();
            var price = parseFloat(productRow.children('.product-price').text());
            var quantity = $(quantityInput).val();
            var linePrice = price * quantity;

            /* Update line price display and recalc cart totals */
            productRow.children('.product-line-price').each(function() {
                $(this).fadeOut(fadeTime, function() {
                    $(this).text(linePrice.toFixed(2));
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        }


        /* Remove item from cart */
        function removeItem(removeButton) {
            /* Remove row from DOM and recalc cart total */
            var productRow = $(removeButton).parent().parent();
            productRow.slideUp(fadeTime, function() {
                productRow.remove();
                recalculateCart();
            });
        }
    </script>
@endsection
