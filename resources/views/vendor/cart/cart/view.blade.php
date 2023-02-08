@extends('web::pages.index')

@section('content')
<section id="or-main-cart" class="or-main-cart-section">
    <div class="container">
        <div class="or-main-cart-content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="or-cart-content-table table-responsive">
                        <table class="table product_count live_quantity">
                            <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>

{{--                            {{ dd($carts) }}--}}

                                @foreach (cart("cart") ?? [] as $index => $cart)

                                @if($cart ?? '')

                                        @if(array_key_exists("qty", (array) $cart) && array_key_exists("price", (array) $cart))

                                    @php $cart = (object)$cart; @endphp
                                <tr class="wrap-items" id="{{ $index }}">
                                    <td class="product-remove"> <a href="javascript:;" class="remove remove-item">×</a></td>
    
                                    <td class="product-thumbnail">
                                        <a class="cart-thumb-img link" href="{{ $cart->link ??'' }}">
                                            <img style="width:70px;height:auto" alt="{{ $cart->name ??'' }}" class="image" src="{{ $cart->image ??'' }}" alt="">
                                        </a>
                                    </td>
                                    <td class="product-name" data-title="Product"> <a href="{{ $cart->link ??'' }}">{{ $cart->name ??'' }}</a></td>
                                    <td class="product-price product-subtotal" data-title="Price"> <span class=" amount"><bdi>{{ currency() }}
                                        <span class="amount item-price">{{ $cart->price ??0 }}</span></bdi></span>
                                    </td>
                                    @if($index)
                                    <td class="product-quantity">

                                        <button onclick="var result = document.getElementById('sst{{$index}}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;"
                                            class="reduced items-count" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <input style="max-width:60px;text-align: center;" data-weight="{{ $cart->size??'0' }}" type="text" disabled name="qty{{$index}}" id="sst{{$index}}" maxlength="12"  value="{{ $cart->qty??'0' }}" title="Quantity:" class="input-text qty qty-weight" />
                                    </td>
                                    <td>
                                        <button onclick="var result = document.getElementById('sst{{$index}}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                            class="increase items-count" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </td>
                                    @endif
                                    <td class="product-subtotal"> <span><bdi>{{ currency() }} <span class="row-total">{{ money((float)$cart->qty*(float)$cart->price) }}</span></bdi></span></td>
                                </tr>
                                @endif

                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="or-cart-copun">
                        <div class="or-cart-copun-code">
                            <form id="voucherForm" method="POST">
                                <input id="voucher_code" name="voucher_code" type="text" placeholder="Coupon Code">
                                <button type="submit">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="or-cart-total-warpper text-center headline pera-content top-sticky">
                        <h3>Cart Totals</h3>
                        <table>
                            <tbody>
                                @if($total = total())
                            <tr>
                                <td>
                                    <p class="v-title">Subtotal	</p>
                                </td>
                                <td>
                                    <p class="v-price">	{{ currency() }}<span class="subTotal">{{ money($total->total??'0') }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="v-title">Shipping Fee	</p>
                                </td>
                                <td>
                                    <p class="v-price">{{ currency() }}	<span class="shippingFee">{{ money($total->shipping??'0') }}</span></p>
                                </td>
                            </tr>
                            @if(session()->has('voucher'))
                            <tr>
                                <td>
                                    <p class="v-title">  Voucher Discount </p>
                                </td>
                                <td>
                                    <p class="v-price">	<span class="voucherDiscount">
                                       {{-- get the value from the session --}}
                                       - {{ currency() }}{{ money(session()->get('voucher')['voucher_amount']??'0') }}</span></p>
                                        </span></p>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td>
                                    <p class="v-title">Total</p>
                                </td>
                                <td>
                                    <p class="v-price">{{ currency() }}	<span class="cart_amount_total">{{ (money((float)$total->total??0 ) + (money((float)$total->shipping??0))) }}</span></p>
                                </td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                        <a class="d-flex justify-content-center align-items-center" href="{{ route('cart.checkout') }}">Procced To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script type="text/javascript">
    // submit the voucher form and console.log the response
    $(document).ready(function () {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        $('#voucherForm').submit(function(e) {
            e.preventDefault();
            var voucher_code = $('#voucher_code').val();
            console.log(voucher_code);
            $.ajax({
                url: "{{ route('apply.voucher') }}",
                type: "POST",
                data: {voucher_code:voucher_code},
                    success:function(data){
                        console.log(data);
                        if(data.status == 'success'){
                            setTimeout(function(){
                                toastr.success(data.message);
                            }, 2000);
                            // window.location.reload();
                        }

                        if(data.status == 'error'){
                            setTimeout(function(){
                                toastr.error(data.message);
                            }, 2000);
                        }
                    }
                });
            });
        });
</script>
@endsection
