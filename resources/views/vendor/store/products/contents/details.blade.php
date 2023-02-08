@php
    $category = $product->category ?? ''
@endphp

@php  $size_price = '';  @endphp

@if(isset($product->sizes))
    @foreach($product->sizes as $index => $size)
        @if($size->status==1 && isset($size->prices))

            @php $size_price = $size; @endphp
            @break

        @endif 
    @endforeach
@endif
@if($product??'')

@php  $size_price = '';  @endphp
@if(isset($product->sizes))
    @foreach($product->sizes as $index => $size)
        @if($size->status==1 && isset($size->prices))

            @php $size_price = $size; @endphp
            @break
        @endif
    @endforeach
@endif

<input class="products_id" id="products_id" type="hidden"  value="{{ $product->id??'' }}">
<input type="hidden" id="size_id" class="size_id"  value="{{ $size_price->size_id??'' }}">

<section class="or-shop-details-section wrap-items mt-70 mb-70"
         id="{{ $size_price->products_id??'0' }}|{{ $size_price->size_id??'0' }}"
         data-size="{{ $size_price->size_in_kg??env('APP_SHIPPING_DEFAULT_SIZE') }}">

    <div class="container">
        <div class="or-shop-details-content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="shop-details-img-slider-area">
                        <div class="shop-details-img-slider">
                            <div class="shop-details-img-wrap">
                                @if($product->images??'')
                                    @if(isset($product->images))
                                        <img class="_image" src="{{ env('APP_ADMIN_URL') }}/{{ $product->images[0]->large ?? str_replace('products', 'products/__raw', $product->images[0]->image_path??'') }}" alt="{{ $product->namex??'' }}" data-zoomed="{{ env('APP_ADMIN_URL') }}/{{ $product->images[0]->large ?? str_replace('products', 'products/__raw', $product->images[0]->image_path??'') }}">
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="shop-details-img-thumb">
                            <div class="or-thumb-img">
                                @if($product->images??'')
                                    @if(isset($product->images))
                                        <img src="{{ env('APP_ADMIN_URL') }}/{{ $product->images[0]->large ?? str_replace('products', 'products/__raw', $product->images[0]->image_path??'') }}" alt="{{ $product->namex??'' }}">
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shop-details-text  headline pera-content">
                        <div class="shop-details-title">
                            <h3 class="namex">{{ $product->namex??'' }}</h3>
                        </div>
                        <div class="shop-details-rate-review ul-li d-flex">
{{--                            <div class="shop-details-rate">--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fas fa-star"></i></li>--}}
{{--                                    <li><i class="fas fa-star"></i></li>--}}
{{--                                    <li><i class="fas fa-star"></i></li>--}}
{{--                                    <li><i class="fas fa-star"></i></li>--}}
{{--                                    <li><i class="fas fa-star"></i></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="shop-details-review">(4.9 Based on 02 Reviews)</div>--}}
{{--                            <div class="shop-details-review"><span>02 Reviews</span> <span>24 orders</span></div>--}}
                        </div>
                        <div class="shop-details-price">{{ currency() }}<span class="item-price">{{ $size_price->prices->selling_price??'0.00' }}</span></div>
                        <div class="shop-details-text-decs">
                            {!! $product->caption_text??'' !!}
                        </div>
                        <div class="shop-details-option color-option ul-li">
                            <span class="option-title">Size:</span>
                            <select name="sort-by" id="sort-by" class="nice-select product_sizes select_option">

                                @if(isset($product->sizes))

                                    @foreach($product->sizes as $index => $size)

                                        @if($size->status==1)
                                            @if(isset($size->prices))

                                                @php $size->prices->size_in_kg = $size->size_in_kg @endphp

                                                <option value="{{ json_encode($size->prices) }}">{{ $size->size??'' }}</option>

                                            @endif

                                        @endif

                                    @endforeach

                                @endif

                                </select>
                            {{-- <ul>
                                <li class="color-1 active"></li>
                                <li class="color-2"></li>
                                <li class="color-3"></li>
                                <li class="color-4"></li>
                            </ul> --}}
                        </div>
                        <div class="shop-details-option">
                            <span class="option-title">Quantity:</span>
                            <div class="shop-quantity-option d-flex">
                                {{-- <div class="quantity-field position-relative  d-inline-block">
                                    <input type="text" name="select1" value="1" class="quantity-input-arrow quantity-input-2  text-center">
                                </div> --}}
                                <div class="stock-avaiable">{{ $size_price->quantity->quantity }} pieces available </div>
                            </div>
                        </div>
                        <div class="shop-details-btn ">
                            @if($size_price && $product->conditions != 3)
                                <a class="add-to-cart" href="javascript:;">Add To Cart</a>
                            @endif
                        </div>
                        <div class="shop-details-product-code ul-li-block">
                            <ul>
                                <li><span>Barcode: </span> {{ _value($product, 'barcode') ?? '-' }} </li>
                                <li><span>Category: </span>{{ _value2($product, 'category', 'namex') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Shop Details section
	============================================= -->

<section id="or-shop-details-tab" class="or-shop-details-tab-section">
    <div class="container">
        <div class="or-shop-details-review-tab-content">
            <div class="or-shop-review-tab-btn">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                    </li>
                </ul>
            </div>
            <div class="or-shop-details-tab-textarea">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="shop-details-description-text  text-center">
                            {!! $product->description??'' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if ($related != [])
<section id="or-product-2" class="or-product-section-2">
    <div class="container">
        <div class="or-product-content-2">
            <div class="row">
                <div class="col-lg-9">
                    <div class="or-product-content-wrapper-2">
                        <div class="or-product-top-content d-flex justify-content-between align-items-end">
                            <div class="or-section-title-2 headline">
                                <h2>Related products</h2>
                            </div>
                            <div class="carousel_nav  clearfix">
                                <button type="button" class="or-pro2-left_arrow"><i class="far fa-chevron-left"></i></button>
                                <button type="button" class="or-pro2-right_arrow"><i class="far fa-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="or-product-item-slider-wrapper">
                            <div class="or-product-item-slider">
                                    @foreach($related as $product)
                                        @include("store-app::products.contents.related-products", ["product" => $product])

                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="or-product-add-banner">
                        <a href="#">
                            <img src="{{ asset("assets/img/slides/800x900.png") }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
	<!--=====  End of Tab slider  ======-->
@endif

@endif

