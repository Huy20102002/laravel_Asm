@extends('client.layouts.layout')
@section('title', 'Sản Phẩm Chi Tiết')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/products/products-details.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="content">
            <div class="products-details">
                <div class="left-productsdetails">
                    <img src="http://demo.snstheme.com/html/simen/images/products/13.jpg" alt="">
                </div>
                <div class="right-productsdetails">
                    <div class="name-product">
                        <a href="">Modular Modern</a>
                    </div>
                    <div class="price-product">
                        <span>$ 540.00</span>
                    </div>
                    <div class="Availability">
                        <span>Tình trạng: Còn hàng</span>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel magna quis risus commodo
                            porttitor. Praesent rutrum lectus diam, ac consequat dolor hendrerit sit amet. Nulla tincidunt
                            tempor nulla et fermentum. Maecenas tempor massa sed sodales dignissim
                        </p>
                    </div>
                    <div class="size">
                        <div class="title-size">
                            <span>Size</span>
                            <span>*</span>
                        </div>
                        <div class="main-size">
                            <select name="" id="">
                                <option value="">S</option>
                                <option value="">M</option>
                                <option value="">L</option>
                                <option value="">XL</option>
                            </select>
                        </div>
                    </div>
                    <div class="color">
                        <div class="title-color">
                            <span>Color</span>
                            <span>*</span>
                        </div>
                        <div class="main-size">
                            <select name="" id="">
                                <option value="">White</option>
                                <option value="">Black</option>
                                <option value="">Yellow</option>
                                <option value="">Green</option>
                            </select>
                        </div>
                    </div>
                    <div class="actions_details">
                        <div class="quantity">
                            <div class="title-quantity">
                                Số Lượng:
                            </div>
                            <div class="input-quantity input-group">
                                <button>-</button>
                                <input type="text">
                                <button>+</button>
                            </div>
                        </div>
                        <div class="AddCartDetails">
                            <button class="btn-cartdetails">ADD TO CART</button>
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
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum maiores similique hic
                                    repellendus atque nihil architecto dolores quisquam consequuntur nostrum, nisi sapiente
                                    animi quod non quia eum! Consequuntur, repellendus ducimus.</p>
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
                                        <textarea id="comment-products" rows="3" placeholder="Viết gì đó..."></textarea>
                                        <div class="form-comment-post">
                                            <a href="#" class="post-comment">Bình luận</a>
                                        </div>
                                        <div class="list-comment">
                                            @for ($i = 0; $i < 10; $i++)
                                                <div class="profile-comment">
                                                    <div class="img-profile">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt_NZykul07nU3cliFuRZQr4_q-gOdkRTmRA&usqp=CAU"
                                                            class="rounded-circle" alt="" width="50">
                                                    </div>
                                                    <div class="text-comment">
                                                        <div class="name-profile">
                                                            Admin
                                                        </div>
                                                        <p>Sản phẩm ok</p>
                                                    </div>
                                                </div>
                                            @endfor
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
                            @for ($i = 0; $i <= 7; $i++)
                                <div class="products_grid">
                                    <div class="ico-label">
                                        <span class="ico-product ico-new">New</span>
                                        <span class="ico-product ico-sale">Sale</span>
                                    </div>
                                    <div class="products_img">
                                        <a href="{{ route('products-details', $i) }}">
                                            <img src="http://demo.snstheme.com/html/simen/images/products/1.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="products_text">
                                        <div class="item-title">
                                            <a href="">Modular Modern</a>
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
                                            <button class=" btn-cart" title="Add To Cart">Add To Cart</button>
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
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
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
