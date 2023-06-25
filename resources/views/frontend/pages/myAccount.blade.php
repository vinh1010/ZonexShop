@extends('frontend.master')
@section('main')
<div class="breadcrumbs-area breadcrumbs-bg ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-inner">
                    <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                    <h2 class="breadcrumbs-title text-black m-0">My Account </h2>
                    <ul class="top-page">
                        <li><a href="index.html">Home</a></li>
                        <li>></li>
                        <li>My Account</li>
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
            <a href="{{route('login')}}?page=my_account" style="font-weight: bold;"><i class="fa fa-user" aria-hidden="true"></i>: Please login to continue</a>
        </div>    
    <div>
    @else
    <!-- Start My Account -->
    <div class="my-account-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="procced-checkout">
                        <h4 class="procced-title text-uppercase pb-15 mb-20"><strong>Procced to Checkout</strong></h4>
                        <p>Welcome to your account. Here you can manage all of your personal information and orders.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="addresses-lists">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fa fa-info" aria-hidden="true"></i>
                                            <span>Customer Information</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="coupon-info">
                                            <h6 class="procced-title text-uppercase pb-15 mb-20">Your addresses </h6>
                                            <p class="text-black">To add a new address, please fill out the form below.</p>
                                            <p class="required">*Required field</p>
                                            <form action="{{route('user_profile')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                                <div class="shop-select mb-15">
                                                    <label>Avatar<span class="required">*</span></label>
                                                    @if(Auth::user()->avatar)
                                                    <div id="profile-container">
                                                        <image id="profileImage" width="100%" src="{{url('images/avatars')}}/{{Auth::user()->avatar}}">
                                                    </div>
                                                    @else
                                                    <div id="profile-container">
                                                        <image id="profileImage" width="100%" src="{{url('assets')}}/frontend/images/user-image.png">
                                                    </div>
                                                    @endif
                                                    <input style="margin-top: 20px;" type="file" name="avatar">
                                                </div>
                                                <div class="shop-select mb-15">
                                                    <label>Your Full Name<span class="required">*</span></label>
                                                    @if($errors->has('name'))
                                                    <input type="text" name="name" placeholder="Enter Full Name" value="{{Auth::user()->name}}" id="errors">
                                                        @foreach($errors->get('name') as $err)
                                                            <p style="color: red">{{$err}}.</p>
                                                        @endforeach
                                                    @else
                                                    <input type="text" name="name" placeholder="Enter Full Name" value="{{Auth::user()->name}}">
                                                    @endif
                                                </div>
                                                <div class="shop-select mb-15">
                                                    <label><span class="required">*</span>E-mail address</label>  
                                                    @if($errors->has('email'))
                                                        <input type="text" name="email" placeholder="Enter Email Address" value="{{Auth::user()->email}}" id="errors">
                                                        @foreach($errors->get('email') as $err)
                                                            <p style="color: red">{{$err}}.</p>
                                                        @endforeach
                                                    @else
                                                        <input type="text" name="email" placeholder="Enter Email Address" value="{{Auth::user()->email}}">
                                                    @endif
                                                </div>
                                                <div class="shop-select mb-15">
                                                    <label>Mobile phone<span class="required">*</span></label>
                                                    @if($errors->has('phone'))
                                                        <input type="number" name="phone" placeholder="Enter Phone" value="{{Auth::user()->phone}}" id="errors">
                                                        @foreach($errors->get('phone') as $err)
                                                            <p style="color: red">{{$err}}.</p>
                                                        @endforeach
                                                    @else
                                                        <input type="number" name="phone" placeholder="Enter Phone" value="{{Auth::user()->phone}}">
                                                    @endif
                                                </div>
                                                <div class="shop-select mb-15">
                                                    <label>Country<span class="required">*</span></label>
                                                    <input type="text" name="country" placeholder="Enter Contry" value="{{Auth::user()->country}}">
                                                </div>
                                                <div class="shop-select mb-15">
                                                    <label>City<span class="required">*</span></label>
                                                    <input type="text" name="city" placeholder="Enter City" value="{{Auth::user()->city}}">
                                                </div>
                                                <div class="shop-select mb-15">
                                                    <label>Address<span class="required">*</span></label>
                                                    <textarea name="address" id="" cols="20" rows="10" placeholder="House Number - Street Number - District...">{{Auth::user()->address}}</textarea>
                                                </div>
                                                <div class="buton">
                                                    <button type="submit" class="button extra-small" title="Save">
                                                        <span>Save</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                            <i class="fa fa-refresh" aria-hidden="true"></i>
                                            <span>Change The Password</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        <div class="coupon-info">
                                            <h6 class="procced-title text-uppercase pb-15 mb-20">Your Password </h6>
                                            <p class="text-black">To change your password please fill out the information below.</p>
                                            <p class="required">*Required field</p>
                                            <form action="{{route('change_password')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                                <div class="shop-select mb-15">
                                                    <label><span class="required">*</span>Current Password</label>
                                                    @if($errors->has('password'))
                                                        <input type="password" name="password" placeholder="Enter Current Password" id="errors">
                                                        @foreach($errors->get('password') as $err)
                                                            <p style="color: red">{{$err}}.</p>
                                                        @endforeach
                                                    @else
                                                        <input type="password" name="password" placeholder="Enter Current Password">
                                                    @endif
                                                </div>
                                                <div class="shop-select mb-15">
                                                    <label>New Password</label>
                                                    @if($errors->has('new_password'))
                                                        <input type="password" name="new_password" placeholder="Enter New Password" id="errors">
                                                        @foreach($errors->get('new_password') as $err)
                                                            <p style="color: red">{{$err}}.</p>
                                                        @endforeach
                                                    @else
                                                        <input type="password" name="new_password" placeholder="Enter New Password">
                                                    @endif
                                                </div>
                                                <div class="shop-select mb-15">
                                                    <label>Confirmation</label>
                                                    @if($errors->has('confirm'))
                                                        <input type="password" name="confirm" placeholder="Confirmation" id="errors">
                                                        @foreach($errors->get('confirm') as $err)
                                                            <p style="color: red">{{$err}}.</p>
                                                        @endforeach
                                                    @else
                                                        <input type="password" name="confirm" placeholder="Confirmation">
                                                    @endif
                                                </div>
                                                <div class="buton">
                                                    <button type="submit" title="Save" class="button extra-small">
                                                        <span>Save</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="myaccount-link-list">
                            <div class="panel panel-default mb-5">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="{{route('list-favorite')}}">
                                            <i class="fa fa-heart"></i>
                                            <span>My Favorite</span>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default m-0">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="{{route('list_order')}}">
                                            <i class="fa fa-list-ol"></i>
                                            <span>Order history and details</span>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of My Account -->
    @endif
    @include('frontend.layouts.brand')
</section>
@include('sweetalert::alert')
@stop()