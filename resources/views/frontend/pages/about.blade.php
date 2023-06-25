@extends('frontend.master')
@section('main')
 <div class="breadcrumbs-area breadcrumbs-bg ptb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                            <h2 class="breadcrumbs-title text-black m-0">ABOUT FORGE </h2>
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
            <!-- Banner Area Start -->
            <div class="banner-two-area">
                <div class="banner-two-bottom">
                @if($list_banner!=null)
                @foreach($list_banner as $value)
                 @if($value->position==3)
                    <div class="single-banner-two">
                        <div class="banner-two-img">
                            <a href="#">
                                <img src="{{url('images/banners')}}/{{$value->image}}" alt="" height="247px">
                            </a>
                        </div>
                        <div class="banner-two-text left-middle-bottom">
                            <div class="banner-two-opacity-inner">
                                <div class="banner-two-text-inner banner-bottom-text-inner text-uppercase">
                                    <h2 class="bottom-banner-title">{{$value->name}}</h2>
                                    <a href="{{route('shop_all')}}" class="btn-shop">SHOP NOW</a>
                                </div>
                                <div class="banner-opacity text-center bags text-uppercase">
                                    <h1>{{$value->category->name}}</h1>
                                </div>                              
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
                @else   
                    <div class="single-banner-two">
                        <div class="banner-two-img">
                            <a href="#">
                                <img src="{{url('assets')}}/frontend/images/banner/9.jpg" alt="">
                            </a>
                        </div>
                        <div class="banner-two-text right-middle-bottom">
                            <div class="banner-two-opacity-inner">
                                <div class="banner-two-text-inner banner-bottom-text-inner text-uppercase">
                                    <h2 class="bottom-banner-title">WOMEN’S</h2>
                                    <h2>summer</h2>
                                    <h2>collection</h2>
                                    <a href="#" class="btn-shop">VIEW COLLECTION</a>
                                </div>
                                <div class="banner-opacity text-center summer text-uppercase">
                                    <h1>SUMMER</h1>
                                </div>                              
                            </div>
                        </div>
                    </div>
                @endif    
                    
                </div>
            </div>
            <!-- Banner Area End -->
            <!-- Start About Top Area -->            
            <div class="about-top-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="about-top-img b-img">
                                <img alt="" src="{{url('images')}}/blogs/blg10.jpg">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-top-text">
                                <h4 class="about-title mb-35"><span class="text-defualt">FORGE</span> THE LARGEST COLLECTION FOR YOU</h4>
                                <p>ge is the best online shop for your online shopping orem ipsum dolor sit amet, consectetur adipiscing elit, </p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim nia, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea comm.</p>
                                <p class="display-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
                                <div class="signature">
                                    <img alt="" src="{{url('assets')}}/frontend/images/about/signature.png">
                                    <h6><a href="#">Arizona Smith</a></h6>
                                    <a href="#">Forge Owner</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End About Top Area -->            
            <!-- Start About Middle Area -->     
            <div class="about-middle-area">
               <div class="container">
                   <div class="row">
                       <div class="col-sm-6">
                            <div class="section-title text-center mb-35">
                                <h2 class="text-uppercase"><strong>NEWS FROM THE BLOG</strong></h2>
                                <p class="text-defualt">FROM THE BLOG</p>
                                <img alt="" src="{{url('assets')}}/frontend/images/section-border.png">
                            </div>
                            <div class="about-middle-inner">
                               <h4 class="text-uppercase mb-20"><strong>NEWS FROM THE BLOG</strong></h4>
                               <div class="about-middle-content">
                                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm jedo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad inim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquiLorem </p>
                                    <ul class="mission-list">
                                        <li>
                                            <img alt="" src="{{url('assets')}}/frontend/images/about/check.png">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed </p>
                                        </li>
                                        <li>
                                            <img alt="" src="{{url('assets')}}/frontend/images/about/check.png">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed </p>
                                        </li>
                                    </ul>
                                    <ul class="mission-list">
                                        <li>
                                            <img alt="" src="{{url('assets')}}/frontend/images/about/check.png">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed </p>
                                        </li>
                                        <li>
                                            <img alt="" src="{{url('assets')}}/frontend/images/about/check.png">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed </p>
                                        </li>
                                    </ul>
                               </div>
                               <div class="news-to-blog display-none">
                                   <h4 class="text-uppercase mb-20"><strong>NEWS FROM THE BLOG</strong></h4>
                                   <div class="about-middle-content">
                                       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm jedo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad inim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquiLorem </p>
                                       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm jedo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad inim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquiLorem </p>
                                       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm jedo tempor incididunt ut labore et dolore magna aliqua enim ad inim </p>
                                   </div>                                   
                               </div> 
                            </div>
                       </div>
                        <div class="col-sm-6">
                            <div class="about-middle-inner-right">
                                <div class="about-middle-inner-right-img b-img">
                                    <img alt="" src="{{url('images')}}/blogs/blg3.jpg">
                                </div>
                                <ul class="about-middle-inner-right-text pt-15 b-img">
                                    <li><img src="{{url('images')}}/blogs/blg6.jpg" alt=""></li>
                                    <li><img src="{{url('images')}}/blogs/blg8.jpg" alt=""></li>
                                </ul>
                            </div>
                        </div>
                   </div>
               </div>
           </div>       
            <!-- End About Middle Area -->  
            <!-- Start Why Choose Us Area -->  
            <div class="why-choose-us-area pt-90">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-center mb-35">
                                <h2 class="text-uppercase"><strong>WHY CHOOSE US</strong></h2>
                                <p class="text-defualt">WHY CHOOSE US</p>
                                <img src="{{url('assets')}}/frontend/images/section-border.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <ul class="about-icon-list">
                                <li class="about-single-icon mb-50">
                                    <div class="about-icon">
                                        <img src="{{url('assets')}}/frontend/images/about/icon/1.png" alt="">
                                    </div>
                                    <div class="choose-content pl-70">
                                        <h5 class="text-defualt mb-20 text-uppercase"><strong>FREE SHIPPING</strong></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                                    </div>
                                </li>
                                <li class="about-single-icon">
                                    <div class="about-icon">
                                        <img src="{{url('assets')}}/frontend/images/about/icon/2.png" alt="">
                                    </div>
                                    <div class="choose-content pl-70">
                                        <h5 class="text-defualt mb-20 text-uppercase"><strong>SECURE CHECKOUT</strong></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <ul class="about-icon-list">
                                <li class="about-single-icon mb-50">
                                    <div class="about-icon">
                                        <img src="{{url('assets')}}/frontend/images/about/icon/3.png" alt="">
                                    </div>
                                    <div class="choose-content pl-70">
                                        <h5 class="text-defualt mb-20 text-uppercase"><strong>OrDER ONLINE</strong></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                                    </div>
                                </li>
                                <li class="about-single-icon">
                                    <div class="about-icon">
                                        <img src="{{url('assets')}}/frontend/images/about/icon/4.png" alt="">
                                    </div>
                                    <div class="choose-content pl-70">
                                        <h5 class="text-defualt mb-20 text-uppercase"><strong>24/7 SUPPORT</strong></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 hidden-sm">
                            <ul class="about-icon-list">
                                <li class="about-single-icon mb-50">
                                    <div class="about-icon">
                                        <img src="{{url('assets')}}/frontend/images/about/icon/5.png" alt="">
                                    </div>
                                    <div class="choose-content pl-70">
                                        <h5 class="text-defualt mb-20 text-uppercase"><strong>MONEY BACK</strong></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                                    </div>
                                </li>
                                <li class="about-single-icon m-0">
                                    <div class="about-icon">
                                        <img src="{{url('assets')}}/frontend/images/about/icon/6.png" alt="">
                                    </div>
                                    <div class="choose-content pl-70">
                                        <h5 class="text-defualt mb-20 text-uppercase"><strong>GIFT COUPON</strong></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Why Choose Us Area -->  
            @include('frontend.layouts.brand')
        </section>
        <!-- End page content -->
@stop()        