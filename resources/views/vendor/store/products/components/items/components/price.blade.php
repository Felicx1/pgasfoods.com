
@if($size_price ?? '')
    <span>{{ currency() }}{{ $size_price->prices->selling_price??'' }} </span>
@endif