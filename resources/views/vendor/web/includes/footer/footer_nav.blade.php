<!-- Start Footer Content Here ============================================= -->


<!-- Start of Footer section
	============================================= -->
    <footer id="or-footer-2" class="or-footer-section-2" data-background={{ asset("assets/img/bg/bg-footer-top-f3.png") }}>

        <div class="or-footer-widget-wrapper-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="or-footer-widget headline pera-content ul-li-block">
                            <div class="or-logo-widget">
                                <a href="{{ url('/') }}"><img src={{ asset("assets/img/logo.png") }} alt=""></a>
                                <p>We source our quality products from reliable source so we could give you the best you deserve.	</p>
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="or-footer-widget  headline pera-content ul-li-block">
                            <div class="or-menu-widget">
                                <h2 class="widget-title">Useful Links</h2>
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="{{ env('APP_LIVE')? route('store.view') : '#' }}">Shop</a></li>
                                    <li><a href="#">News</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="or-footer-widget headline pera-content ul-li-block">
                            <div class="or-contact-widget">
                                <h2 class="widget-title">Location:</h2>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i> <span>
                                    60,Lawnswood Road Gorton M125UB Manchester 
                                </span></li>
                                    <li><i class="fas fa-envelope"></i> <span> info@pgasfoods.com  </span> </li>
                                </ul>
                                <span class="title">Open Hours: </span>
                                <p>Mon - Sat: 8am - 5pm</p>
                                    <p>Sunday: CLOSED</p>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
        <div class="or-footer-copyright" data-background="assets/img/bg/bg-footer-bottom-f3.png">
            <div class="container">
                <div class="or-footer-copyright-wrapper  d-flex justify-content-between align-items-center">
                    <div class="or-footer-copyright">
                        @ Copyright 2022. Powered by <a href={{ env('APP_DEVELOPER_URL') }}>{{ env('APP_DEVELOPER') }}</a>
                    </div>
                    <div class="footer-payment">
                        <img src="{{ asset('assets/img/payment-image.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer section
        ============================================= -->
    