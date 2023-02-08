@extends("web::master")

@section("pages")

    <style>
        body{background-color:white !important}
	</style>

    <section id="or-page-not-found" class="or-page-not-found-section">
		<div class="container">
			<div class="or-page-not-found-content text-center">
				<div class="or-page-not-found-img">
					<img style="height:200px" src="{{ asset('assets/img/coming-soon-1.jpg') }}" alt="">
				</div>
				<div class="or-page-not-found-text headline pera-content">
					<h3>Coming Soon!</h3>
					<p>We are updating our website in order to serve you better.</p>
                    <p>You cant wait? Please, call 07588623090, 07830744986 or email info@pgasfoods.com 
					<!-- <a href="{{ url('/') }}">Back to Home</a> -->
				</div>
			</div>
		</div>
	</section>

@endsection
