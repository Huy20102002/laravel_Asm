@extends('client.layouts.layout')
@section('title', 'Trang Chủ')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="banner pt-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <img class="d-block w-100" src="https://picsum.photos/1200/600" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://picsum.photos/1200/600" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://picsum.photos/1200/600" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="content">
            <div class="head_content">
                <ul class="nav-category">
                    <li class="latest" role="presentation">
                        <a href="">Latest</a>
                    </li>
                    <li class="saleoff">
                        <a href="" role="presentation">Sale Off</a>
                    </li>
                    <li>
                        <a href="" role="presentation">Best Sale</a>
                    </li>
                </ul>
            </div>
            <div class="main_products">
                <div class="products_content">
                    <div class="products_grid">
                        <div class="ico-label">
                            <span class="ico-product ico-new">New</span>
                            <span class="ico-product ico-sale">Sale</span>
                        </div>
                        <div class="products_img">
                            <img src="http://demo.snstheme.com/html/simen/images/products/1.jpg" alt="">
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
                    <div class="products_grid">
                        <div class="products_img">
                            <img src="http://demo.snstheme.com/html/simen/images/products/1.jpg" alt="">
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
                    <div class="products_grid">
                        <div class="products_img">
                            <img src="http://demo.snstheme.com/html/simen/images/products/1.jpg" alt="">
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
                    <div class="products_grid">
                        <div class="products_img">
                            <img src="http://demo.snstheme.com/html/simen/images/products/1.jpg" alt="">
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
                    </div>
                    <div class="products_grid">

                        <div class="products_img">
                            <img src="http://demo.snstheme.com/html/simen/images/products/1.jpg" alt="">
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
                    </div>
                    <div class="products_grid">
                        <div class="products_img">
                            <img src="http://demo.snstheme.com/html/simen/images/products/1.jpg" alt="">
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
                    </div>
                </div>
                <div class="suggest_collection">
                    <div class="title_collection">
                        <h2>Sản phẩm đề xuất</h2>
                    </div>
                    <div class="office-chair">
                        <div class="main_off_chair">
                            <div class=" products_content_slick">
                                @for($i=0;$i<10;$i++)
                                <div class="products_grid m-1">
                                    <div class="products_img">
                                        <img src="http://demo.snstheme.com/html/simen/images/products/1.jpg"
                                            alt="">
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
                        <div class="banner_chair">
                            <div class="main_banner">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="banner-content banner5">
                                            <a href="">
                                                <img src="http://demo.snstheme.com/html/simen/images/banner12.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="banner-content">
                                            <a href="">
                                                <img src="http://demo.snstheme.com/html/simen/images/banner13.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="banner-content">
                                            <a href="">
                                                <img src="http://demo.snstheme.com/html/simen/images/banner14.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-latest">
                    <div class="title-postest">
                        <h5>Bài viết mới nhất</h5>
                    </div>
                    <div class="main-post">
                        <div class="posts-item">
                            <div class="img-posts">
                                <a href="">
                                    <img src="http://demo.snstheme.com/html/simen/images/blog/blog7.jpg" alt="">
                                </a>
                            </div>
                            <div class="text-posts">
                             <div class="blog-left">
                                <span class="text1">05</span>
                                <span class="text2">JAN</span>
                             </div>
                             <div class="blog-right">
                                <p class="style1">
                                    <a href="">Chair furnitured</a>
                                </p >
                                <p class="style2">Lorem Ipsum has been</p>
                                <p class="style3">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                             </div>
                            </div>
                        </div>
                        <div class="posts-item">
                            <div class="img-posts">
                                <a href="">
                                    <img src="http://demo.snstheme.com/html/simen/images/blog/blog7.jpg" alt="">
                                </a>
                            </div>
                            <div class="text-posts">
                             <div class="blog-left">
                                <span class="text1">05</span>
                                <span class="text2">JAN</span>
                             </div>
                             <div class="blog-right">
                                <p class="style1">
                                    <a href="">Chair furnitured</a>
                                </p >
                                <p class="style2">Lorem Ipsum has been</p>
                                <p class="style3">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                             </div>
                            </div>
                        </div>
                        <div class="posts-item">
                            <div class="img-posts">
                                <a href="">
                                    <img src="http://demo.snstheme.com/html/simen/images/blog/blog7.jpg" alt="">
                                </a>
                            </div>
                            <div class="text-posts">
                             <div class="blog-left">
                                <span class="text1">05</span>
                                <span class="text2">JAN</span>
                             </div>
                             <div class="blog-right">
                                <p class="style1">
                                    <a href="">Chair furnitured</a>
                                </p >
                                <p class="style2">Lorem Ipsum has been</p>
                                <p class="style3">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                             </div>
                            </div>
                        </div>
                        <div class="posts-item">
                            <div class="img-posts">
                                <a href="">
                                    <img src="http://demo.snstheme.com/html/simen/images/blog/blog7.jpg" alt="">
                                </a>
                            </div>
                            <div class="text-posts">
                             <div class="blog-left">
                                <span class="text1">05</span>
                                <span class="text2">JAN</span>
                             </div>
                             <div class="blog-right">
                                <p class="style1">
                                    <a href="">Chair furnitured</a>
                                </p >
                                <p class="style2">Lorem Ipsum has been</p>
                                <p class="style3">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                             </div>
                            </div>
                        </div>
                        <div class="posts-item">
                            <div class="img-posts">
                                <a href="">
                                    <img src="http://demo.snstheme.com/html/simen/images/blog/blog7.jpg" alt="">
                                </a>
                            </div>
                            <div class="text-posts">
                             <div class="blog-left">
                                <span class="text1">05</span>
                                <span class="text2">JAN</span>
                             </div>
                             <div class="blog-right">
                                <p class="style1">
                                    <a href="">Chair furnitured</a>
                                </p >
                                <p class="style2">Lorem Ipsum has been</p>
                                <p class="style3">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.products_content_slick').slick({
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
            $('.main-post').slick({
                 slidesToShow: 3,
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
