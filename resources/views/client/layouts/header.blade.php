<header>
    <div class="header-top bg-dark">
        <div class="container">
            <div class="customer-ct p-0 navbar navbar-expand-lg d-flex justify-content-end">
                <ul class="ul-top navbar-nav  mr-auto  ">
                    <li class="first nav-item ">
                        <a href="" class=" nav-link top-link-account text-light">
                            <i class="fas fa-user"></i> My accounts</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link top-link-wishlist text-light">
                            <i class="far fa-heart"></i> My wishlist
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('login')}}" class="nav-link top-link-login text-light">
                            <i class="fas fa-key"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main_header">
        <div class="header-main pt-3">
            <div class="container">
                <div class="row align-items-center">
                    <h1 id="logo" class="col-md-3">
                        <a href="" title="Logo">
                            <img src="{{ asset('image/logo.jpg') }}" alt="">
                        </a>
                    </h1>
                    <div class="col-md-9 policy">
                        <div class="row align-items-center">
                            <div class="col-md-4 col-sm-4 col-phone-12">
                                <div class="policy_custom d-flex">
                                    <div class="policy-icon ">
                                        <em class="fa fa-truck p-3 rounded-circle">
                                        </em>
                                    </div>
                                    <div class="policy-text ">
                                        <p class="policy-title">
                                            FREE DELIVERY WORLWIDE
                                        </p>
                                        <p class="policy-ct">
                                            On order over
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-phone-12">
                                <div class="policy_custom d-flex">
                                    <div class="policy-icon ">
                                        <em class="fa fa-cloud-upload-alt  p-3 rounded-circle">
                                        </em>
                                    </div>
                                    <div class="policy-text">
                                        <p class="policy-title">
                                            UP TO 20% OFF COSY LAYERS
                                        </p>
                                        <p class="policy-ct">
                                            Lorem ipsum dolor sit amet
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-phone-12">
                                <div class="policy_custom d-flex">
                                    <div class="policy-icon ">
                                        <em class="fa fa-gift  p-3 rounded-circle">
                                        </em>
                                    </div>
                                    <div class="policy-text">
                                        <p class="policy-title">
                                            Buy 1 get 1 free
                                        </p>
                                        <p class="policy-ct">
                                            On order over
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-fot ">
            <div id="header" class="container header-border d-flex align-items-center justify-content-between mt-4">
                <div id="menu" class="menu">
                    <nav class="navbar navbar-expand-lg d-flex">
                        <ul class="navbar-nav mr-auto d-flex " id="ulMenu">
                            <li class="nav-item"><a class="nav-link fw-bold  mx-4 linkpage" href="{{route('home')}}">Trang chủ</a>
                            </li>
                            <li class="nav-item"><a class="nav-link fw-bold  mx-4 linkpage" href="{{route('products')}}">Sản phẩm</a>
                            </li>
                       
                       
                            <li class="nav-item"><a class="nav-link fw-bold  mx-4 linkpage" href="">Khuyến
                                    mãi</a></li>
                            <li class="nav-item"><a class="nav-link fw-bold  mx-4 linkpage" href="">Tin tức</a>
                            </li>
                            <li class="nav-item"><a class="nav-link fw-bold  mx-4 linkpage" href="">Liên hệ</a>
                            </li>
                            <li class="nav-item"><a class="nav-link fw-bold  mx-4 linkpage" href="">Giới thiệu</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="block_topsearch">
                    <div class="top_cart d-flex align-items-center">
                        <div class="mx-3 search">
                            <span id="search_toggle"><i class="fal fa-search" ></i>
                            </span>
                            <div class="block_search" id="block_search">
                                <input type="text" placeholder="Nhập từ khóa cần tìm kiếm....." name="" id="input_search">
                            </div>
                        </div>
                        <div class="block_cart mx-3 d-flex align-items-center">
                            <i class="fal fa-shopping-cart  " id="shopping_cart"></i>
                            <div class="cart_quantity">
                                <span class="text-danger fs-6 "> 3</span>
                                <span class="text-dark fs-6  ">(items)</span>
                            </div>
                            <div class="cart_header">
                                <div class="cart_details">
                                    <div class="head_cart d-flex align-items-center justify-content-between">
                                        <h2 class="fw-bold">YOUR CART</h2>
                                        <i id="close_cart" class="fal fa-times"></i>
                                    </div>
                                    <div class="main_cart">
                                       <h2>your cart is empty</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="navres mx-3">
                            <span id="toggle" class="toggle"><i class="open fal fa-bars"></i>
                                <i class="close fal fa-times"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


