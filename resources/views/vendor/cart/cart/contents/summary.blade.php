<div class="or-cart-copun">
    <div class="or-cart-copun-code">
        <form action="#">
            <input type="text" placeholder="Coupon Code">
            <button type="submit">Apply</button>
        </form>
    </div>
</div>
</div>
<div class="col-lg-4">
<div class="or-cart-total-warpper text-center headline pera-content top-sticky">
    <h3>Cart Totals</h3>
    @include('cart::includes.subtotal')

    <a class="d-flex justify-content-center align-items-center" href="{{ route('cart.checkout') }}">Procced To Checkout</a>
</div>
</div>
