@extends('frontend.master')
@section('main')
<div class="breadcrumbs-area breadcrumbs-bg ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-inner">
                    <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                    <h2 class="breadcrumbs-title text-black m-0">Checkout</h2>
                    <ul class="top-page">
                        <li><a href="index.html">Home</a></li>
                        <li>></li>
                        <li>Shop</li>
                        <li>></li>
                        <li>Checkout</li>
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
    @if(!Auth::check())
    <div class="new-arrival-area section-padding">
        <div class="text-center">
            <a href="{{route('login')}}?page=check_out" style="font-weight: bold;"><i class="fa fa-user" aria-hidden="true"></i>: Please login to continue</a>
        </div>    
    <div>
    @elseif($get_cart == null)
    <div class="new-arrival-area section-padding">
        <div class="text-center">
            <p style="font-weight: bold;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart no products <a href="{{route('shop_all')}}">Shopping now</a></p>
        </div>    
    <div>
    @else
    <!-- Start Cart Area -->
    <div class="cart-main-area pt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-tab-pill text-center text-uppercase mb-50">
                        <ul>
                            <li><a href="{{route('show_cart')}}"><span>1</span> SHOPPING CART</a></li>
                            <li class="active"><a href="{{route('check_out')}}"><span>2</span> CHECKOUT</a></li>
                            <li><a><span>3</span> ORDER COMPLETE</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-list">
                    <div role="tabpanel" class="tab-pane fade in active" id="checkout">
                        <form action="{{route('post_checkOut')}}" method="POST">
                            @csrf
                            <div class="col-sm-6">
                                <div class="checkbox-form">
                                    <h5 class="text-uppercase mb-40"><strong>BILING ADDRESS</strong></h5>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="shop-select">
                                                <label>
                                                    Full name
                                                    <span class="required">*</span>
                                                </label>
                                                @if($errors->has('name'))
                                                    <input type="text" placeholder="First name" name="name" value="{{Auth::user()->name}}" id="errors">
                                                    @foreach($errors->get('name') as $err)
                                                        <p style="color: red;">{{$err}}.</p>
                                                    @endforeach
                                                @else
                                                    <input type="text" placeholder="First name" name="name" value="{{Auth::user()->name}}">
                                                @endif 
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="shop-select mtb-30">
                                                <label>
                                                    Email
                                                    <span class="required">*</span>
                                                </label>
                                                @if($errors->has('email'))
                                                    <input type="text" placeholder="Enter Email" name="email" value="{{Auth::user()->email}}" id="errors">
                                                    @foreach($errors->get('email') as $err)
                                                        <p style="color: red;">{{$err}}.</p>
                                                    @endforeach
                                                @else
                                                    <input type="text" placeholder="Enter Email" name="email" value="{{Auth::user()->email}}">
                                                @endif 
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="shop-select">
                                                <label>
                                                    Phone no.
                                                    <span class="required">*</span>
                                                </label>
                                                @if($errors->has('phone'))
                                                    <input type="number" placeholder="Phone no." name="phone" value="{{Auth::user()->phone}}" id="errors">
                                                    @foreach($errors->get('phone') as $err)
                                                        <p style="color: red;">{{$err}}.</p>
                                                    @endforeach
                                                @else
                                                    <input type="number" placeholder="Phone no." name="phone" value="{{Auth::user()->phone}}">
                                                @endif 
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="shop-select address-input mtb-30">
                                                <label>
                                                    Address Ship
                                                    <span class="required">*</span>
                                                </label>
                                                @if($errors->has('address_ship'))
                                                    <input type="text" placeholder="Enter Address" name="address_ship" value="{{Auth::user()->address}} - {{Auth::user()->city}} - {{Auth::user()->country}}" id="errors">
                                                    @foreach($errors->get('address_ship') as $err)
                                                        <p style="color: red;">{{$err}}.</p>
                                                    @endforeach
                                                @else
                                                    <input type="text" placeholder="Enter Address" name="address_ship" value="{{Auth::user()->address}} - {{Auth::user()->city}} - {{Auth::user()->country}}">
                                                @endif 
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="shop-select mb-30">
                                                <label>
                                                    Note
                                                    <span class="required">*</span>
                                                </label>
                                                <textarea cols="30" rows="10" placeholder="Enter Note..." name="note"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-offset-1 col-sm-offset-1 col-sm-5">
                                <div class="checkout-total mb-60">
                                    <h5 class="text-uppercase mb-40"><strong>CART TOTAL</strong></h5>

                                    <div class="table-content-total table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="check-product"><strong>Product</strong></th>
                                                    <th class="check-total pull-right"><strong>Total</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($get_cart as $value)
                                                <tr class="check-product-list">
                                                    <td class="singel-check">
                                                        {{$value['name']}}
                                                        <span>X {{$value['quantity']}}</span>
                                                    </td>
                                                    <td class="singel-check pull-right">
                                                        <span>${{number_format($value['price'],0)}}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr class="check-product-list border-bottom border-top">
                                                    <td class="singel-check total-check">
                                                        Sub total
                                                    </td>
                                                    <td class="singel-check total-check pull-right">
                                                        <span>${{number_format($total_price,0)}}</span>
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
                                                        <h5 class="amount m-0"><strong>${{number_format($total_price,0)}}</strong></h5>
                                                    </td>
                                                </tr>
                                                <input type="hidden" name="total_price" value="{{$total_price}}">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <h5 class="text-uppercase mb-40"><strong>PAYMENT METHOD</strong></h5>
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h6 class="panel-title">
                                                    <span><input type="radio"></span>
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Direct Bank Transfer
                                                    </a>
                                                </h6>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitatio</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h6 class="panel-title">
                                                    <span><input type="radio"></span>
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Check Payment
                                                    </a>
                                                </h6>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitatio</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h6 class="panel-title">
                                                    <span><input type="radio"></span>
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Paypel
                                                    </a>
                                                </h6>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitatio</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="treams-conditions">
                                            <input type="radio">
                                            <p>I have read and accept the terms & conditions.</p>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="order-button-payment mt-30">
                                        <input type="submit" value="Place order">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area -->
    @endif
    @include('frontend.layouts.brand')
</section>

@stop()