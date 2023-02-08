@php  $size_price = '';  @endphp
@if (isset($product->sizes))
    @foreach ($product->sizes as $index => $size)
        @if ($size->status == 1 && isset($size->prices))
            @php $size_price = $size; @endphp
        @break
        @endif
    @endforeach
@endif

<!-- <div class="organio-inner-item"> -->
    <div class="or-product-item-2 text-center wrap-items" id="{{ $size_price->products_id ?? '0' }}|{{ $size_price->size_id ?? '0' }}"
    data-size="{{ $size_price->size_in_kg ?? env('APP_SHIPPING_DEFAULT_SIZE') }}">
    <input class="products_id" id="products_id" type="hidden"  value="{{ $product->id??'' }}">
<input type="hidden" id="size_id" class="size_id"  value="{{ $size_price->size_id??'' }}">
        <div class="or-product-img-btn position-relative">
            <div class="or-product-img">
                <a class="link" href="{{ route('store.product.details', ['id'=>$product->id,'name'=>strip_chars($product->namex ?? '')]) }}">
                @if($product->images??'')

                    @if(isset($product->images))
                        <img class="_image" src="{{ env('APP_ADMIN_URL') }}/{{ $product->images[0]->small ?? str_replace('products', 'products/__raw', $product->images[0]->image_path??'') }}" alt="{{ $product->namex??'' }}">
                    @endif

                @endif
                </a>
            </div>
            <div class="price">
                @if($size_price ?? '')
                <span style="font-size:14px">{{ currency() }}</span>
                <span class="discount-price item-price">{{ $size_price->prices->selling_price??'' }}</span>
            @endif
            </div>
            <div class="e-commerce-btn">
                @if(_value($product, 'conditions', 3) != 3)
                    <a class="add-to-cart" href="javascript:;"><i class="fal fa-shopping-cart"></i></a>
                @endif
                {{-- <a href="#"><i class="fal fa-heart"></i></a>
                <a href="#"><i class="fal fa-eye"></i></a> --}}
            </div>
        </div>
        <div class="or-product-text headline">
            <h3>
                <a class="link" href="{{ route('store.product.details', ['id'=>$product->id,'name'=>strip_chars($product->namex ?? '')]) }}"> 
                    <span class="namex"> {{ _value($product, 'namex') }} </span>
                </a>
            </h3>
        </div>
    </div>
<!-- </div> -->