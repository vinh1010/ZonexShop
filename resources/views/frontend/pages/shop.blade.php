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
                    <h2 class="breadcrumbs-title text-black m-0">SHOP</h2>
                    <ul class="top-page">
                        <li><a href="index.html">Home</a></li>
                        <li>></li>
                        <li>Shop</li>
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
    <!-- Start Shop Left Side Bar -->
    <div class="shop-left-side-area section-padding">
        <div class="container">
            <div class="row rp-style-2">
                <div class="col-xs-12 col-sm-9 col-sm-push-3 cp-style-2">
                    <!-- Start Shop Pagination Area -->
                    <div class="shop-view-area">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-4">
                            </div>
                           
                            <div class="col-md-10 col-sm-9 hidden-xs">
                                <div class="shop-tab-pill" style="float: right;">
                                    <form>
                                    <div class="show-label showing">
                                        <label>Finters : </label>
                                         <select name="finter" id="finter">
                                            <option value="{{request()->fullUrlWithQuery(['find_by' => 'pro_new'])}}" {{(Request::get('find_by') == 'pro_new') ? 'selected' : ''}}>Product New</option>
                                            <option value="{{request()->fullUrlWithQuery(['find_by' => 'max'])}}" {{(Request::get('find_by') == 'max') ? 'selected' : ''}}>Low to high price</option>
                                            <option value="{{request()->fullUrlWithQuery(['find_by' => 'min'])}}" {{(Request::get('find_by') == 'min') ? 'selected' : ''}}>High to low price</option>
                                            <option value="{{request()->fullUrlWithQuery(['find_by' => 'pro_sale'])}}" {{(Request::get('find_by') == 'pro_sale') ? 'selected' : ''}}>Discount Products</option>
                                        </select>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Shop  Pagination Area -->
                    <!-- Start Product List -->
                    <div class="product-list-tab modify-tnm">
                        <div class="product-list tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <div class="product-container-list rp-style-2">
                                    @foreach($list_product as  $value)
                                    <div class="product-inner cp-style-2 mt-30">
                                        <a href="{{route('detail',$value->id)}}">
                                            <div class="product-img b-img">
                                                <img alt="" src="{{url('images/products')}}/{{$value->image}}">
                                            </div>
                                        </a>
                                        @if($value->sale_price > 0)
                                        @php
                                            $sale = ($value->sale_price/$value->price)*100;
                                        @endphp
                                        <span class="product-tag text-uppercase orang-bg">Sale -{{number_format(100 - $sale,0)}}%</span>
                                        @else
                                        <span class="product-tag text-uppercase black-bg">new</span>
                                        @endif
                                        <ul class="quick-veiw text-center">
                                            <form action="{{route('cart',$value->id)}}" method="POST">
                                            @csrf   
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="size" value="{{$productAttribute->get_size($value->id)->pluck('value')[0]}}">
                                                <input type="hidden" name="color" value="{{$productAttribute->get_color($value->id)->pluck('name')[0]}}">
                                                <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                                            </form>
                                            <li><a href="{{route('detail',$value->id)}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href=""><i class="fa fa-refresh"></i></a></li>
                                            @if(count($favoriteProduct->find_favorite($value->id,$user_id)) == 1)
                                            <li><a href="{{route('delete_favorite',$favoriteProduct->find_favorite($value->id,$user_id)[0])}}"><i class="fa fa-heart" style="color: red;"></i></a></li>
                                            @else
                                            <li><a href="{{route('add_favorite',$value->id)}}"><i class="fa fa-heart"></i></a></li>
                                            @endif
                                        </ul>
                                        <div class="product-text pt-10">
                                            <ul class="pull-left list-inline ratings">
                                            <div id="rateYoHome1{{$value->id}}" class="mr-4" style="margin-top: 5px;"></div>
                                                @section('star_js')
                                                    @parent
                                                    <script>
                                                        $(function () {
                                                            $("#rateYoHome1{{$value->id}}").rateYo({
                                                                normalFill: "#bbb",
                                                                starWidth: "15px",
                                                                rating: "{{$value->Star($value->id)/5*100}}%",
                                                                readOnly: true,
                                                                precision: 0
                                                            });

                                                        });
                                                    </script>
                                                @stop
                                            </ul>
                                            <ul class="pricing list-inline pull-right">
                                            @if($value->sale_price > 0)
                                            <li class="text-right c-price">${{number_format($value->sale_price,0)}}</li>
                                            <li class="text-right p-price">${{number_format($value->price,0)}}</li>
                                            @else
                                            <li class="text-right c-price">${{number_format($value->price,0)}}</li>
                                            @endif
                                            </ul>
                                            <div class="clear"></div>
                                            <h6 class="product-name m-0">
                                                <a title="{{$value->name}}" href="{{route('detail',$value->id)}}">{{$value->name}}</a>
                                            </h6>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Shop Left Side Bar -->
                    <!-- Start Shop Pagination Area -->
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
                                        {{$list_product->appends(request()->all())->links()}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Shop  Pagination Area -->
                </div>
                <div class="col-xs-12 col-sm-3 col-sm-pull-9 cp-style-2">
                    <div class="aside-list">
                        <aside class="single-aside mb-40">
                            <h5 class="widget-title text-uppercase text-black pb-15"><strong>CATEGORY</strong></h5>
                            <ul class="widget-menu text-capitalize pb-10">
                                @foreach($category->big_catalog() as $value)
                                <li><a href="{{route('category',$value->id)}}"><i class="fa fa-angle-right" aria-hidden="true"></i> {{$value->name}} <span>({{$product->count_pro_by_cate($value->id)}})</span></a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="single-aside mb-40">
                            <h5 class="widget-title text-uppercase text-black pb-15"><strong>MATERIALS</strong></h5>
                            <ul class="widget-menu text-capitalize pb-10">
                                @foreach($material->list_material() as $value)
                                <li><a href="{{route('material',$value->id)}}"><i class="fa fa-angle-right" aria-hidden="true"></i> {{$value->name}} <span>({{$product_material->count_pro($value->id)}})</span></a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="single-aside mb-40">
                            <h5 class="widget-title text-uppercase text-black pb-15"><strong>BRANDS</strong></h5>
                            <ul class="widget-menu text-capitalize pb-10">
                                @foreach($brand->list_brand() as $value)
                                <li><a href="{{route('brand',$value->id)}}"><i class="fa fa-angle-right" aria-hidden="true"></i> {{$value->name}} <span>({{$value->product()->count()}})</span></a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="single-aside mb-40">
                            <h5 class="widget-title text-uppercase text-black pb-15 mb-30"><strong>FILTER BY SIZE</strong></h5>
                            <ul class="widget-size text-uppercase pb-30">
                            @foreach($attribute->list_size() as $value)
                                @if($value->value == 'One Size')
                                <li><a href="{{route('attribute',$value->id)}}">OS</a></li>
                                @else
                                <li><a href="{{route('attribute',$value->id)}}">{{$value->value}}</a></li>
                                @endif
                            @endforeach
                            </ul>
                        </aside>
                        <aside class="single-aside mb-40 pb-20">
                            <h5 class="widget-title text-uppercase text-black pb-15 mb-30"><strong>FILTER BY COLOR</strong></h5>
                            <ul class="widget-color text-uppercase pb-10">
                                @foreach($attribute->list_color() as $key => $value)
                                @if($key < 9)
                                <li class="color-1" title="{{$value->name}}"><a href="{{route('attribute',$value->id)}}" style="background: {{$value->value}};"></a></li>
                                @endif
                                @endforeach
                            </ul>
                            <ul class="widget-color text-uppercase">
                            @foreach($attribute->list_color() as $key => $value)
                                @if($key > 9)
                                <li class="color-1" title="{{$value->name}}"><a href="{{route('attribute',$value->id)}}" style="background: {{$value->value}};"></a></li>
                                @endif
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End page content -->
@include('sweetalert::alert')
@stop()