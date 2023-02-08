

        <section id="or-trending-product" class="or-trending-product-section">
            <div class="container">


                <div class="or-trending-product-top d-flex justify-content-between align-items-end">
                    <div class="or-section-title-3 pera-content headline-2" style="margin-top:60px">
                        <h2>Trending <span>Products</span></h2>
                        <p>Check out our trending products here. </p>
                    </div>
                    <div class="or-trending-item-filter-btn ul-li">
                        {{-- <ul id="filters" class="nav-gallery">
                            <li class="filtr-button filtr-active" data-filter="all">All Product</li>
                            {{--                    <li class="filtr-button" data-filter="1">Fresh Fruits</li>--}}
                        {{-- </ul> --}} 
                    </div>
                </div>
                <div class="or-trending-item-wrapper filtr-container row">

                    <div class="col-lg-3">

                        @include("store-app::category.list", ["limit" => 20])

                    </div>
                    <div class="col-lg-9">

                        <div class="row">
                            @foreach($products as $product)
                                @include('store-app::products.components.items.shop-item', ['product'=>$product])
                            @endforeach
                        </div>

                    </div>
                </div>
                </div>
            </div>
        </section>

        {{-- @if($products ?? '')
                    <p class="result-show-message">Showing {{ $products->from() }} - {{ $products->to() }} of {{ $products->total() }} results</p>
                    @endif --}}