Set Header of the page to csrf:
<meta name="csrf-token" content="{{ csrf_token() }}" />

Copy the script tag to the script section of the page:
<script src="{{ asset('tracker/js/load.js') }}"></script>

