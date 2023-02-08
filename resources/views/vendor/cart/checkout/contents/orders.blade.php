<h2>Your Order</h2>
<table class="table">
    <thead>
        <tr>
            <th class="product-name">Product</th>
            <th class="product-total-h">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carts as $index => $cart)
            @include('cart::checkout.contents.list', ['cart' => $cart])
        @endforeach

    </tbody>
</table>
