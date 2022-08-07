@extends('client.layouts.layout')
@section('title', 'Sản Phẩm')
@section('style')
<link rel="stylesheet" href="{{asset('css/products/index.css')}}">
<link rel="stylesheet" href="{{asset('css/filter/index.css')}}">

@endsection
@section('content')
    
    <div class="container">
        <div>
            <div class="content">
                <div class="left-products">
                    @include('client.products.filter')
                </div>
                <div class="right-products">
                       <div class="head-right">
                            <div class="short-by">
                                <div class="title-short">
                                    <span>Sort by</span>
                                </div>
                                <select name="" id="">
                                   <option value="">Position</option>
                                   <option value="">Name</option>
                                   <option value="">Price</option>
                                </select>
                            </div>
                            <div class="show">
                                <div class="title-show">
                                    <span>Show</span>
                                </div>
                                <select name="" id="">
                                    <option value="">20</option>
                                    <option value="">30</option>
                                    <option value="">40</option>
                                </select>
                            </div>
                       </div>
                       <div class="main-right">
                           <div class="products_content">
                             @foreach($data as $item)
                             <div class="products_grid">
                                <div class="ico-label">
                                    <span class="ico-product ico-new">New</span>
                                    @if ($item->sale ==1)
                                    <span class="ico-product ico-sale">Sale</span>
                                    @endif
                                </div>
                                <div class="products_img">
                                    <a href="{{route('products-details',$item->id)}}">
                                        <img src="{{$item->image}}" alt="">
                                    </a>
                                </div>
                                <div class="products_text">
                                    <div class="item-title">
                                        <a href="">{{$item->name}}</a>
                                    </div>
                                    <div class="item-price">
                                        <div class="price-box">
                                            <span class="price1">{{$item->sale == 1 ? number_format($item->product_detail->price_sale) : number_format($item->price)}}</span>
                                            <span class="price2">{{$item->sale == 1 ? number_format($item->price) : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="action-bot">
                                    <div class="wrap-addTocart">
                                        <a href="{{route('products-details',$item->id)}}" class="text-white">
                                        <button class=" btn-cart" title="Add To Cart">
                                                Chi Tiết
                                            </button>
                                        </a>

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
                             {{$data->links()}}
                           </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
@endsection
