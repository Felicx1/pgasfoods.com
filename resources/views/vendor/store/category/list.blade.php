
@if ($categories = _category())

    <div class="or-category-menu ul-li-block">
        <ul>

            @php
                $limit = (int) $limit ?? 9;
                $counter = 0;
            @endphp

            @foreach($categories as $category)
                @php
                    $id = _value($category, "id");
                    $url = _value($category, "url");
                @endphp
                @if($counter > $limit ?? 9) @break @endif
                <li>
                    <a href="{{ url("/store/category/{$id}/selected/{$url}") }}">
                        <i class="flaticon-cardboard"></i> {{ _value($category, "namex") }}
                    </a>
                </li>

                @php
                    $counter++
                @endphp

            @endforeach

        </ul>
    </div>

@endif

