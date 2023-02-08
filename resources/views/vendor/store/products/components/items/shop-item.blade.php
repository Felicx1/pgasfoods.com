@php  $size_price = '';  @endphp
@if (isset($product->sizes))
    @foreach ($product->sizes as $index => $size)
        @if ($size->status == 1 && isset($size->prices))
            @php $size_price = $size; @endphp
        @break
        @endif
    @endforeach
@endif

<div class="col-lg-3 col-md-4 col-sm-6 filtr-item wrap-items" data-category="1, 3, 4" data-sort="Busy streets" id="{{ $size_price->products_id ?? '0' }}|{{ $size_price->size_id ?? '0' }}"
    data-size="{{ $size_price->size_in_kg ?? env('APP_SHIPPING_DEFAULT_SIZE') }}">
    <div class="or-trending-product-item text-center">
        <div class="or-trend-item-img position-relative">
            <a class="link" href="{{ route('store.product.details', ['id'=>$product->id,'name'=>strip_chars($product->namex ?? '')]) }}">
            @if($product->images??'')

                @if(isset($product->images))
                    <img class="_image" src="{{ env('APP_ADMIN_URL') }}/{{ $product->images[0]->small ?? str_replace('products', 'products/__raw', $product->images[0]->image_path??'') }}" alt="{{ $product->namex??'' }}">
                @endif
            @endif
            </a>
            <div class="e-commerce-btn">
                @if(_value($product, 'conditions', 3) != 3)
                    <a class="add-to-cart" href="javascript:;"><i class="fal fa-shopping-cart"></i></a>
                @endif
                {{-- <a href="#"><i class="fal fa-heart"></i></a>
                <a href="#"><i class="fal fa-eye"></i></a> --}}
            </div>
        </div>
        <input class="products_id" id="products_id" type="hidden"  value="{{ $product->id??'' }}">
<input type="hidden" id="size_id" class="size_id"  value="{{ $size_price->size_id??'' }}">
        <div class="or-trend-item-text headline-2">
            
                <a class="link" href="{{ route('store.product.details', ['id'=>$product->id,'name'=>strip_chars($product->namex ?? '')]) }}"> 
                    <span class="namex"> {{ _value($product, 'namex') }} </span>
                </a>
            
            @if($size_price ?? '')
                <span style="font-size:14px">{{ currency() }}</span>
                <span class="discounted-price item-price">{{ $size_price->prices->selling_price??'' }}</span>
            @endif
            @if(_value($product, 'conditions', 3) != 3)
                <a class="add-cart-btn add-to-cart" href="javascript:;">Add To Cart</a>
            @endif
        </div>
    </div>
</div>