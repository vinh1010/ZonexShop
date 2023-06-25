@extends('frontend.master')
@section('main')
<div class="breadcrumbs-area breadcrumbs-bg ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-inner">
                    <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                    <h2 class="breadcrumbs-title text-black m-0">Login / Register </h2>
                    <ul class="top-page">
                        <li><a href="index.html">Home</a></li>
                        <li>></li>
                        <li>Login / Register</li>
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
    <!-- Start Register Area -->
    <div class="register-area pt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="registered-customers">
                        <h4 class="text-uppercase mb-20"><strong>REGISTERED CUSTOMERS</strong></h4>
                        @if(Session::has('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Title!</strong> {{Session::get('error')}}.
                        </div>
                        @endif
                        <form action="{{route('post_login')}}" method="POST">
                            @csrf
                            <div class="login-account p-30 box-shadow">
                                <p>If you have an account with us, Please log in.</p>
                                @if($errors->has('email_lg'))
                                    <input type="text" placeholder="Email Address" name="email_lg" style="border: 2px solid red;">
                                    @foreach($errors->get('email_lg') as $err)
                                        <p style="color: red">{{$err}}.</p>
                                    @endforeach
                                @else
                                    <input type="text" placeholder="Email Address" name="email_lg">
                                @endif
                                
                                @if($errors->has('password'))
                                    <input type="password" placeholder="Password" name="password" style="border: 2px solid red;">
                                    @foreach($errors->get('password') as $err)
                                        <p style="color: red">{{$err}}.</p>
                                    @endforeach
                                @else
                                    <input type="password" placeholder="Password" name="password">
                                @endif
                                <input type="hidden" name="form" value="login">
                                @if(isset($page))
                                <input type="hidden" name="page" value="{{$page}}">
                                @endif
                                <p><small><a href="{{route('forgot')}}" target="_blank">Forgot our password?</a></small></p>
                                <button type="submit" class="cart-button text-uppercase">login</button>
                            </div>
                        </form>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="registered-customers new-customers">
                        <div class="section-title text-uppercase mb-40">
                            <h4>NEW CUSTOMERS</h4>
                        </div>
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Title!</strong> {{Session::get('success')}}.
                        </div>
                        @endif
                        <form action="{{route('post_register')}}" method="POST">
                            @csrf
                            <div class="login-account p-30 box-shadow">
                                <div class="row">
                                    <div class="col-sm-12">
                                    @if($errors->has('name_rs'))
                                        <input type="text" placeholder="Enter Name" name="name_rs" style="border: 2px solid red;">
                                    @foreach($errors->get('name_rs') as $err)
                                        <p style="color: red">{{$err}}.</p>
                                    @endforeach
                                    @else
                                        <input type="text" placeholder="Enter Name" name="name_rs">
                                    @endif   
                                    </div>
                                    <div class="col-sm-12">
                                    @if($errors->has('email'))
                                        <input type="text" placeholder="Enter Email" name="email" style="border: 2px solid red;">
                                    @foreach($errors->get('email') as $err)
                                        <p style="color: red">{{$err}}.</p>
                                    @endforeach
                                    @else
                                        <input type="text" placeholder="Enter Email" name="email">
                                    @endif
                                    </div>
                                </div>
                                @if($errors->has('password_rs'))
                                    <input type="password" placeholder="Password" name="password_rs" style="border: 2px solid red;">
                                    @foreach($errors->get('password_rs') as $err)
                                        <p style="color: red">{{$err}}.</p>
                                    @endforeach
                                    @else
                                    <input type="password" placeholder="Password" name="password_rs">
                                    @endif
                                @if($errors->has('cf_password'))
                                    <input type="password" placeholder="Confirm Password" name="cf_password" style="border: 2px solid red;">
                                @foreach($errors->get('cf_password') as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                                @else
                                    <input type="password" placeholder="Confirm Password" name="cf_password">
                                @endif            
                                <input type="hidden" name="form" value="register">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="cart-button text-uppercase mt-20">Register</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="reset" class="cart-button text-uppercase mt-20">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Register Area -->
    @include('frontend.layouts.brand')
</section>
<!-- End page content -->
@stop()