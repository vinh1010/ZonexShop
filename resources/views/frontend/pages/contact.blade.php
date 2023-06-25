@extends('frontend.master')
@section('main')
<div class="breadcrumbs-area breadcrumbs-bg ptb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                            <h2 class="breadcrumbs-title text-black m-0">Contact Us </h2>
                            <ul class="top-page">
                                <li><a href="index.html">Home</a></li>
                                <li>></li>
                                <li>Contact us</li>
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
            <!-- Start Contact Us Top Area -->
            <div class="contact-us-area pt-90">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="single-contact-inner pull-left">
                                <div class="text-center">
                                    <div class="contact-us-icon mb-20">
                                        <img src="{{url('assets')}}/frontend/images/contact/1.png" alt="">
                                    </div>
                                    <div class="contact-inner">
                                        <p>8901 Marmora Raod, </p>
                                        <p>Glasgow, D04  89GR </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-contact-inner text-center">
                                <div class="contact-us-icon mb-20">
                                    <img src="{{url('assets')}}/frontend/images/contact/2.png" alt="">
                                </div>
                                <div class="contact-inner">
                                    <p>Telephone : (801) 4256  9856 </p>
                                    <p>Telephone : (801) 4256  9658 </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-contact-inner pull-right">
                                <div class="text-center">
                                    <div class="contact-us-icon mb-20">
                                        <img src="{{url('assets')}}/frontend/images/contact/3.png" alt="">
                                    </div>
                                    <div class="contact-inner">
                                        <p>Email : info@forge.com </p>
                                        <p>Web : www.forge.com </p>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Contact Us Top Area -->
            <!-- Map Area Start -->
            <div class="map-area mtb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="googleMap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6549998389814!2d105.78124751540255!3d21.0464859925476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab32dd484c53%3A0x4201b89c8bdfd968!2zMjM4IEhvw6BuZyBRdeG7kWMgVmnhu4d0LCBD4buVIE5odeG6vywgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1627486902986!5m2!1svi!2s" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Map Area End -->
            @include('frontend.layouts.brand')
        </section>
        <!-- End page content -->
@stop()        