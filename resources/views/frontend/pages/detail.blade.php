@extends('frontend.master')
@section('main')
<div class="breadcrumbs-area breadcrumbs-bg ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-inner">
                    <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                    <h2 class="breadcrumbs-title text-black m-0">Product Details </h2>
                    <ul class="top-page">
                        <li><a href="index.html">Home</a></li>
                        <li>></li>
                        <li>About</li>
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
    <!-- Start Product Details -->
    <div class="product-details-area section-padding">
        <div class="container">
            <form action="{{route('cart',$product_detail->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-5">
                        <div class="single-product-image">
                            <div id="my-tab-content" class="tab-content">
                                <div class="tab-pane active" id="view1">
                                    <a class="venobox" href="{{url('images/products')}}/{{$product_detail->image}}" data-gall="gallery" title=""><img src="{{url('images/products')}}/{{$product_detail->image}}" alt=""><span>+</span></a>
                                </div>
                                @foreach($relatedImage as $value)
                                <div class="tab-pane" id="view{{$loop->index + 2}}">
                                    <a class="venobox" href="{{url('images/relate_images')}}/{{$value->image}}" data-gall="gallery" title=""><img src="{{url('images/relate_images')}}/{{$value->image}}" alt=""><span>+</span></a>
                                </div>
                                @endforeach
                            </div>
                            <div id="viewproduct" class="nav nav-tabs product-view" data-tabs="tabs">
                                <div class="pro-view active"><a href="#view1" data-toggle="tab"><img src="{{url('images/products')}}/{{$product_detail->image}}" alt=""></a></div>
                                @foreach($relatedImage as $value)
                                    <div class="pro-view"><a href="#view{{$loop->index + 2}}" data-toggle="tab"><img src="{{url('images/relate_images')}}/{{$value->image}}" alt=""></a></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-text product-text-list product-details-right">
                            <h5 class="product-name-list">
                                <a href="#" title="Zelletria ostma"><strong>{{$product_detail->name}}</strong></a>
                            </h5>
                            <ul class="pull-left list-inline ratings rating-list pb-20">
                                <li>
                                    <div id="rateYo" class="mr-4" style="margin-top: 5px;"></div>
                                    @section('star_js')
                                        @parent
                                        <script>
                                            $(function () {
                                                $("#rateYo").rateYo({
                                                    normalFill: "#bbb",
                                                    starWidth: "15px",
                                                    rating: "{{$avgStar/5*100}}%",
                                                    readOnly: true,
                                                    precision: 0
                                                });

                                            });
                                        </script>
                                    @stop
                                </li>
                                <li class="reviews text-theme"><span>{{$countStar}}</span>Review</li>
                            </ul>
                            <div class="pd-quantity-available mb-10">
                                <p id="product-available">
                                    <span>Available : </span>
                                </p>
                                <p id="availability" class="text-defualt">
                                    <span> In stock</span>
                                </p>
                            </div>
                            <div class="clear"></div>
                            <div class="shop-select-details">
                                <div class="shop-tab-pill">
                                    <div class="show-label">
                                        <label>Size : </label>
                                        <select name="size">
                                            @foreach($get_size as $value)
                                                <option value="{{$value->value}}">{{$value->value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="show-label">
                                        <label>Color : </label>
                                        <select name="color">
                                            @foreach($get_color as $value)
                                                <option value="{{$value->name}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="show-label">
                                        <label>Qty : </label>
                                        <input type="number" value="1" name="quantity">
                                    </div>
                                </div>
                            </div>
                            <ul class="pricing pricing-list">
                                @if($product_detail->sale_price > 0)
                                    <li class="text-right p-price text-center">${{number_format($product_detail->price,0)}}</li>
                                    <li class="text-right c-price text-defualt text-center">${{number_format($product_detail->sale_price,0)}}</li>
                                @else
                                    <li class="text-right c-price text-defualt text-center">${{number_format($product_detail->price,0)}}</li>
                                @endif
                            </ul>
                            <input type="hidden" name="id_product" value="{{$product_detail->id}}">
                            <div class="clear"></div>
                            <ul class="quick-veiw-list">
                                <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                                @if(count($get_favorite) == 1)
                                <li><a href="{{route('delete_favorite',$id_favorite[0])}}?page=detail"><i class="fa fa-heart" style="color: red;"></i></a></li>
                                @else
                                <li><a href="{{route('add_favorite',$product_detail->id)}}?page=detail"><i class="fa fa-heart"></i></a></li>
                                @endif
                            </ul>
                            <div class="socailsharing-product mt-40">
                                <label>Share :</label>
                                <ul>
                                    <li class="icon-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="icon-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="icon-google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="icon-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-9">
                    <div class="p-details-tab gray-ash-bg mt-50">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#more-info" aria-controls="more-info" role="tab" data-toggle="tab">MORE INFO</a></li>
                            <li role="presentation"><a href="#data" aria-controls="data" role="tab" data-toggle="tab">DATA SHEET</a></li>
                            <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">REVIEWS</a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <div class="tab-content review gray-ash-bg mt-30">
                        <div role="tabpanel" class="tab-pane active p-30" id="more-info">
                            <p>{!!$product_detail->description!!}</p>
                        </div>
                        <div role="tabpanel" class="tab-pane p-30" id="data">
                            <table class="table-data-sheet m-0">
                                <tbody>
                                    <tr class="odd">
                                        <td>Compositions</td>
                                        <td>
                                            @foreach($get_material as $value)
                                                {{$value->name}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>Styles</td>
                                        <td>Casual</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Properties</td>
                                        <td>Short Sleeve</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane p-30" id="reviews">
                            <div id="product-comments-block-tab">
                                @if(Auth::check())
                                @if($product_detail->check_order(Auth::user()->id,$product_detail->id)>0)
                                <form action="{{route('post_rating',$product_detail->id)}}" method="post">
                                    @csrf
                                    <div class="form-row contact-message"> 
                                        <label>
                                            Ratings
                                            <span class="required">*</span>
                                        </label>
                                        <div id="rateYou" style="margin-top: 5px;"></div>  
                                    </div> 
                                    <input type="hidden" value="" class="star" name="star">
                                    @section('star_js')
                                    @parent
                                    <script>
                                        $(function (){
                                            $("#rateYou").rateYo({
                                                normalFill: "#bbb",
                                                starWidth: "40px",
                                                rating: "0%",
                                                precision: 0
                                            });
                                        });
                                        $(function (){
                                            $('#rateYou .jq-ry-rated-group').click(function (){
                                                var val = $(this).attr("style");
                                                var numStar = val.substring(7, 9);
                                                $(".star").attr("value",numStar);
                                            });
                                        });
                                    </script>
                                    @stop

                                    <div class="form-row contact-message " style="margin-top:15px;">
                                        <label>
                                            Review
                                            <span class="required">*</span>
                                        </label>
                                        <textarea name="content" placeholder="write something"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary py-3 px-5 mt-3">Feedback</button>   
                                </form>
                                @else
                                <a href="{{route('shop_all')}}" class="comment-btn"><span>Please Shopping!</span></a> 
                                @endif
                                @else
                                <a href="{{route('login')}}" class="comment-btn"><span>Please log in!</span></a> 
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="offer-img b-img mt-50">
                        <img src="{{url('images/products')}}/{{$product_detail->image}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Of Product Details -->
    <!-- Start Related Product -->
    <div class="featured-product-area">
        <div class="container">
            <div class="row rp-style">
                <div class="col-md-12">
                    <div class="section-title text-center mb-35">
                        <h2 class="text-uppercase"><strong>RELATED PRODUCTS</strong></h2>
                        <p class="text-defualt">Best Collection for you</p>
                        <img alt="" src="{{url('assets')}}/frontend/images/section-border.png">
                    </div>
                </div>
            </div>
            <div class="row rp-style">
                <div class="featured-carousel indicator-style">
                    @foreach($related_product as $value)
                    <div class="product-container cp-style-2">
                        <div class="product-inner">
                            <a href="{{route('detail',$value->id)}}">
                                <div class="product-img b-img">
                                    <img alt="" src="{{url('images/products')}}/{{$value->image}}">
                                </div>
                            </a>
                            @if($value->sale_price > 0)
                            @php
                                $sale = ($value->sale_price/$value->price)*100;
                            @endphp
                            <span class="product-tag text-uppercase orang-bg">Sale -{{number_format(100 - $sale,0)}}%</span>
                            @else
                            <span class="product-tag text-uppercase orang-bg">hot</span>
                            @endif
                            <ul class="quick-veiw text-center">
                                <form action="{{route('cart',$value->id)}}" method="POST">
                                @csrf   
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="size" value="{{$productAttribute->get_size($value->id)->pluck('value')[0]}}">
                                    <input type="hidden" name="color" value="{{$productAttribute->get_color($value->id)->pluck('name')[0]}}">
                                    <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                                </form>
                                <li><a href="{{route('detail',$value->id)}}"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-refresh"></i></a></li>
                                @if(count($favoriteProduct->find_favorite($value->id,$user_id)) == 1)
                                <li><a href="{{route('delete_favorite',$favoriteProduct->find_favorite($value->id,$user_id)[0])}}?page=home"><i class="fa fa-heart" style="color: red;"></i></a></li>
                                @else
                                <li><a href="{{route('add_favorite',$value->id)}}?page=home"><i class="fa fa-heart"></i></a></li>
                                @endif
                            </ul>
                            <div class="product-text pt-15">
                                <ul class="pull-left list-inline ratings">
                                <div id="rateYoHome1{{$value->id}}" class="mr-4" style="margin-top: 5px;"></div>
                                    @section('star_js')
                                        @parent
                                        <script>
                                            $(function () {
                                                $("#rateYoHome1{{$value->id}}").rateYo({
                                                    normalFill: "#bbb",
                                                    starWidth: "15px",
                                                    rating: "{{$value->Star($value->id)/5*100}}%",
                                                    readOnly: true,
                                                    precision: 0
                                                });

                                            });
                                        </script>
                                    @stop
                                </ul>
                                <ul class="pricing list-inline pull-right">
                                    @if($value->sale_price > 0)
                                    <li class="text-right c-price">${{number_format($value->sale_price,0)}}</li>
                                    <li class="text-right p-price">${{number_format($value->price,0)}}</li>
                                    @else
                                    <li class="text-right c-price">${{number_format($value->price,0)}}</li>
                                    @endif
                                </ul>
                                <div class="clear"></div>
                                <h6 class="product-name m-0">
                                    <a title="Eletria ostma" href="{{route('detail',$value->id)}}">{{$value->name}}</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Of Related Product -->
    @include('frontend.layouts.brand')
</section>
@include('sweetalert::alert')
@stop()