@extends('frontend.master')
@section('main')
<style>
    .pagination>li>a, .pagination>li>span{
        padding: 2px 10px;
        margin-left: 0px;
    }
    .page-item.active .page-link {
        background: #CD6289 none repeat scroll 0 0;
        border-color: #CD6289;
        color: #ffffff;
    }
    .color-1 a:hover{
        background: white !important;
    }
</style>
<div class="breadcrumbs-area breadcrumbs-bg ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-inner">
                    <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                    <h2 class="breadcrumbs-title text-black m-0">Blog </h2>
                    <ul class="top-page">
                        <li><a href="index.html">Home</a></li>
                        <li>></li>
                        <li>Blog</li>
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
    <!-- Start Blog Page Area -->
    <div class="blog-page pt-90">
        <div class="container">
            <div class="row">
                @foreach($blog as $items)
                <div class="col-sm-6 col-xs-12">
                    <div class="single-blog-list mb-30">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="blog-image">
                                    <a href="{{route('blog_detail',$items->id)}}">
                                        <img src="{{url('images')}}/blogs/{{$items->image}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="blog-desc text-center pt-30">
                                    <h6 class="blog-title text-text-capitalize">
                                        <a href="{{route('blog_detail',$items->id)}}">{!!$items->title!!}</a>
                                    </h6>
                                    <p>{!!Str::limit($items->summary,80)!!}</p>
                                    <div class="read-more">
                                        <a href="{{route('blog_detail',$items->id)}}">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="shop-view-area clear pt-30">
                    <div class="row">
                        <div class="col-md-2 col-sm-3 col-xs-4">
                        </div>
                        <div class="col-md-6 col-sm-4 hidden-xs">
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-8">
                            <div class="shop-pagination">
                                <label>Page : </label>
                                <ul>
                                    {{$blog->appends(request()->all())->links()}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Page Area -->
    @include('frontend.layouts.brand')
</section>
<!-- End page content -->
@stop()