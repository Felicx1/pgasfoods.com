<!-- Start Breadcrumb
    ============================================= -->

@php($image = "assets/img/slide-04.jpg")

@switch(_value($page, "url"))
    @case("about")
    @php($image = "assets/img/slide-color-01.png")
    @break
    @case("contact")
    @php($image = "assets/img/slide-04.jpg")
    @break
    @case("services")
    @php($image = "assets/img/slide-11.jpg")
    @break

@endswitch

<div class="breadcrumb-area shadow dark bg-fixed text-light" style="background-image: url({{ asset($image) }});">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>{{ _value($page, "title") }}</h1>
            </div>
            <div class="col-md-6 text-right">
                <ul class="breadcrumb">
                    <li><a href="{{ url("/") }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">{{ _value($page, "label") }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->
