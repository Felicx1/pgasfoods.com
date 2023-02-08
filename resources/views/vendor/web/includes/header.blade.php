<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env("APP_NAME") }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Pgas Food Ltd">
    <meta name="keywords" content="	farm, food, fresh, fruit, nutrition, Pigas, Pigas farm, Pgas food store, Pgas shop, Pgas store, Pgas, store, vegetable">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset("assets/img/logo.png") }}" type="image/x-icon">
    <!-- Mobile Specific Meta -->

    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/fontawesome-all.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/flaticon.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/animate.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/video.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/jquery.mCustomScrollbar.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/rs6.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/slick.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/slick-theme.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">

    {{-- call css cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @include("web::includes.styles.styles")

    @yield("styles")
</head>
