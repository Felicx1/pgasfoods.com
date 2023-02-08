
@if(session()->get('success'))

    <div class="alert alert-success" role="alert">
         <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
        <div class="alert-text">{!! session()->get('success') !!}</div>
    </div>

@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
