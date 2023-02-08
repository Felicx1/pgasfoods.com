@if ($cart ?? '')

@if (array_key_exists('qty', (array) $cart) && array_key_exists('price', (array) $cart))
    @php $cart = (object)$cart; @endphp
<tr id="{{ $index }}">
    <td class="product-remove"> <a href="javascript:;" class="remove"><i
        class="fa fa-times"></i></a></td>
    <td class="product-thumbnail"> <a href="{{ $cart->link ?? '' }}"><img src="{{ $cart->image ?? '' }}" class="cart-thumb-img" alt="{{ $cart->name ?? '' }}"></a></td>
    <td class="product-name" data-title="Product"> <a href="{{ $cart->link ?? '' }}">{{ $cart->name ?? '' }}</a></td>
    <td class="product-price product-subtotal" data-title="Price">
         <span class=" amount"><bdi><span class="Price-currencySymbol">{{ currency() }}</span>{{ $cart->price ?? 0 }}</bdi></span>
    </td>
    <td>
        @include('cart::cart.contents.quantity', [
            'index' => $index,
            'cart' => $cart,
        ])
    </td>
    <td class="product-subtotal"> <span><bdi><span class="Price-currencySymbol">{{ currency() }}</span>{{ money((float) $cart->qty * (float) $cart->price) }}</bdi></span></td>
</tr>
@endif
@endif