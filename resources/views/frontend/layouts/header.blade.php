@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Zonex Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assets')}}/frontend/images/logo.png" width="100%">

    <!-- All css files are included here -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{url('assets')}}/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('assets')}}/frontend/css/jquery.rateyo.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{url('assets')}}/frontend/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{url('assets')}}/frontend/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{url('assets')}}/frontend/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{url('assets')}}/frontend/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="{{url('assets')}}/frontend/css/custom.css">



    <!-- Modernizr JS -->
    <script src="{{url('assets')}}/frontend/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start of header area -->
        <header>
            <div class="header-top gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 hidden-xs">
                            <div class="header-top-left">
                                <ul class="header-top-style text-capitalize mr-25">
                                    @if(Auth::check())
                                    <li><a style="cursor: pointer;"><span class="mr-10"><i class="fa fa-user" aria-hidden="true"></i></span><i class="fa fa-angle-down"></i></a>
                                        <ul class="ul-style my-account box-shadow white-bg">
                                            <li><a href="{{route('my_account')}}" class="{{($route == 'my_account') ? 'active' : ''}}">My Account</a></li>
                                            <li><a href="{{route('list-favorite')}}" class="{{($route == 'list-favorite') ? 'active' : ''}}">My Favorite</a></li>
                                            <li><a href="{{route('show_cart')}}" class="{{($route == 'show_cart') ? 'active' : ''}}">My Cart</a></li>
                                            <li><a href="{{route('list_order')}}" class="{{($route == 'list_order') ? 'active' : ''}}">My Order</a></li>
                                            <li><a href="{{route('check_out')}}" class="{{($route == 'check_out') ? 'active' : ''}}">Checkout</a></li>
                                            <li><a href="{{route('logout')}}">Log Out</a></li>
                                        </ul>
                                    </li>
                                    @else
                                    <li><a href="{{route('login')}}" class="{{($route == 'login') ? 'active' : ''}}"><span class="mr-10"> Login</i></span><i class="fa fa-angle-down"></i></a>
                                        <ul class="ul-style my-account box-shadow white-bg">
                                            <li><a href="{{route('login')}}" class="{{($route == 'login') ? 'active' : ''}}"> Register</a></li>
                                            <li><a href="{{route('show_cart')}}" class="{{($route == 'show_cart') ? 'active' : ''}}">My Cart</a></li>
                                        </ul>
                                    </li>
                                    @endif     
                                </ul>
                                <ul class="header-top-style text-capitalize mr-25">
                                    <li><a href="#"><span class="mr-10">USD</span><i class="fa fa-angle-down"></i></a>
                                        <ul class="ul-style currency box-shadow white-bg">
                                            <li><a href="#"><i class="fa fa-usd"></i><span>USD</span></a></li>
                                            <li><a href="#"><i class="fa fa-euro"></i><span>Euro</span></a></li>
                                            <li><a href="#"><i class="fa fa-gbp"></i><span>GBP</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="header-top-style pl-10">
                                    <li>
                                        <span class="mr-10"><img alt="" src="{{url('assets')}}/frontend/images/header/language/1-min.jpg"></span>
                                        <a href="#"><span class="mr-10">English</span><i class="fa fa-angle-down"></i></a>
                                        <ul class="ul-style language box-shadow white-bg">
                                            <li><a href="#"><img alt="" src="{{url('assets')}}/frontend/images/header/language/1-min.jpg"><span>English</span></a></li>
                                            <li><a href="#"><img alt="" src="{{url('assets')}}/frontend/images/header/language/2-min.jpg"><span>Germani</span></a></li>
                                            <li><a href="#"><img alt="" src="{{url('assets')}}/frontend/images/header/language/3-min.jpg"><span>French</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                        </div>
                        <form action="{{route('shop_all')}}">
                        <div class="col-sm-4 col-xs-6">
                            <div class="header-top-right">
                                <span class="mr-20"><button type="submit"  style="border: none;background: none;"><img alt="" src="{{url('assets')}}/frontend/images/header/search-icon.png"></button></span>
                                <span><input type="text" name="key"  value="{{Request::get('key')}}" class="pl-10" placeholder="Search..."></span>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row header-middle-content">
                        <div class="col-md-5 col-sm-4 hidden-xs">
                            <div class="service-inner mt-10">
                                <span class="service-img b-img">
                                    <img alt="" src="{{url('assets')}}/frontend/images/service.png">
                                </span>
                                <span class="service-content ml-15"><strong>+88 (012) 564 979 56</strong><br>We are open 9 am - 10pm</span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <div class="header-logo text-center">
                                <a href="index.html"><img alt="" src="{{url('assets')}}/frontend/images/zonex.png"></a>
                            </div>
                        </div>
                        <div class="col-md-offset-0 col-md-5 col-sm-offset-0 col-sm-4 col-xs-offset-3 col-xs-6">
                            <div class="shopping-cart">
                                <a href="{{route('show_cart')}}">
                                    <span class="shopping-cart-control">
                                        <img alt="" src="{{url('assets')}}/frontend/images/shop.png">
                                    </span>
                                    <span class="cart-size-value"><strong>Cart({{$cart->count_cart()}})</strong><br>${{number_format($cart->total_price(),0)}}</span>
                                </a>
                                <ul class="shopping-cart-down box-shadow white-bg">
                                    @foreach($cart->items as $key => $value)
                                    <li class="media">
                                        <a href="{{route('detail',$value['id'])}}" style="width: 40%;"><img alt="" src="{{url('images/products')}}/{{$value['image']}}" width="100%"></a>
                                        <div class="cart-item-wrapper">
                                            <a href="{{route('detail',$value['id'])}}">{{$value['name']}}</a>
                                            <br>
                                            <span class="quantity">
                                                <span class="amount">${{number_format($value['price'],0)}}</span>
                                                x {{$value['quantity']}}
                                            </span>
                                            <a title="Remove this item" class="remove" href="{{route('delete',$key)}}">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                    <li class="media">
                                        <span class="total-title pull-left">Sub Total</span>
                                        <span class="total pull-right">${{number_format($cart->total_price(),0)}}</span>
                                    </li>
                                    <li class="media">
                                        <a class="cart-btn" href="{{route('show_cart')}}">VIEW CART</a>
                                        <a class="cart-btn" href="{{route('check_out')}}">CHECKOUT</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('frontend.layouts.menu')
        </header>
        <!-- End of header area -->
        <!-- Start of slider area -->