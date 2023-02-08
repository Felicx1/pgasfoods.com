@extends("web::pages.index")

@section("content")


	<!-- =============================================
	=              Shop page container               =
	===============================================-->

			{{-- THIS IS THE PRODUCT LISTING SECTION OF THE STORE --}}
			@if($products ?? '')
				@include('store-app::store.contents.listing', ['products' => $products->data()])
			@endif

			{{-- THIS IS THE PAGINATION SECTION OF THE STORE LOAD PRODUCTS --}}
			@if($products ?? '')

				<div class="pagination-container">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">

								<div class="pagination-content text-center">
									@include('store-app::products.components.paginator', ["paginator"=>$products])
								</div>

							</div>
						</div>
					</div>
				</div>

			@endif

@endsection