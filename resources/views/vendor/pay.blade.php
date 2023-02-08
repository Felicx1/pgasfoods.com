@extends('web::pages.index')

@section('content')
    <link rel="stylesheet" href="{{ asset('packages/stripe/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('packages/stripe/css/global.css') }}" />
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('packages/stripe/js/new_stripe_script.js') }}" defer></script>
    <title>Stripe Pay</title>


    <div class="row justify-content-center">

        <!-- payment dom -->
        <div class="col-lg-7 col-md-12">


            <div class="sr-root">

                <div class="sr-main">
                    <h4 id="payment-title text-center">Pay for your Order</h4>
                    <p style="padding:30px 0">
                        As soon as we confirm your payment we will process your Order and send you
                        update when the goods will be delivered.
                    </p>

                    <form id="payment-form" data-action-verify="{{ route('stripe.verify') }}"
                        data-action="{{ route('stripe.intent') }}" class="sr-payment-form">@csrf
                        <div id="payment-element">
                            <!-- Elements will create form elements here -->
                        </div>
                        {{-- <button id="submit">Submit</button> --}}
                        <button id="submit">
                            <div class="spinner hidden" id="spinner"></div>
                            <span id="button-text">Pay</span> <span id="order-amount">£{{ $total }}</span>
                        </button>
                        <div id="payment-message" class="hidden"></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
