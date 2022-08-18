@extends('client.layouts.layout')
@section('title', 'Giỏ Hàng')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cart/style.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="content mt-4 mb-4">
            <h3>Giỏ Hàng</h3>
            <div class="mb-3">
                <form action="{{ route('delete-cart-all') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-primary">Xóa tất cả</button>
                </form>
            </div>
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
                @foreach ($cartData as $cart)
                    <div class="product">
                        <div class="product-image">
                            <img src="{{ asset($cart['image']) }}">
                        </div>
                        <div class="product-details">
                            <div class="product-title">{{ $cart['product_name'] }}</div>
                            <p class="product-description">
                            <p> Kích thước: {{ $cart['size'] }}</p>
                            <p> Màu sắc: {{ $cart['color'] }}</p>
                            </p>
                        </div>

                        <div class="product-price">{{ $cart['price'] }}</div>
                        @php
                            $sum = $cart['price'] * $cart['quantity'];
                            $total += $sum;
                        @endphp
                        <div class="product-quantity">
                            <form action="{{route('updateQuantity')}}" method="post">
                                @csrf
                                <input type="number" value="{{ $cart['quantity'] }}" name="quantity" min="1">
                                <input type="hidden" name="id_product" value="{{ $cart['product_id'] }}">
                                <input type="hidden" name="id_color" value="{{$cart['color_id']}}">
                                <input type="hidden" name="id_size"value="{{$cart['size_id']}}" >
                                <input type="hidden" name="product_name" value="{{$cart['product_name']}}">
                                <button class="btn btn-sm btn-primary">Cập nhập</button>
                            </form>

                        </div>
                        <div class="product-removal">
                            <button
                                onclick="removeCart('{{ $cart['product_id'] }}','{{ $cart['color_id'] }}','{{ $cart['size_id'] }}','{{ $cart['product_name'] }}')"
                                class="remove-product">
                                Xóa
                            </button>
                        </div>
                        <div class="product-line-price">{{ $cart['price'] * $cart['quantity'] }}</div>
                    </div>
                @endforeach
                <div class="totals">
                    <div class="totals-item">
                        <label>Tạm tính</label>
                        <div class="totals-value" id="cart-subtotal">{{ $total }}</div>
                    </div>
                  
                   
                </div>

                <a href="{{ route('checkout') }}" class="checkout">Thanh Toán</a>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/order/Cart.js') }}"></script>
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
        const removeCart = async (id_product, id_size, id_color, product_name) => {
            let data_product = {
                id_product,
                id_size,
                id_color,
                product_name
            }
            await config.post('delete_cart', data_product);
        }
        // const 

        /* Remove item from cart */
        const removeItem = async (removeButton) => {
            /* Remove row from DOM and recalc cart total */
            var productRow = $(removeButton).parent().parent();
            productRow.slideUp(fadeTime, function() {
                productRow.remove();
                recalculateCart();
            });
        };
    </script>
@endsection
