
<!-- Header  =============================================  -->
<header id="organio-header" class="organio-header-section header-style-two">
    <div class="organio-header-corona-slug text-center">Festive period discount is coming!</div>
    <div class="organio-header-top-content">
        <div class="container">
            <div class="or-header-top-content d-flex justify-content-between align-items-center">
                <div class="or-header-top-text">
                    Welcome to our <span>Online Store</span>
                </div>
                <div class="or-header-top-content-area d-flex">
                    <div class="or-header-top-menu ul-li">
                        <ul>
                            <li><a href="#">Returns Policy</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="header-top-social-area or-header-shape position-relative">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="or-header-search-wrapper">
        <div class="container">
            <div class="or-header-search-wrapper-content d-flex justify-content-between align-items-center">
                <div class="site-logo">
                    <a href="{{ url('/') }}"><img src="{{ asset("assets/img/logo.png") }}" alt=""></a>
                </div>
                <div class="or-header-search-innerbox d-flex">
                    <form method="GET" action="{{ route('store.search') }}">@csrf
                        <input type="text" name="qr" placeholder="Search product...">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div>
                <div class="or-header-login-register d-flex">
                    {{-- <div class="login-register-button">
                        <a href="#">Login</a>
                        <a href="#">Register</a>
                    </div> --}}
                    <div class="or-header-e-commerce-btn">
                        {{-- <a href="#"><i class="fal fa-heart"></i><span>01</span></a> --}}
                        {{-- <a href="#"><i class="fas fa-repeat-alt"></i></a> --}}
                        <a href="{{ route('shopping.basket') }}"><i class="fal fa-shopping-cart"></i>
                            <span class="cart-item-count">
                                {{ cartValue("cart")->count }}
                            </span>
                        </a>
                        {{ currency() }}<span class="cart_price_total">{{ cartValue("cart")->value }}</span>
                    </div>
                </div>
            </div>
            <div class="mobile_menu position-relative">
                <div class="mobile_menu_button open_mobile_menu">
                    <i class="fal fa-bars"></i>
                </div>
                <div class="mobile_menu_wrap">
                    <div class="mobile_menu_overlay open_mobile_menu"></div>
                    <div class="mobile_menu_content">
                        <div class="mobile_menu_close open_mobile_menu">
                            <i class="fal fa-times"></i>
                        </div>
                        <div class="m-brand-logo">
                            <a href="{{ url('/') }}"><img src="{{ asset("assets/img/logo.png") }}" alt=""></a>
                        </div>
                        <div class="mobile-search-wrapper position-relative">
                            <form method="GET" action="{{ route('store.search') }}">@csrf
                                <input type="text" name="qr" placeholder="Search Here...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <nav class="mobile-main-navigation  clearfix ul-li">
                            <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                 <li><a target="_blank" href="{{ url("/about") }}">About</a></li>
                                <li>
                                    <a href="{{ route('store.view') }}">Shop</a>
                                </li>
                                 <li><a target="_blank" href="{{ url("/contact") }}">Contact</a></li>
                            </ul>

                        </nav>
                    </div>
                </div>
                <!-- /Mobile-Menu -->
            </div>
        </div>
    </div>
    <div class="or-header-main-menu">
        <div class="container">
            <div class="or-header-category-menu-content d-flex justify-content-between">
                <div class="or-header-category-title-navigation d-flex">
                    {{-- if the request url is '/staging' or '/' display the div, else do not display anything --}}
{{--                    @if (request()->is('/') || request()->is('staging'))--}}
                    <div class="or-header-category-title">
                        <i class="fal fa-bars"></i> <span>Browse Categories</span>
                    </div>

{{--                    @endif--}}
                    <div class="or-header-main-navigation ul-li">
                        <nav class="main-navigation-area">
                            <ul class="menu-navigation">
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li><a target="_blank" href="{{ url("/about") }}">About</a></li>
                                <li><a href="{{ route('store.view') }}">Shop</a></li>
                                <li><a target="_blank" href="{{ url("/contact") }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="or-header-category-btn">
{{--                     <a href="#">Sales</a> --}}
                </div>
            </div>
        </div>
    </div>
</header>

@include("web::pages.components.shared.side-menu")
