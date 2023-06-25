@extends('frontend.master')
@section('main')
<div class="breadcrumbs-area breadcrumbs-bg ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-inner">
                    <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                    <h2 class="breadcrumbs-title text-black m-0">SHOPPING CART</h2>
                    <ul class="top-page">
                        <li><a href="index.html">Home</a></li>
                        <li>></li>
                        <li>Shop</li>
                        <li>></li>
                        <li>Cart</li>
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
    @if($get_cart == null)
    <div class="new-arrival-area section-padding">
        <div class="text-center">
            <p style="font-weight: bold;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart no products <a href="{{route('home')}}">Shopping now</a></p>
        </div>    
    <div>
    @else
    <div class="cart-main-area pt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-tab-pill text-center text-uppercase mb-50">
                        <ul>
                            <li class="active"><a href="{{route('show_cart')}}"><span>1</span> SHOPPING CART</a></li>
                            <li><a href="{{route('check_out')}}"><span>2</span> CHECKOUT</a></li>
                            <li><a><span>3</span> ORDER COMPLETE</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-list">
                    <div role="tabpanel" class="tab-pane fade in">


                        <div class="table-content table-responsive text-uppercase mb-50">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail text-left">PRODUCT NAME</th>
                                        <th class="product-name"></th>
                                        <th class="product-price text-center">UNIT PRICE</th>
                                        <th class="product-quantity text-center">QUANTITY</th>
                                        <th class="product-subtotal text-center">Total</th>
                                        <th class="product-remove"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($get_cart as $key => $value)
                                    <form action="{{route('update')}}" method="POST">
                                        @csrf
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="{{route('detail',$value['id'])}}"><img src="{{url('images/products')}}/{{$value['image']}}" alt="" width="100%"></a>
                                            </td>
                                            <td class="cart-product-name">
                                                <a href="{{route('detail',$value['id'])}}">
                                                    <h6><strong>{{$value['name']}}</strong></h6>
                                                </a>
                                                <p>Lorem ipsum dolor sit amet <br> consectetur adipiscing </p>
                                                <label>
                                                    <span style="display: flex;">
                                                        <ul style="display: flex;">
                                                            <li style="padding-top: 5px;font-weight: bold;color: black;">Size :</li>
                                                            <li class="attribute">
                                                                <select name="size">
                                                                    @foreach($value['product']->get_atttribute_size($value['id']) as $vl)
                                                                    <option value="{{$vl->value}}" {{($vl->value == $value['size']) ? 'selected' : ''}}>{{$vl->value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </li>
                                                        </ul>
                                                        <ul style="display: flex; margin-left: 20px;">
                                                            <li style="padding-top: 5px;font-weight: bold;color: black;">Color :</li>
                                                            <li class="attribute">
                                                                <select name="color">
                                                                    @foreach($value['product']->get_atttribute_color($value['id']) as $vl)
                                                                    <option value="{{$vl->name_color}}" {{($vl->name_color == $value['color']) ? 'selected' : ''}}>{{$vl->name_color}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </li>
                                                        </ul>
                                                    </span>
                                                </label>
                                            </td>
                                            <td class="cart-product-size text-center">
                                                <h6 style="padding-top: 10px;"><strong>${{$value['price']}}</strong></h6>
                                            </td>
                                            <td class="cart-product-price text-center">
                                                <span class="quantity-wanted-p pull-left">
                                                    <span class="dec qtybutton">-</span>
                                                    <input type="number" class="cart-plus-minus-box" name="quantity" value="{{$value['quantity']}}">
                                                    <span class="inc qtybutton">+</span>
                                                </span>
                                            </td>
                                            <td class="cart-product-total text-center">
                                                <h6 style="padding-top: 10px;"><strong>${{$value['quantity'] * $value['price']}}</strong></h6>
                                            </td>
                                            <td class="cart-trash text-center">
                                                <button type="submit" style="background: none;" title="update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <a href="{{route('delete',$key)}}" title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <input type="hidden" name="id" value="{{$key}}">
                                        <input type="hidden" value="{{$value['id']}}" name="product_id">

                                    </form>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <div class="cart-total clearfix">
                                    <h6 class="cart-title text-uppercase mb-30"><strong>CART TOTAL</strong></h6>
                                    <div class="table-content-total table-responsive mb-20">
                                        <table>
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td>
                                                        <h6 class="amount"><strong>${{number_format($total_price,0)}}</strong></h6>
                                                    </td>
                                                </tr>
                                                <tr class="cart-subtotal">
                                                    <th>Shipping</th>
                                                    <td>
                                                        <h6 class="amount"><strong>$0.00</strong></h6>
                                                    </td>
                                                </tr>
                                                <tr class="cart-grand-total">
                                                    <th>Grand Total</th>
                                                    <td>
                                                        <h5 class="amount"><strong>${{number_format($total_price,0)}}</strong></h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="update-checkout pull-right">
                                        <a href="{{route('check_out')}}">CHECKOUT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- End Cart Area -->
    @include('frontend.layouts.brand')
</section>
@stop()