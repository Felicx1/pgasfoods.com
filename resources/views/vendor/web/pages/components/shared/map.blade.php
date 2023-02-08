<!-- Map Boxed -->

@php($map = $map ?? (object)[])

<div class="mapouter">
    <div class="gmap_canvas">
        <iframe width="{{ _value($map, "width", "100%") }}" height="{{ _value($map, "height", "500") }}" id="gmap_canvas" src="https://maps.google.com/maps?q=West%20Bromwich,%20B70%206NY&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        <a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:{{ _value($map, "height", "500") }}px;width: {{ _value($map, "width", "100%") }}}</style>
        <a href="https://www.embedgooglemap.net">maps for websites</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:{{ _value($map, "height", "500") }}px;width:{{ _value($map, "width", "100%") }};}</style>
    </div>
</div>
