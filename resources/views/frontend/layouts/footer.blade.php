<footer id="footer" class="footer-area">
    <div class="footer-top-area text-center ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-top-content">
                        <a href="index.html">
                            <img src="{{url('assets')}}/frontend/images/logo.png" alt="">
                        </a>
                        <p class="pb-30">Forge is the best ecommerce site lorem ipsum dolor sit amet, consectetur aiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                        <ul class="social-icon">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle-area footer-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-footer-inner">
                        <h5 class="footer-title text-white">CONTACT</h5>
                        <ul class="footer-contact">
                            <li class="contact-icon">
                                <img alt="" src="{{url('assets')}}/frontend/images/footer/icon/1.png">
                            </li>
                            <li class="footer-text text-ash">
                                <p>8901 Marmora Raod,</p>
                                <p>Glasgow, D04  89GR</p>
                            </li>
                        </ul>
                        <ul class="footer-contact">
                            <li class="contact-icon">
                                <img alt="" src="{{url('assets')}}/frontend/images/footer/icon/2.png">
                            </li>
                            <li class="footer-text text-ash">
                                <p>Telephone : (801) 4256  9856</p>
                                <p>Telephone : (801) 4256  9658</p>
                            </li>
                        </ul>
                        <ul class="footer-contact">
                            <li class="contact-icon">
                                <img alt="" src="{{url('assets')}}/frontend/images/footer/icon/3.png">
                            </li>
                            <li class="footer-text text-ash">
                                <p>Email : info@forge.com</p>
                                <p>Web : www.zonex.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="single-footer-inner">
                        <h5 class="footer-title text-white">CONTACT</h5>
                        <ul class="footer-menu">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About us</a></li>
                            <li><a href="{{route('contact')}}">Contact us</a></li>
                            <li><a href="{{route('blog')}}">Our blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3">
                    <div class="single-footer-inner">
                        <h5 class="footer-title text-white">PAGES</h5>
                        <ul class="footer-menu">
                            <li><a href="{{route('shop_all')}}">Shop</a></li>
                            <li><a href="{{route('my_account')}}">My Account</a></li>
                            <li><a href="{{route('list-favorite')}}">My Favorite</a></li>
                            <li><a href="{{route('show_cart')}}">My Cart</a></li>
                            <li><a href="{{route('list_order')}}">My Order</a></li>
                            <li><a href="{{route('check_out')}}">Check Out</a></li>
                        </ul>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="copyright">
                        <p>Copyright <i class="fa fa-copyright"></i> 2016 <span><a href="#">Devitems</a></span> . All rights reserved. </p>
                    </div>
                </div>
                <div class="col-md-5 hidden-sm hidden-xs">
                    <nav>
                        <ul class="footer-bottom-menu">
                            <li><a href="">Site Map</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                            <li><a href="{{route('show_cart')}}">Wish List</a></li>
                            <li><a href="">Newsletter</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="payment-method b-img">
                        <img alt="" src="{{url('assets')}}/frontend/images/footer/footer-bottom.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer area -->               
</div>
<!-- Body main wrapper end -->    

<!-- Placed js at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="{{url('assets')}}/frontend/js/vendor/jquery-1.12.4.min.js"></script>
<!-- Bootstrap framework js -->
<script src="{{url('assets')}}/frontend/js/bootstrap.min.js"></script>
<script src="{{url('assets')}}/frontend/js/jquery.rateyo.js"></script>
<!-- All js plugins included in this file. -->
<script src="{{url('assets')}}/frontend/js/plugins.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="{{url('assets')}}/frontend/js/main.js"></script>
@section('star_js')

@show
<script type="text/javascript">
    $(document).ready(function(){
        $('#finter').on('change',function(){
            var url = $(this).val();
            if(url) {
                window.location =  url;
            }
            return false;
        });
    });
</script>

</body>

</html>