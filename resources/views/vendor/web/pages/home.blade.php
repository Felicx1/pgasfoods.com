@extends('web::pages.index')

@section('content')

@include("web::includes.header.header")
<!-- Start of Category slider section
	============================================= -->
<section id="or-category-slider" class="or-category-slider-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-3">
                @include("store-app::category.list", ["limit" => 9])
            </div>

            <div class="col-lg-9">
                <div class="or-category-main-slider">
                    <div class="or-category-slider-item" data-background="assets/img/slide-01.png">
                        <div class="or-category-slider-text headline-2 pera-content">
                            <h2>Get your top-quality
                                Pigas foods online
                                today! </h2>
                            <p>Browse an incredible range of high-quality Pigas food and drink, delivered direct to your door</p>
                            <a href="{{ route("store.view") }}"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                        </div>
                    </div>
                    <div class="or-category-slider-item" data-background="assets/img/slide-02.pn">
                        <div class="or-category-slider-text headline-2 pera-content">
                            <h2>Get your top-quality
                                Pigas foods online
                                today! </h2>
                            <p>Browse an incredible range of high-quality Pigas food and drink, delivered direct to your door</p>
                            <a href="{{ route("store.view") }}"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                        </div>
                    </div>
                    <div class="or-category-slider-item" data-background="assets/img/slide-03.pn">
                        <div class="or-category-slider-text headline-2 pera-content">
                            <h2>Get your top-quality
                                Pigas foods online
                                today! </h2>
                            <p>Browse an incredible range of high-quality Pigas food and drink, delivered direct to your door</p>
                            <a href="{{ route("store.view") }}"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END of Category slider section
	============================================= -->

<!-- Start of Commit  section
	============================================= -->
<section id="or-commit" class="or-commit-section">
    <div class="container">
        <div class="or-commit-content">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="or-commit-inner-box position-relative d-flex align-items-center">
                        <div class="or-commit-inner-icon d-flex align-items-center justify-content-center">
                            <i class="flaticon-delivery"></i>
                        </div>
                        <div class="or-commit-inner-text headline">
                            <h3>Fast Shipping</h3>
                            <span>Fast delivery anywhere in the UK.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="or-commit-inner-box position-relative d-flex align-items-center">
                        <div class="or-commit-inner-icon d-flex align-items-center justify-content-center">
                            <i class="flaticon-leaf-2"></i>
                        </div>
                        <div class="or-commit-inner-text headline">
                            <h3>Quality Products</h3>
                            <span>Check our range of quality products.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="or-commit-inner-box position-relative d-flex align-items-center">
                        <div class="or-commit-inner-icon d-flex align-items-center justify-content-center">
                            <i class="flaticon-money-back-guarantee"></i>
                        </div>
                        <div class="or-commit-inner-text headline">
                            <h3>Best Service </h3>
                            <span>Your happiness is our business.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="or-commit-inner-box position-relative d-flex align-items-center">
                        <div class="or-commit-inner-icon d-flex align-items-center justify-content-center">
                            <i class="flaticon-shield-1"></i>
                        </div>
                        <div class="or-commit-inner-text headline">
                            <h3>Safe Payment</h3>
                            <span>We are using secure payment methods.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END of Commit slider section
	============================================= -->

<!-- Start of Product  section
	============================================= -->
<section id="or-product-2" class="or-product-section-2">
    <div class="container">
        <div class="or-product-content-2">
            <div class="row">
                <div class="col-lg-9">
                    <div class="or-product-content-wrapper-2">
                        <div class="or-product-top-content d-flex justify-content-between align-items-end">
                            <div class="or-section-title-2 headline">
                                <h2>Latest products</h2>
                            </div>
                            <div class="carousel_nav  clearfix">
                                <button type="button" class="or-pro2-left_arrow"><i class="far fa-chevron-left"></i></button>
                                <button type="button" class="or-pro2-right_arrow"><i class="far fa-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="or-product-item-slider-wrapper">
                            <div class="or-product-item-slider">
                                @if($products = products())
                                @if($products = $products->data())
                                    @foreach($products as $product)
                                        @include("store-app::products.components.items.row", ["product" => $product])
                                    @endforeach
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="or-product-add-banner">
                        <a href="#">
                            <img src="{{ asset("assets/img/slides/800x900.png") }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Product  section
	============================================= -->

<!-- Start of Category  section
	============================================= -->


<!-- Start of Best Deal  section
	============================================= -->
<section id="or-best-deal-2" class="or-best-deal-section-2" style="background: white;padding-top:90px">
    <div class="container">
        <div class="or-best-deal-content-2">
            <div class="row">
                <div class="col-lg-3">
                    <div class="or-best-deal-shop" data-background="{{ asset("assets/img/slides/423x544.png") }}">
                        <p>Get a <span>discount</span>
                            for weekly
                            offer!</p>
                        <a class="d-flex justify-content-center align-items-center" href="#">Shop now</a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="or-best-deal-slider-wrapper">
                        <div class="or-best-deal-top-content  d-flex justify-content-between">
                            <div class="or-section-title-2 headline">
                                <h2>Best Deals of this week!</h2>
                            </div>

                        </div>
                        <div class="or-best-deal-slider-2">
                            <div class="or-product-item-slider2">
                                <!-- <div class="organio-inner-item"> -->
                                    @if($products = products())
                                    @if($products = $products->data())
                                        @foreach($products as $index => $product)
                                            @include("store-app::products.components.items.row-slider", ["product" => $product])
                                            @if($index == 5)
                                                @break
                                            @endif
                                        @endforeach
                                    @endif
                                    @endif
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Best Deal  section
	============================================= -->

<!-- Start of testimonial  section
	============================================= -->
<section id="or-testimonial" class="or-testimonial-section">
    <div class="container">
        <div class="or-testimonial-content position-relative">
            <span class="testimonial-bg position-absolute"><img src="{{ asset("assets/img/slides/1771x342.png") }}" alt=""></span>
            <div class="or-section-title-2 headline text-center">
                <h2 style="color:white">Client’s testimonial</h2>
            </div>
            <div class="or-tetimonial-slider-wrapper">
                <div class="or-testimonial-slider-area" style="height: 300px">
                    <div class="or-testimonial-slider">
                        <div class="organio-inner-item">
                            <div class="or-testimonial-innerbox text-center position-relative">

                                <div class="or-testimonial-text headline pera-content">
                                    <p>‘’customer testimonies comes here.’’</p>
                                    <div class="author-meta">
                                        <h3>Sinira Fro</h3>
                                        <span>Managing Director</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="organio-inner-item">
                            <div class="or-testimonial-innerbox text-center position-relative">

                                <div class="or-testimonial-text headline pera-content">
                                    <p>‘’Customer testimonies comes in here.’’</p>
                                    <div class="author-meta">
                                        <h3>Sinira Fro</h3>
                                        <span>Managing Director</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="organio-inner-item">
                            <div class="or-testimonial-innerbox text-center position-relative">

                                <div class="or-testimonial-text headline pera-content">
                                    <p>‘’Customer testimoneis omes in here’’</p>
                                    <div class="author-meta">
                                        <h3>Sinira Fro</h3>
                                        <span>Managing Director</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="organio-inner-item">
                            <div class="or-testimonial-innerbox text-center position-relative">

                                <div class="or-testimonial-text headline pera-content">
                                    <p>‘’Customer testimonies comes in here.’’</p>
                                    <div class="author-meta">
                                        <h3>Sinira Fro</h3>
                                        <span>Managing Director</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of testimonial  section
	============================================= -->

<!-- Start of CTA  section
	============================================= -->
<section id="or-cta" class="or-cta-section">
    <div class="container">
        <div class="or-cta-content" data-background="{{ asset("assets/img/slides/1400x330.png") }}">
            <div class="or-cta-text text-center headline pera-content">
                <p>Start from <span>£04.99</span></p>
                <h3>Pigas Food up to 20% off</h3>
                <a class="d-flex justify-content-center align-items-center" href="#">Contact Us</a>
            </div>
        </div>
    </div>
</section>
<!-- End of CTA  section
	============================================= -->
@if($products = products())

<section id="or-trending-product" class="or-trending-product-section">
    <div class="container">
        <div class="or-trending-product-top d-flex justify-content-between align-items-end">
            <div class="or-section-title-3 pera-content headline-2">
                <h2>Trending <span>Products</span></h2>
                <p>Check out our trending products here. </p>
            </div>
            <div class="or-trending-item-filter-btn ul-li">
                {{-- <ul id="filters" class="nav-gallery">
                    <li class="filtr-button filtr-active" data-filter="all">All Product</li>

                </ul> --}}
            </div>
        </div>
        <div class="or-trending-item-wrapper filtr-container row">
                @if($products = $products->data())
                    @foreach($products as $product)
                        @include('store-app::products.components.items.home-shop-item', ['product'=>$product])
                    @endforeach
                @endif
        </div>
    </div>
</section>
@endif

<!-- End of Trending product  section
	============================================= -->
@endsection
