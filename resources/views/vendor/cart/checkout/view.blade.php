@extends('web::pages.index')
@section('content')
    <!-- Start of Breadcrumb section
         ============================================= -->
    <section id="or-breadcrumbs" class="or-breadcrumbs-section position-relative"
        data-background="{{ asset("assets/img/checkout.jpeg") }}">
        <div class="background_overlay"></div>
        <div class="container">
            <div class="or-breadcrumbs-content text-center">
                <div class="page-title headline">
                    <h1>Checkout</h1>
                </div>
                <div class="or-breadcrumbs-items ul-li">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Breadcrumb section
         ============================================= -->

    <!-- Start of Checkout section
         ============================================= -->
    <section id="or-checkout" class="or-checkout-section">
        <div class="container">
            {{-- <div class="or-chekcout-coupon">
                <i class="fas fa-user-tag"></i> Have a coupon? <a href="#">Click here to enter your code</a>
            </div> --}}
            <div class="or-checkout-form-area">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="or-checkout-form headline pera-content">
                            <h2>Billing Details</h2>
                            <form action="{{ route('order.checkout') }}" method="post">
                                @csrf
                                @include('cart::checkout.contents.status')
                                <div class="row">

                                    @php
                                        // time and date
                                        $shipped_date = date('Y-m-d H:i:s', strtotime('+7 days'));

                                        $order_code = getRandomToken(6);


                                    @endphp

                                    {{-- <input type="hidden" class="form-control mb-30" name="companyid" value="{{ env('APP_COMPANY_ID') }}"
                                        id="companyid" />

                                    <input type="hidden" class="form-control mb-30" name="outletid" value="{{ env('APP_OUTLET_ID') }}"
                                    id="outletid" /> --}}

                                    <input type="hidden" class="form-control mb-30" name="delivery_charge" value="{{ delivery_charge() ?? 0 }}"
                                        id="delivery_charge" />

                                    <input type="hidden" class="form-control mb-30" name="discount" value="{{ cart_discount() }}"
                                    id="discount" />


                                    <input type="hidden" class="form-control mb-30" name="payoptions" value="1"
                                        id="payoptions" />

                                    <input type="hidden" class="form-control" id="order_source" name="order_source"
                                        placeholder="website" value="website" />

                                    <input type="hidden" class="form-control mb-30" name="shipped_date" value="{{ $shipped_date }}"
                                    id="shipped_date" />

                                    <input type="hidden" class="form-control mb-30" name="order_code" value="{{ $order_code }}"
                                    id="order_code" />


                                    <div class="col-md-6">
                                        <div class="or-bill-form">
                                            <label>First name *</label>
                                            <input type="text" name="fname" required id="name" placeholder="Jhon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="or-bill-form">
                                            <label>Last name *</label>
                                            <input type="text" name="lname" required id="name-2" placeholder="Doe">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="or-bill-form">
                                            <label>Email *</label>
                                            <input type="email" required name="email" id="email"
                                                placeholder="email@email.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="or-bill-form">
                                            <label>Phone *</label>
                                            <input type="phone" required name="phone" id="phone" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="or-bill-form">
                                            <input type="text" name="address" required id="address"
                                                placeholder="House number and street name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="or-bill-form">
                                            <label>Town / City *</label>
                                            <input type="text" name="city" required id="city" placeholder="Ex: x,y,z">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="or-bill-form">
                                            <label>Country</label>
                                            <input type="text" name="country" id="country" required
                                                placeholder="Ex: x,y,z">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="or-bill-form">
                                            <label>Postcode *</label>
                                            <input type="text" required name="postcode" id="postcode"
                                                placeholder="Ex: x,y,z">
                                        </div>
                                    </div>
                                    <h2>Additional Information</h2>
                                    <div class="col-md-12">
                                        <div class="or-bill-form">
                                            <textarea name="message" required id="message" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="or-checkout-form headline pera-content">
                            @include('cart::checkout.contents.orders')
                        </div>
                        <div class="or-checkout-pay-item-wrapper">
                            <div class="or-checkout-pay-item">
								<input type="radio" checked>
								<span>Credit card / debit card</span>
							</div>
							{{-- <div class="or-checkout-pay-item">
								<input type="radio" name="#" value="#">
								<span>Pay with Bank</span>
							</div> --}}

                            <p>Your personal data will be used to process your order, support your experience throughout
                                this website, and for other purposes described in our <a href="#">privacy policy.</a>
                            </p>
                            <div class="or-btn-2">
                                <button type="submit" class="d-flex justify-content-center align-items-center"
                                   >Place Order</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
