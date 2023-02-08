@extends("web::master")

<!-- Preloader Start -->
{{--<div class="se-pre-con"></div>--}}
<!-- Preloader Ends -->

@section("pages")

    @include("web::pages.components.shared.nav")

    {{--============================================= -->--}}
        @yield("content")
    {{--============================================= -->--}}

@endsection
