 <!-- Banner Area Start -->
 <div class="banner-two-area">
     <div class="banner-two-bottom">
         @if($list_banner!=null)
         @foreach($list_banner as $value)
         @if($value->position==1)
         <div class="single-banner-two">
             <div class="banner-two-img">
                 <a href="#">
                     <img src="{{url('images/banners')}}/{{$value->image}}" alt="">
                 </a>
             </div>
             <div class="banner-two-text left-middle-bottom">
                 <div class="banner-two-opacity-inner">
                     <div class="banner-two-text-inner banner-bottom-text-inner text-uppercase">
                         <h2 class="bottom-banner-title">{{$value->name}}</h2>
                         <a href="{{route('shop_all')}}" class="btn-shop">SHOP NOW</a>
                     </div>
                     <div class="banner-opacity text-center bags text-uppercase">
                         <h1>{{$value->category->name}}</</h1>
                     </div>
                 </div>
             </div>
         </div>
         @endif
         @endforeach
         @else
         <div class="single-banner-two">
             <div class="banner-two-img">
                 <a href="#">
                     <img src="{{url('assets')}}/frontend/images/banner/9.jpg" alt="">
                 </a>
             </div>
             <div class="banner-two-text right-middle-bottom">
                 <div class="banner-two-opacity-inner">
                     <div class="banner-two-text-inner banner-bottom-text-inner text-uppercase">
                         <h2 class="bottom-banner-title">WOMEN’S</h2>
                         <h2>summer collection</h2>
                         <a href="#" class="btn-shop">VIEW COLLECTION</a>
                     </div>
                     <div class="banner-opacity text-center summer text-uppercase">
                         <h1>SUMMER</h1>
                     </div>
                 </div>
             </div>
         </div>
         @endif
     </div>
 </div>
 <!-- Banner Area End -->