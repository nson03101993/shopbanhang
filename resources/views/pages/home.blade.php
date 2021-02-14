@extends('layout')

@section('main_content')
    <!--features_items-->
    <div class="features_items">
        <h2 class="title text-center">Sản Phẩm mới</h2>
        @foreach ($product as $items)
        <a href="{{ route('product_details',['product_id' => $items->product_id, 'brand_id' => $items->brand_id, 'cat_id' => $items->cat_id]) }}">
        <div class="col-sm-4">
                <div class="product-image-wrapper">    
                    <form method="POST" action="{{ route('save_cart_direct') }}">
                        {{ @csrf_field() }}          
                        <div class="single-products">                      
                            <div class="productinfo text-center">
                                <img style="width: 150px; height: 150px" src="{{asset('public/backend/uploads/product/'.$items->product_image)}}" alt="" />
                                <h2>{{number_format($items->product_price,0,",",".")}} VNĐ</h2>
                                <p>{{$items->product_name}}</p>
                                <input type="hidden" name="product_id" value="{{ $items->product_id }}" >
                                <button type="submit" name="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"> Thêm vào giỏ hàng</i></button>
                            </div>
                        </div>  
                    </form>  
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Thêm Vào WishList</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>So sánh giá</a></li>
                        </ul>
                    </div>
                </div>
        </div>
        </a>
        @endforeach
    </div>
    <!--features_items-->
    
    <!--category-tab-->
    <div class="category-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                @foreach ($sub_brand as $items)
                    <li class="<?php if($items->brand_id == 1){ echo "active"; } ?>" ><a href="#" data-toggle="tab">{{ $items->brand_name }}</a></li> 
                @endforeach
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="tshirt">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ 'public/frontend/images/home/gallery1.jpg' }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                    cart</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/category-tab-->

    <!--recommended_items-->
    <div class="recommended_items">
        <h2 class="title text-center">Sản Phẩm Hot</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ 'public/frontend/images/home/recommend1.jpg' }}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                        to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ 'public/frontend/images/home/recommend2.jpg' }}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                        to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ 'public/frontend/images/home/recommend3.jpg' }}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                        to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ 'public/frontend/images/home/recommend1.jpg' }}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                        to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ 'public/frontend/images/home/recommend2.jpg' }}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                        to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ 'public/frontend/images/home/recommend3.jpg' }}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                        to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->

@endsection
