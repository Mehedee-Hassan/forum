
@if (\Session::has('msg'))
    <div class="alert alert-success">
        {{ Session::get('msg') }}
    </div>

@endif
