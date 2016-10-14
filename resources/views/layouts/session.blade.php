@if (session('success'))
    <div class="alert alert-info">
        <span>{{session('success')}}</span>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        <span>{{session('error')}}</span>
    </div>
@endif
