@extends('client.layouts.layout')
@section('title', 'Sản Phẩm Chi Tiết')
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('css/products/products-details.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="content">
            <div class="products-details">
                <div class="left-productsdetails">
                    <img src="{{ asset($product->image) }}" alt="">
                </div>
                <div class="right-productsdetails">
                    <div class="name-product">
                        <a href="">{{ $product->name }}</a>
                    </div>
                    <div class="price-product">
                        <span>$ 540.00</span>
                    </div>
                    <div class="Availability">
                        <span>Tình trạng:
                            @if ($product->quantity < 1)
                                <span class="text-danger">Hết hàng</span>
                            @else
                                <span>Còn hàng</span>
                            @endif

                        </span>
                    </div>
                    <div class="rating">
                        <form class="rating">
                            <label>
                                <input type="radio" name="stars" value="1" />
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="stars" value="2" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="stars" value="3" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="stars" value="4" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="stars" value="5" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                        </form>
                    </div>
                    <div class="overview">
                        <span>Tổng quan:</span>
                        <p>{!! $product->overview !!}
                        </p>
                    </div>
                    @if ($size != null)
                        <div class="size">
                            <div class="title-size">
                                <span>Size</span>
                                <span>*</span>
                            </div>
                            <div class="main-size">


                                <select name="size" id="size">
                                    @foreach ($size as $index => $item)
                                        <option value="{{ $item }}">{{ $items_size[$index]->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if ($color != null)
                        <div class="color">
                            <div class="title-color">
                                <span>Color</span>
                                <span>*</span>
                            </div>
                            <div class="main-size">
                                <select name="color" id="color">
                                    @foreach ($color as $index => $item)
                                        <option value="{{ $item }}">{{ $items_color[$index]->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="actions_details">
                        <div class="quantity">
                            <div class="title-quantity">
                                Số Lượng:
                            </div>
                            <div class="input-quantity input-group">
                                <button onclick="decreasingquantity()">-</button>
                                <input type="text" value="1" id="quantityvalue">
                                <button onclick="increasingquantity()">+</button>

                            </div>
                        </div>

                        <div class="AddCartDetails">
                            <button onclick="addCart({{ $product, $product->product_details }})" class="btn-cartdetails">THÊM
                                VÀO GIỎ
                                HÀNG</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="sale">
                    <div class="title-sale">
                        <h5>BEST SALE</h5>
                    </div>
                    <div class="main-sale">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="item-sale">
                                <div class="item-img">
                                    <img src="http://demo.snstheme.com/html/simen/images/products/14.jpg" alt="">
                                </div>
                                <div class="item-text">
                                    <div class="item-text-title">
                                        Modular Modern
                                    </div>
                                    <div class="price-sale">
                                        <span>$ 540.00</span>
                                    </div>
                                    <div class="add-sale">
                                        <button class="btn-cart" title="Add to Cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Add to Cart</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="description">
                    <div class="description-product">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Mô tả sản
                                    phẩm</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Bình luận</a>
                            </li>

                        </ul><!-- Tab panes -->
                        <div class="tab-content border">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <p>{!! $product->description !!}</p>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="form-comment">
                                    <div class="rating card-header">
                                        <form class="rating m-3">
                                            <label>
                                                <input type="radio" name="stars" value="1" />
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="stars" value="2" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="stars" value="3" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="stars" value="4" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="stars" value="5" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                        </form>
                                    </div>
                                    <div class="form-comment m-3">
                                        @php
                                            $Auth = Auth::user();
                                        @endphp
                                        @if (Auth::user())
                                            <form action="{{ route('addComment') }}" method="post">
                                                @csrf

                                                <input type="hidden" name="id_user" value="{{ $Auth->id }}">
                                                <input type="hidden" name="id_product" value="{{ $product->id }}">
                                                <textarea name="content" id="comment-products" rows="3" placeholder="Viết gì đó..."></textarea>
                                                <div class="form-comment-post">
                                                    <button class="post-comment">Bình luận</button>
                                                </div>
                                            </form>
                                        @else
                                            Vui lòng đăng nhập để bình luận ! Xin cảm ơn
                                        @endif
                                        <div class="list-comment">
                                            @foreach ($comment as $cm)
                                                <div class="profile-comment">
                                                    <div class="img-profile">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt_NZykul07nU3cliFuRZQr4_q-gOdkRTmRA&usqp=CAU"
                                                            class="rounded-circle" alt="" width="50">
                                                    </div>
                                                    <div class="text-comment">
                                                        <div class="name-profile">
                                                            {{ $cm->user->name }}
                                                        </div>
                                                        <p class="text-xs">{{ $cm->content }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="related-product">
                        <div class="title-related mt-3">
                            <h6 class="">Sản phẩm liên quan</h6>
                        </div>

                        <div class="products_content product_related_slick">
                            @foreach ($related_product as $related)
                                <div class="products_grid">
                                    <div class="ico-label">
                                        <span class="ico-product ico-new">New</span>
                                        <span class="ico-product ico-sale">Sale</span>
                                    </div>
                                    <a href="{{ route('products-details', $related->id) }}">
                                        <div class="products_img">

                                            <img src="{{ asset($related->image) }}" alt="">
                                        </div>
                                    </a>
                                    <div class="products_text">
                                        <div class="item-title">
                                            <a href="">{{ $related->name }}</a>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box">
                                                <span class="price1">$ 540.00</span>
                                                <span class="price2">$ 600.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-bot">
                                        <div class="wrap-addTocart">
                                            <button class=" btn-cart" title="Add To Cart">Chi Tiết Sản Phẩm</button>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                <li>
                                                    <a class="link-wishlist" href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" href="#" title="Add to Compare">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </li>
                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                    <div class="quickview-wrap">
                                                        <a class="sns-btn-quickview qv_btn" href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- Add To Cart --}}
    <script src="{{ asset('js/order/Cart.js') }}"></script>
    <script>
        $(':radio').change(function() {
            console.log('New star rating: ' + this.value);
        });
        $('#comment-products').autoResize();
        $('#comment-products').keyup(function() {

            if (($(this).val().length) >= 100) {
                $(this).addClass("change-style-textarea");
            } else {
                $(this).removeClass("change-style-textarea");
            }


        });
    </script>
    <script>
        $(document).ready(function() {
            $('.products_content').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                draggable: true,
                autoplay: true,
                prevArrow: ``,
                nextArrow: ``,
                responsive: [{
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            arrows: false,
                            infinite: false,
                        },
                    },
                ],
            });

        });
    </script>

@endsection
