
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('errors') && count(session('errors')) > 0)
    @foreach(session('errors') as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
