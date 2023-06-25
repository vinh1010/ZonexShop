@extends('frontend.master')
@section('main')
<div class="breadcrumbs-area breadcrumbs-bg ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-inner">
                    <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                    <h2 class="breadcrumbs-title text-black m-0">Favorite Product </h2>
                    <ul class="top-page">
                        <li><a href="index.html">Home</a></li>
                        <li>></li>
                        <li>Favorite Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs Area -->
<!-- Start page content -->
<section id="page-content" class="page-wrapper pt-10">
    @include('frontend.layouts.banner')
    @if(Auth::check())
    <!-- Start New Arrival Area  -->
    <div class="new-arrival-area section-padding">
        <div class="container">
            <div class="row rp-style-2">
                <div class="col-md-12">
                    <div class="section-title text-center mb-35">
                        <h2 class="text-uppercase"><strong>LIST FAVORITE PRODUCT</strong></h2>
                        <p class="text-defualt">ALL YOUR PRODUCTS</p>
                        <img alt="" src="{{url('assets')}}/frontend/images/section-border.png">
                    </div>
                </div>
            </div>
            <div class="row rp-style-2">
                <div class="featured-carousel indicator-style">
                    @foreach($get_favorite as $value)
                    <div class="product-container cp-style-2">
                        <div class="product-inner">
                            <a href="{{route('detail',$value->product_id)}}">
                                <div class="product-img b-img">
                                    <img src="{{url('images/products')}}/{{$value->product->image}}" alt="">
                                </div>
                            </a>
                            <span class="product-tag text-uppercase orang-bg">-20%</span>
                            <ul class="quick-veiw text-center">
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a href="{{route('detail',$value->product_id)}}"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-refresh"></i></a></li>
                                <li><a href="{{route('delete_favorite',$value->id)}}?page=list-favorite"><i class="fa fa-heart" style="color: red;"></i></a></li>
                            </ul>
                            <div class="product-text">
                                <ul class="pull-left list-inline ratings">
                                    <li><i class="rated fa fa-star"></i></li>
                                    <li><i class="rated fa fa-star"></i></li>
                                    <li><i class="rated fa fa-star"></i></li>
                                    <li><i class="rated fa fa-star"></i></li>
                                    <li><i class="rated fa fa-star"></i></li>
                                </ul>
                                <ul class="pricing list-inline pull-right">
                                    @if($value->product->sale_price > 0)
                                        <li class="text-right c-price">${{$value->product->sale_price}}</li>
                                        <li class="text-right p-price">${{$value->product->price}}</li>
                                    @else
                                        <li class="text-right c-price">${{$value->product->price}}</li>
                                    @endif
                                </ul>
                                <div class="clear"></div>
                                <h6 class="product-name">
                                    <a href="{{route('detail',$value->product_id)}}" title="Eletria ostma">{{$value->product->name}}</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Of New Arrival Area  -->
    @else
    <div class="new-arrival-area section-padding">
        <div class="text-center">
            <a href="{{route('login')}}?page=list_favorite" style="font-weight: bold;"><i class="fa fa-user" aria-hidden="true"></i>: Please login to continue</a>
        </div>    
    <div>
    @endif
    @include('frontend.layouts.brand')
</section>
<!-- End page content -->
@include('sweetalert::alert')
@stop()