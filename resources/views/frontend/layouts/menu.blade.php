@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<nav class="primary-menu">
    <ul class="header-top-style text-uppercase">
        <li>
            <a href="{{route('home')}}" class="{{($route == 'home') ? 'active' : ''}}">home</a>

        </li>
        <li><a href="{{route('about')}}" class="{{($route == 'about') ? 'active' : ''}}">about</a></li>
        @foreach($category->big_catalog() as $value1)
        <li>
            <a href="{{route('category',$value1->id)}}">{{$value1->name}}</a>
            <div class="megamenu-area ul-style box-shadow white-bg">
                <div class="mega-inner ptb-40">
                    <h6 class="mega-title text-uppercase"><strong>category</strong></h6>
                    <ul class="text-capitalize forge-list">
                        @foreach($category->small_catalog() as $value)
                        @if($value1->id == $value->parent_id)
                        <li><a href="{{route('category',$value->id)}}">{{$value->name}}</a></li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <div class="mega-inner ptb-40">
                    <h6 class="mega-title text-uppercase"><strong>brands</strong></h6>
                    <ul class="text-capitalize forge-list">
                        @foreach($brand->list_brand() as $value)
                        <li><a href="{{route('brand',$value->id)}}">{{$value->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </li>
        @endforeach
        <li><a href="{{route('shop_all')}}" class="{{($route == 'shop_all') ? 'active' : ''}}">shop</a></li>
        <li>
            <a href="{{route('blog')}}" class="{{($route == 'blog') ? 'active' : ''}}">blog</a>
        </li>
        <li><a href="{{route('contact')}}" class="{{($route == 'contact') ? 'active' : ''}}">contact</a></li>
    </ul>
</nav>
</div>
</div>
</div>
<!-- Mobile Menu Start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li><a href="{{route('home')}}" class="{{($route == 'home') ? 'active' : ''}}">Home</a>
                            </li>
                            <li><a href="{{route('about')}}">about</a></li>
                            @foreach($category->big_catalog() as $value1)
                            <li>
                                <a href="{{route('category',$value1->id)}}">{{$value1->name}}</a>
                                <div class="megamenu-area ul-style box-shadow white-bg">
                                    <div class="mega-inner ptb-40">
                                        <h6 class="mega-title text-uppercase"><strong>category</strong></h6>
                                        <ul class="text-capitalize forge-list">
                                            @foreach($category->small_catalog() as $value)
                                            @if($value1->id == $value->parent_id)
                                            <li><a href="{{route('category',$value->id)}}">{{$value->name}}</a></li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="mega-inner ptb-40">
                                        <h6 class="mega-title text-uppercase"><strong>brands</strong></h6>
                                        <ul class="text-capitalize forge-list">
                                            @foreach($brand->list_brand() as $value)
                                            <li><a href="{{route('brand',$value->id)}}">{{$value->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <li><a href="{{route('shop_all')}}"  class="{{($route == 'shop_all') ? 'active' : ''}}">shop</a></li>
                            <li><a href="{{route('blog')}}" class="{{($route == 'blog') ? 'active' : ''}}">Blog</a>
                            </li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu End -->