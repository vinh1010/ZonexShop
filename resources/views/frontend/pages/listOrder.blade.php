@extends('frontend.master')
@section('main')
<style>
    .table-content table th {
        padding: 0px;
    }

    .table-content table td {
        text-transform: none;
    }

    .value2{
        display: none;
    }

    .errvl1{
        margin-top: 50px;
    }
    .errvl2{
        margin-top: 50px;
    }

    .taitle{
        margin-top: 20px;
    }
    
</style>
<div class="breadcrumbs-area breadcrumbs-bg ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-inner">
                    <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                    <h2 class="breadcrumbs-title text-black m-0">My Order</h2>
                    <ul class="top-page">
                        <li><a href="index.html">Home</a></li>
                        <li>></li>
                        <li>Shop</li>
                        <li>></li>
                        <li>Order</li>
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
    <!-- Start Cart Area -->
    @if(Auth::check())
    <div class="cart-main-area pt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-tab-pill text-center text-uppercase mb-50">
                        <ul>
                            <li class="active" id="order"><a><span><i class="fa fa-list" aria-hidden="true"></i></span> LIST ORDER</a></li>
                            <li id="history"><a ><span><i class="fa fa-history" aria-hidden="true"></i></span> ORDER HISTORY</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-list">       
                    <div class="value1">
                        @if(count($list_order) != 0)
                            <div class="table-content table-responsive text-uppercase mb-50">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Id Order</th>
                                            <th class="product-name">Address Ship</th>
                                            <th class="product-name">Phone</th>
                                            <th class="product-name">Total Price</th>
                                            <th class="product-name" style="width: 20%;">Status</th>
                                            <th class="product-name">Order Date</th>
                                            <th class="product-remove"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($list_order as $value)
                                        <tr>
                                            <td class="cart-product-total">
                                                <h6 style="padding-top: 10px;">{{$value->id}}</h6>
                                            </td>
                                            <td class="cart-product-total">
                                                <h6 style="padding-top: 10px;">{{$value->address_ship}}</h6>
                                            </td>
                                            <td class="cart-product-total">
                                                <h6 style="padding-top: 10px;">{{$value->phone}}</h6>
                                            </td>
                                            <td class="cart-product-total">
                                                <h6 style="padding-top: 10px;">${{number_format($value->total_price,0)}}</h6>
                                            </td>
                                            @if($value->status == 1)
                                            <td class="cart-product-total">
                                                <p style="padding-top: 5px;padding-bottom: 5px;margin-top: 10px;background: red;" class="badge badge-red">Waiting for confirmation</p>
                                            </td>
                                            @elseif($value->status == 2)
                                            <td class="cart-product-total">
                                                <p style="padding-top: 5px;padding-bottom: 5px;margin-top: 10px;background: orange;" class="badge badge-red">Confirmed</p>
                                            </td>
                                            @elseif($value->status == 3)
                                            <td class="cart-product-total">
                                                <p style="padding-top: 5px;padding-bottom: 5px;margin-top: 10px;background: blue;" class="badge badge-red">Delivery in progress</p>
                                            </td>
                                            @elseif($value->status == 4)
                                            <td class="cart-product-total">
                                                <p style="padding-top: 5px;padding-bottom: 5px;margin-top: 10px;background: green;" class="badge badge-blue">Delivered</p>
                                            </td>
                                            @endif
                                            <td class="cart-product-total">
                                                <h6 style="padding-top: 10px;">{{$value->created_at->format('Y/m/d')}}</h6>
                                            </td>
                                            <td class="cart-trash text-center">
                                                <a href="{{route('order_detail',$value->id)}}" title="view detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="{{route('cancel_order',$value->id)}}" title="cancel order"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                        <div class="errvl1">
                            <div class="text-center">
                                <p style="font-weight: bold;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> You don't have any orders yet <a href="{{route('home')}}">Shopping now</a></p>
                            </div>    
                        <div>
                        @endif
                    </div>

                    <div class="value2">
                        @if(count($history_order) != 0)
                            <div class="table-content table-responsive text-uppercase mb-50">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Id Order</th>
                                            <th class="product-name">Address Ship</th>
                                            <th class="product-name">Phone</th>
                                            <th class="product-name">Total Price</th>
                                            <th class="product-name" style="width: 20%;">Status</th>
                                            <th class="product-name">Order Date</th>
                                            <th class="product-remove"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($history_order as $value)
                                        <tr>
                                            <td class="cart-product-total">
                                                <h6 style="padding-top: 10px;">{{$value->id}}</h6>
                                            </td>
                                            <td class="cart-product-total">
                                                <h6 style="padding-top: 10px;">{{$value->address_ship}}</h6>
                                            </td>
                                            <td class="cart-product-total">
                                                <h6 style="padding-top: 10px;">{{$value->phone}}</h6>
                                            </td>
                                            <td class="cart-product-total">
                                                <h6 style="padding-top: 10px;">${{number_format($value->total_price,0)}}</h6>
                                            </td>
                                            @if($value->status == 4)
                                            <td class="cart-product-total">
                                                <p style="padding-top: 5px;padding-bottom: 5px;margin-top: 10px;background: green;" class="badge badge-blue">Delivered</p>
                                            </td>
                                            @else
                                            <td class="cart-product-total">
                                                <p style="padding-top: 5px;padding-bottom: 5px;margin-top: 10px;background: grey;" class="badge badge-blue">Cancelled</p>
                                            </td>
                                            @endif
                                            <td class="cart-product-total">
                                                <h6 style="padding-top: 10px;">{{$value->created_at->format('Y/m/d')}}</h6>
                                            </td>
                                            <td class="cart-trash text-center">
                                                <a href="{{route('order_detail',$value->id)}}" title="view detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                        <div class="errvl2">
                            <div class="text-center">
                                <p style="font-weight: bold;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> You don't have any history order yet
                            </div>    
                        <div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area -->
    @else
    <div class="new-arrival-area section-padding">
        <div class="text-center">
            <a href="{{route('login')}}?page=list_order" style="font-weight: bold;"><i class="fa fa-user" aria-hidden="true"></i>: Please login to continue</a>
        </div>    
    <div>
    @endif
    @include('frontend.layouts.brand')
</section>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#history').click(function(event){
            $('.value1').css('display','none');
            $('.value2').css('display','block');
            $('.value3').css('display','none');
            $('#history').addClass("active");
            $('#order').removeClass("active");
            $('#cenced').removeClass("active");
        });
        $('#order').click(function(event){
            $('.value1').css('display','block');
            $('.value2').css('display','none');
            $('.value3').css('display','none');
            $('#order').removeClass("active");
            $('#order').addClass("active");
            $('#cenced').removeClass("active");
            $('#history').removeClass("active");
        });
    });
</script>
@include('sweetalert::alert')
@stop()