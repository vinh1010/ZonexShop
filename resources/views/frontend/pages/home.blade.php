@extends('frontend.master')
@section('main')

<section class="slider-container">

    <!-- Slider Image -->
    <div id="mainSlider" class="nivoSlider slider-image">
        @if($list_banner!=null)
         @foreach($list_banner as $value)
         @if($value->position==1)
        <img src="{{url('images/banners')}}/{{$value->image}}" alt="main slider" title="{{$value->name}}" />
        @endif
         @endforeach
         @else
        <img src="{{url('assets')}}/frontend/images/slider/2.jpg" alt="main slider" title="#htmlcaption2" />
        @endif
    </div>
    <!-- Slider Caption 1 -->
    <!-- foreach -->
    <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
        <div class="slider-progress"></div>
        <div class="container slider-height">
            <div class="row slider-height">
                <div class="col-xs-offset-6 col-xs-6 slider-height">
                    <div class="slide-text">
                        <div class="middle-text">
                            <div class="cap-dec text-black text-uppercase wow fadeInDown" data-wow-duration="0.9s" data-wow-delay="0s">
                                <h3>TRENDY DRESS COLLETIONS</h3>
                            </div>
                            <div class="cap-title text-black text-uppercase wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                <h2>FOR WOMEN - 2016</h2>
                            </div>
                            <div class="cap-para wow fadeInDown" data-wow-duration="2s" data-wow-delay="1s">
                                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat vel illum dolore eu feugiat nulla facilisis at vero eros.</p>
                            </div>
                            <div class="cap-shop wow text-uppercase fadeInDown" data-wow-duration="2.5s" data-wow-delay="1.5s">
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of slider area -->
<!-- Start page content -->
<section id="page-content" class="page-wrapper">
    
    <!-- Start Featured product Area -->
    <div class="featured-product-area section-padding">
        <div class="container">
            <div class="row rp-style">
                <div class="col-md-12">
                    <div class="section-title text-center mb-35">
                        <h2 class="text-uppercase"><strong>FEATURED PRODUCTS</strong></h2>
                        <p class="text-defualt">Best Collection for you</p>
                        <img alt="" src="{{url('assets')}}/frontend/images/section-border.png">
                    </div>
                </div>
            </div>
            <div class="row rp-style">
                <div class="featured-carousel indicator-style">    
                    @foreach($list_featured_product as $value)
                    @php
                        $get_infor = $order->get_image($value->product_id)
                    @endphp
                    <div class="product-container cp-style-2">
                        <div class="product-inner">
                            <a href="{{route('detail',$get_infor->id)}}">
                                <div class="product-img b-img">
                                    <img alt="" src="{{url('images/products')}}/{{$get_infor->image}}">
                                </div>
                            </a>
                            @if($get_infor->sale_price > 0)
                            @php
                                $sale = ($get_infor->sale_price/$get_infor->price)*100;
                            @endphp
                            <span class="product-tag text-uppercase orang-bg">Sale -{{number_format(100 - $sale,0)}}%</span>
                            @else
                            <span class="product-tag text-uppercase orang-bg">hot</span>
                            @endif
                            <ul class="quick-veiw text-center">
                                <form action="{{route('cart',$get_infor->id)}}" method="POST">
                                @csrf   
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="size" value="{{$productAttribute->get_size($get_infor->id)->pluck('value')[0]}}">
                                    <input type="hidden" name="color" value="{{$productAttribute->get_color($get_infor->id)->pluck('name')[0]}}">
                                    <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                                </form>
                                <li><a href="{{route('detail',$get_infor->id)}}"><i class="fa fa-eye"></i></a></li>
                                <li><a href=""><i class="fa fa-refresh"></i></a></li>
                                @if(count($favoriteProduct->find_favorite($get_infor->id,$user_id)) == 1)
                                <li><a href="{{route('delete_favorite',$favoriteProduct->find_favorite($get_infor->id,$user_id)[0])}}?page=home"><i class="fa fa-heart" style="color: red;"></i></a></li>
                                @else
                                <li><a href="{{route('add_favorite',$get_infor->id)}}?page=home"><i class="fa fa-heart"></i></a></li>
                                @endif
                            </ul>
                            <div class="product-text pt-15">
                                <ul class="pull-left list-inline ratings">
                                <div id="rateYoHome1{{$get_infor->id}}" class="mr-4" style="margin-top: 5px;"></div>
                                    @section('star_js')
                                        @parent
                                        <script>
                                            $(function () {
                                                $("#rateYoHome1{{$get_infor->id}}").rateYo({
                                                    normalFill: "#bbb",
                                                    starWidth: "15px",
                                                    rating: "{{$get_infor->Star($get_infor->id)/5*100}}%",
                                                    readOnly: true,
                                                    precision: 0
                                                });

                                            });
                                        </script>
                                    @stop
                                </ul>
                                <ul class="pricing list-inline pull-right">
                                    @if($get_infor->sale_price > 0)
                                    <li class="text-right c-price">${{number_format($get_infor->sale_price,0)}}</li>
                                    <li class="text-right p-price">${{number_format($get_infor->price,0)}}</li>
                                    @else
                                    <li class="text-right c-price">${{number_format($get_infor->price,0)}}</li>
                                    @endif
                                </ul>
                                <div class="clear"></div>
                                <h6 class="product-name m-0">
                                    <a title="Eletria ostma" href="{{route('detail',$get_infor->id)}}">{{$get_infor->name}}</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Start Featured product Area -->

    <!-- Start New Arrival Area  -->
    <div class="new-arrival-area section-padding">
        <div class="container">
            <div class="row rp-style-2">
                <div class="col-md-12">
                    <div class="section-title text-center mb-35">
                        <h2 class="text-uppercase"><strong>FRESH NEW ARRIVAL</strong></h2>
                        <p class="text-defualt">ALL NEW ITEAMS</p>
                        <img alt="" src="{{url('assets')}}/frontend/images/section-border.png">
                    </div>
                </div>
            </div>
            <div class="row rp-style-2">
                <div class="featured-carousel indicator-style">
                    @foreach($list_new_product as $value)
                    <div class="product-container cp-style-2">
                        <div class="product-inner">
                            <a href="#">
                                <div class="product-img b-img">
                                    <img src="{{url('images/products')}}/{{$value->image}}" alt="">
                                </div>
                            </a>
                            @if($value->sale_price > 0)
                            @php
                                $sale = ($value->sale_price/$value->price)*100;
                            @endphp
                            <span class="product-tag text-uppercase orang-bg">Sale -{{number_format(100 - $sale,0)}}%</span>
                            @else
                            <span class="product-tag text-uppercase orang-bg">New</span>
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
                                <li><a href=""><i class="fa fa-refresh"></i></a></li>
                                @if(count($favoriteProduct->find_favorite($value->id,$user_id)) == 1)
                                <li><a href="{{route('delete_favorite',$favoriteProduct->find_favorite($value->id,$user_id)[0])}}?page=home"><i class="fa fa-heart" style="color: red;"></i></a></li>
                                @else
                                <li><a href="{{route('add_favorite',$value->id)}}?page=home"><i class="fa fa-heart"></i></a></li>
                                @endif
                            </ul>
                            <div class="product-text">
                                <ul class="pull-left list-inline ratings">
                                <div id="rateYoHome2{{$value->id}}" class="mr-4" style="margin-top: 5px;"></div>
                                    @section('star_js')
                                        @parent
                                        <script>
                                            $(function () {
                                                $("#rateYoHome2{{$value->id}}").rateYo({
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
                                <h6 class="product-name">
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
    <!-- End Of New Arrival Area  -->
    <!-- Offer Area Start -->
    <div class="offer-two-area clearfix">
        @if($list_banner!=null)
        <?php $check = 1; ?>
         @foreach($list_banner as $key => $value)
         @if($value->position==2)
         
          
        <?php
                if ($check==3) {
                    break;
                };
                $check++;
        
        ?>
        <div class="single-offer-two">
            <div class="offer-two-img">
                <a href="#">
                    <img src="{{url('images/banners')}}/{{$value->image}}" alt="" height="507px">
                </a>
            </div>
            <div class="offer-two-text text-uppercase">
                <h2 class="offer-two-title">{{$value->name}}</h2>
                <h2 class="offer-two-dis">{{$value->category->name}}</h2>
                <a href="{{route('shop_all')}}" class="btn-shop">VIEW COLLECTION</a>
            </div>
        </div>
        @endif
        @endforeach
        @else
        <div class="single-offer-two">
            <div class="offer-two-img">
                <a href="#">
                    <img src="{{url('assets')}}/frontend/images/offer/4.jpg" alt="">
                </a>
            </div>
            <div class="offer-two-text left text-uppercase">
                <h2 class="offer-two-title">EXCLUSIVE SUNGLASSES</h2>
                <h2 class="offer-two-dis">FOR WOMEN</h2>
                <a href="#" class="btn-shop">VIEW COLLECTION</a>
            </div>
        </div>
        @endif
    </div>
    <!-- Offer Area End -->
    <!-- Start Best Seller Iteams Area -->
    <!-- End Of Best Seller Iteams Area -->
    <!-- Start Blog Area -->
    <div class="blog-testimonial-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-title text-center mb-35">
                        <h2 class="text-uppercase"><strong>NEWS FROM THE BLOG</strong></h2>
                        <p class="text-defualt">FROM THE BLOG</p>
                        <img src="{{url('assets')}}/frontend/images/section-border.png" alt="">
                    </div>
                    <div class="blog-carousel indicator-style-two m-0">
                        @foreach($list_blog as $value)
                        <div class="single-blog blog-bg">
                            <div class="blog-img b-img">
                                <a href="{{route('blog_detail',$value->id)}}">
                                    <img alt="" src="{{url('images')}}/blogs/{{$value->image}}">
                                </a>
                            </div>
                            <div class="blog-text p-20">
                                <h4 class="text-uppercase text-defualt">
                                    <a href="{{route('blog_detail',$value->id)}}">{{Str::limit($value->title,40)}}</a>
                                </h4>
                                <ul class="blog-list">
                                    <li><a href="#">{{$value->created_at}}</a></li>
                                    <li><a href="#">{{$value->category->name}}</a></li>
                                </ul>
                                <p>{!!Str::limit($value->summary,120)!!}</p>
                                <a class="btn-read-more text-uppercase text-defualt" href="{{route('blog_detail',$value->id)}}">read mroe</a>
                                <ul class=" bottom">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-comments"></i>
                                            {{$value->count_cmt($value->id)}} Comments
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 hidden-xs">
                    <div class="section-title text-center mb-35">
                        <h2 class="text-uppercase"><strong>WHAT CLIENTS SAY</strong></h2>
                        <p class="text-defualt">TESTIMONIALS</p>
                        <img src="{{url('assets')}}/frontend/images/section-border.png" alt="">
                    </div>
                    <div class="testimonial-list indicator-style">
                        @foreach($list_cmt as $key => $value)
                        <div class="testimonial-inner">
                            @if($key%2 == 0)
                            <div class="single-testimonial single-testimonial-two mb-20">
                                <div class="testimonial-content blog-bg">
                                    <h5 class="text-uppercase text-defualt">{{$value->get_user->name}}</h5>
                                    <p class="m-0">{{$value->content}}</p>
                                </div>
                                <div class="testimonial-img">
                                    <a href="#">
                                        <img src="{{url('images/avatars')}}/{{$value->get_user->avatar}}" alt="">
                                    </a>
                                </div>
                            </div>
                            @endif
                            @if($key%2 == 1)
                            <div class="single-testimonial single-testimonial-two">
                                <div class="testimonial-content blog-bg">
                                    <h5 class="text-uppercase text-defualt">{{$value->get_user->name}}</h5>
                                    <p class="m-0">{{$value->content}}</p>
                                </div>
                                <div class="testimonial-img">
                                    <a>
                                        <img src="{{url('images/avatars')}}/{{$value->get_user->avatar}}" alt="" >
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->
    @include('frontend.layouts.brand')
    <!-- Start Offer Banner Area -->
  
    <!-- End Offer Banner Area -->
    <!-- Start About us Area -->
    <div class="why-us text-center section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="why-us-inner">
                        <div class="why-us-icon mb-20">
                            <img src="{{url('assets')}}/frontend/images/why-us/1.png" alt="">
                        </div>
                        <h5 class="text-uppercase m-0 text-defualt"><strong>FREE SHIPPING</strong></h5>
                        <p class="why-us-title m-0">Free for all product</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="why-us-inner">
                        <div class="why-us-icon mb-20">
                            <img src="{{url('assets')}}/frontend/images/why-us/2.png" alt="">
                        </div>
                        <h5 class="text-uppercase m-0 text-defualt"><strong>ORDER ONLINE</strong></h5>
                        <p class="why-us-title m-0">www.zonex.com</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="why-us-inner">
                        <div class="why-us-icon mb-20">
                            <img src="{{url('assets')}}/frontend/images/why-us/3.png" alt="">
                        </div>
                        <h5 class="text-uppercase m-0 text-defualt"><strong>MONEY BACK</strong></h5>
                        <p class="why-us-title m-0">Money back guarantee</p>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm">
                    <div class="why-us-inner m-0">
                        <div class="why-us-icon mb-20">
                            <img src="{{url('assets')}}/frontend/images/why-us/4.png" alt="">
                        </div>
                        <h5 class="text-uppercase m-0 text-defualt"><strong>GIFT COUPON</strong></h5>
                        <p class="why-us-title m-0">Surprise gift coupon</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About us Area -->
</section>
<!-- End page content -->
<!-- Start footer area -->
@include('sweetalert::alert')
@stop()