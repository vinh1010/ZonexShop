<!-- Start Brand Area -->
<div class="brand-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-35">
                    <h2 class="text-uppercase"><strong>OUR BRAND</strong></h2>
                    <p class="text-defualt">BRAND</p>
                    <img alt="" src="{{url('assets')}}/frontend/images/section-border.png">
                </div>
                <div class="brand-carousel">
                    @foreach($brand->list_brand() as $value)
                    <div class="col-md-12">
                        <div class="single-brand text-center">
                            <a href="{{route('brand',$value->id)}}">
                                <img src="{{url('images')}}/brands/{{$value->logo}}" alt="">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Brand Area -->