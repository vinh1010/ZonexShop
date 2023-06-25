@extends('frontend.master')
@section('main')
<div class="breadcrumbs-area breadcrumbs-bg ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-inner">
                    <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                    <h2 class="breadcrumbs-title text-black m-0">New Password</h2>
                    <ul class="top-page">
                        <li><a href="index.html">Home</a></li>
                        <li>></li>
                        <li>Login / New Password</li>
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
                        <h4 class="text-uppercase mb-20"><strong>NEW PASSWORD</strong></h4>
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: red">&times;</button>
                            <strong>Title!</strong> {{Session::get('success')}}.
                        </div>
                        @elseif(Session::has('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Title!</strong> {{Session::get('error')}}.
                        </div>
                        @endif
                        @php
                            $token = url()->full();
                            $token = explode('%3D',$token);   
                            $email = $_GET['email'];
                            $email = explode('?',$email);
                        @endphp
                        <form action="{{route('post_new_pass')}}" method="POST">
                            @csrf
                            <div class="login-account p-30 box-shadow">
                                <p>Enter new password.</p>
                                <input type="hidden" name="email" value="{{$email[0]}}">
                                <input type="hidden" name="token" value="{{$token[1]}}">
                                @if($errors->has('password'))
                                    <input type="password" placeholder="Enter New Password" name="password" style="border: 2px solid red;">
                                    @foreach($errors->get('password') as $err)
                                        <p style="color: red">{{$err}}.</p>
                                    @endforeach
                                @else
                                    <input type="password" placeholder="Email New Password" name="password">
                                @endif
                                <button type="submit" class="cart-button text-uppercase">Submit</button>
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