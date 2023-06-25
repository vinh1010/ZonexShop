@extends('frontend.master')
@section('main')
<div class="breadcrumbs-area breadcrumbs-bg ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-inner">
                    <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                    <h2 class="breadcrumbs-title text-black m-0">ORDER DETAIL</h2>
                    <ul class="top-page">
                        <li><a href="index.html">Home</a></li>
                        <li>></li>
                        <li>Shop</li>
                        <li>></li>
                        <li>Order Detail</li>
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
    <div class="cart-main-area pt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-tab-pill text-center text-uppercase mb-50">
                        <ul>
                            <li class="active"><a href="#order"><span><i class="fa fa-eye" aria-hidden="true"></i></span> ORDER DETAIL</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-list">
                    <div role="tabpanel" class="tab-pane fade in active" id="order">
                        <div class="col-md-12">
                            <div class="order-message text-center mb-90">
                                <h5 class="text-uppercase"><strong>Your order details.</strong></h5>
                                <p>Thanks for your purchase!</p>
                            </div>
                        </div>
                        <div class="col-sm-5">
                        @foreach($orderDetail as $key => $value)
                        @if($key==0)
                            <div class="order-complete-area">
                                <h5 class="text-capitalize mb-40"><strong>Order Details</strong></h5>
                                <form action="#">
                                    <div class="table-content-total table-responsive">
                                        <table>
                                            <tbody>
                                                <tr class="check-product-list border-bottom">
                                                    <td class="singel-check total-check">
                                                        Order No
                                                    </td>
                                                    <td class="singel-check total-check pull-right">
                                                        ID : {{$value->id}}
                                                    </td>
                                                </tr>
                                                <tr class="check-product-list border-bottom">
                                                    <td class="singel-check total-check">
                                                        Date 
                                                    </td>
                                                    <td class="singel-check total-check pull-right">
                                                        {{$value->created_at->format('Y/m/d')}}
                                                    </td>
                                                </tr>
                                                <tr class="check-product-list border-bottom">
                                                    <td class="singel-check total-check">
                                                        Total 
                                                    </td>
                                                    <td class="singel-check total-check pull-right">
                                                        ${{number_format($value->total_price,0)}}
                                                    </td>
                                                </tr>
                                                <tr class="check-product-list">
                                                    <td class="singel-check total-check">
                                                        Payment Method
                                                    </td>
                                                    <td class="singel-check total-check pull-right">
                                                        Check Payment
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                            <div class="billing-address mt-40">
                                <h5 class="text-capitalize mb-40"><strong>Billing Address</strong></h5>
                                <div class="billi-address-content pl-30">
                                    <p></p>
                                    <p>Phone {{$value->phone}} # , Email # {{Auth::user()->email}}</p>
                                    <p>Note: {{$value->note}}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="col-sm-offset-2 col-sm-5">
                            <div class="cart-total-area">
                                <h5 class="text-capitalize mb-40"><strong>CART TOTAL</strong></h5>
                                <form action="#">
                                    <div class="table-content-total table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="check-product"><strong>Product</strong></th>
                                                    <th class="check-total pull-right"><strong>Total</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orderDetail as $value)
                                                <tr class="check-product-list">
                                                    <td class="singel-check">
                                                        <img src="{{url('images/products')}}/{{$value->product->image}}" alt="" width="10%" style="margin: 10px 10px;">
                                                        {{$value->product->name}}
                                                        <span>X {{$value->quantity}}</span>
                                                    </td>
                                                    <td class="singel-check pull-right" style="margin: 10px 0px;">
                                                        <span>${{number_format($value->price * $value->quantity,0)}}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @foreach($orderDetail as $key => $value)
                                                @if($key==0)
                                                <tr class="check-product-list border-bottom border-top">
                                                    <td class="singel-check total-check">
                                                        Sub total
                                                    </td>
                                                    <td class="singel-check total-check pull-right">
                                                        <span>${{number_format($value->total_price,0)}}</span>
                                                    </td>
                                                </tr>
                                                <tr class="check-product-list border-bottom">
                                                    <td class="singel-check total-check">
                                                        Shipping
                                                    </td>
                                                    <td class="singel-check total-check pull-right">
                                                        <span>$0.00</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart-grand-total">
                                                    <th class="pt-15">Grand Total</th>
                                                    <td class="pull-right pt-15">
                                                        <h5 class="amount m-0"><strong>${{number_format($value->total_price,0)}}</strong></h5>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <div class="order-button-payment mt-30">
                                    <a href="{{route('list_order')}}" class="cart-button mr-20 text-uppercase">Return To My Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area -->
    @include('frontend.layouts.brand')
</section>
<!-- End page content -->
@stop()