<h3>
    <a href="{{ route('store.product.details', ['id'=>$product->id,'name'=>strip_chars($product->namex ?? '')]) }}"> 
       {{ _value($product, 'namex') }} 
    </a>
</h3>