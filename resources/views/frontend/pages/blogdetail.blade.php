@extends('frontend.master')
@section('main')
<div class="breadcrumbs-area breadcrumbs-bg ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-inner">
                    <h5 class="breadcrumbs-disc m-0">Best Products for you</h5>
                    <h2 class="breadcrumbs-title text-black m-0">Blog Details </h2>
                    <ul class="top-page">
                        <li><a href="index.html">Home</a></li>
                        <li>></li>
                        <li>Blog</li>
                        <li>></li>
                        <li>Blog Details</li>
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
    <div class="blog-details-area pt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-push-3 col-xs-12">
                    <div class="single-blog fix">
                        <div class="post-thumbnail mb-50 b-img">
                            <a href="blog-details.html">
                                <img src="{{url('images')}}/blogs/{{$detail->image}}" alt="">
                            </a>
                        </div>
                        <div class="postinfo-wrapper pl-100">
                            <div class="post-date text-uppercase ptb-10">
                                <span class="day">10</span>
                                <span class="month">Mar</span>
                            </div>
                            <div class="post-info">
                                <h3 class="blog-post-title mb-20">
                                    <a href="blog-details.html">{{$detail->title}}</a>
                                </h3>
                                <div class="entry-meta ptb-10 mb-30 text-uppercase">
                                    Posted by
                                    <span class="author vcard">
                                        <a title="View all posts by admin" class="url fn n" href="#">admin</a>
                                    </span>
                                    /
                                    <a href="#">Fashion</a>
                                    ,
                                    <a href="#">HTML</a>
                                </div>
                                <div class="entry-summary">
                                    {!!$detail->content!!}
                                </div>
                                <div class="entry-meta ptb-10 mb-30 text-uppercase">
                                    <a href="#">3 comments </a>
                                    <span class="author vcard">/ Tags:</span>
                                    /
                                    <a href="#">fashion</a>
                                    ,
                                    <a href="#">t-shirt</a>
                                    ,
                                    <a href="#">white</a>
                                </div>
                                <div class="share-icon text-uppercase mb-50 pt-30">
                                    <h5>Share this post</h5>
                                    <ul>
                                        <li>
                                            <a target="_blank" class="facebook" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" class="twitter" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" class="pinterest" href="#">
                                                <i class="fa fa-pinterest"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" class="google-plus" href="#">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" class="linkedin" href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="author-info mb-30">
                                    <div class="author-avatar b-img">
                                        <img src="{{url('assets')}}/frontend/images/blog/avatar.png" alt="">
                                    </div>
                                    <div class="author-description pl-20">
                                        <h6>
                                            About the Author:
                                            <a href="#">Admin</a>
                                        </h6>
                                        <p>Cras id nulla at metus congue auctor. Suspendisse auctor dictum orci quis interdum. Nullam et eleifend metus. Integer in est orci. Duis hendrerit ex metus, vel tempor sem aliquet nec. Donec ornare hendrerit bibendum. Nullam dui erat, tempus eu nisl vitae, venenatis gravida ipsum. Suspendisse potenti.</p>
                                    </div>
                                </div>
                                <div class="reply-comment-area mb-20">
                                    <h4 class="mb-50 pt-20">{{$comment->count()}} comments</h4>

                                    @if($comment != null)
                                    @foreach($comment as $value)
                                    <div class="single-reply mb-20">
                                        <div class="comment-author">
                                            <img src="{{url('images/avatars')}}/{{$value->get_user->avatar}}" alt="">
                                        </div>
                                        <div class="comment-info p-10">
                                            <div class="comment-author-info mb-10">
                                                <a href="#">

                                                    <b>{{$value->get_user->name}}</b>
                                                </a>
                                                <span>{{$value->created_at}}</span>
                                            </div>
                                            <p>{{$value->content}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="user-comment-form-area">
                                    <h4 class="mb-50 pt-20">Comments</h4>
                                    @if(Auth::check())
                                    <form action="{{route('post_cmt',$detail->id)}}" method="post">
                                        @csrf
                                        <input type="hidden" name="blog_id" value="{{$detail->id}}">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="form-row">
                                                    <label>Content</label>
                                                    <textarea name="content"></textarea>
                                                </p>
                                                <p class="form-row"><button type="submit" class="btn btn-primary">Send</button></p>
                                            </div>
                                        </div>

                                    </form>
                                    @else
                                    <a class="button extra-small text-uppercase" href="{{route('login')}}?page=blog">
                                        <span>Login</span>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-pull-9 col-xs-12">
                    <div class="left-blog-sidebar">
                        <div class="blog-sidebar mb-30 fix">
                            <h4 class="aside-title text-uppercase pb-20 mb-30">Search</h4>
                            <form action="#" id="blog-search">
                                <input type="text" placeholder="Search">
                                <button class="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog-sidebar mb-30 fix">
                            <h4 class="aside-title text-uppercase pb-20 mb-30">Categories</h4>
                            <ul>
                                @foreach($cat as $vl)
                                <li><a href="#">{{$vl->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog-sidebar post mb-30 fix">
                            <h4 class="aside-title text-uppercase pb-20 mb-30">Recent Post</h4>
                            <ul>
                                @foreach($recentblog as $value)
                                <li>
                                    <div class="post-thumb b-img">
                                        <a href="{{route('blog_detail',$value->id)}}">
                                            <img src="{{url('images')}}/blogs/{{$value->image}}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <a href="{{route('blog_detail',$value->id)}}">{!!Str::limit($value->title,15)!!}</a>
                                        <span>{{$value->created_at}}</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Page Area -->
    @include('frontend.layouts.brand')
</section>
@stop()