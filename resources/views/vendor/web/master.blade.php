<!DOCTYPE html>
<html lang="en">

@include("web::includes.header")

<body class="organio-wrapper">
    <div id="preloader"></div>
    <div class="up">
        <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
    </div>

    @yield("pages")

    @include("web::includes.footer")

</body>

</html>