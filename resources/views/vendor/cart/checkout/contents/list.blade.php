@if ($cart ?? '')

    @if (array_key_exists('qty', (array) $cart) && array_key_exists('price', (array) $cart))
        @php $cart = (object)$cart; @endphp

        <tr class="cart_item">
            <td class="product-name">
                {{ $cart->name ?? '' }}
                <strong class="product-quantity">×&nbsp;{{ $cart->qty ?? 1 }}</strong>
            </td>
            <td class="product-total">
                <span
                    class="Price-currencySymbol">{{ currency() }}</span>{{ money((float) $cart->qty * (float) $cart->price) }}
            </td>

        </tr>
    @endif

@endif
