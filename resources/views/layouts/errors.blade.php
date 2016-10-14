@if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <span>{{$error}}</span>
            </div>
        @endforeach
    </ul>
@endif
