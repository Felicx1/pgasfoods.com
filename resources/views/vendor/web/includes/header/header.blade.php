
<!-- Start of header section
	============================================= -->

    <div class="or-ofcanvas-cart-wrapper">
        <div class="or-ofcanvas-cart-content">
            <div class="title-area d-flex justify-content-between align-items-center">
                <div class="cart-title">
                    <span>Cart</span>
                </div>
                <div class="cart-close">
                    <button class="or-canvas-cart-trigger"><i class="fal fa-times"></i></button>
                </div>
            </div>
            <div class="or-ofcart-product-wrapper">
                <div class="or-ofcart-product-item d-flex align-items-center position-relative">
                    <div class="pro-remove position-absolute"><i class="fal fa-times"></i></div>
                    <div class="or-ofcart-product-img">
                        <img src="{{ asset("assets/img/slider-01.png") }}" alt="">
                    </div>
                    <div class="or-ofcart-product-text headline">
                        <h3><a href="#">Tea Juice</a></h3>
                        <span>1 x £4.00</span>
                    </div>
                </div>
                <div class="or-ofcart-product-item d-flex align-items-center position-relative">
                    <div class="pro-remove position-absolute"><i class="fal fa-times"></i></div>
                    <div class="or-ofcart-product-img">
                        <img src="{{ asset("assets/img/slider-01.png") }}" alt="">
                    </div>
                    <div class="or-ofcart-product-text headline">
                        <h3><a href="#">Fresh Orange</a></h3>
                        <span>1 x £4.00</span>
                    </div>
                </div>
                <div class="or-ofcart-product-item d-flex align-items-center position-relative">
                    <div class="pro-remove position-absolute"><i class="fal fa-times"></i></div>
                    <div class="or-ofcart-product-img">
                        <img src="{{ asset("assets/img/slider-01.png") }}" alt="">
                    </div>
                    <div class="or-ofcart-product-text headline">
                        <h3><a href="#">Pigas Onion</a></h3>
                        <span>1 x £4.00</span>
                    </div>
                </div>
            </div>
            <div class="or-ofcart-total text-center">
                <span>Subtotal: £4.00</span>
                <div class="total-btn">
                    <a href="{{ route('shopping.basket') }}">View Cart</a>
                    <a href="{{ route('cart.checkout') }}">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Start of header section
        ============================================= -->