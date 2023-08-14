@extends('layouts.app')

@section('content')
    <h1>Create Story</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/stories" method="post">
        @csrf
        <div class="mb-3">
            <label for="name">Name: </label>
            <input type="text" class="form-control" name="name" id="name"><br>
        </div>
        <div class="mb-3">
            <label for="cover">Cover: </label>
            <input type="text" class="form-control" name="cover" id="cover"><br>
        </div>
        <div class="mb-3">
            <label for="reward">Reward: </label>
            <input type="text" class="form-control" name="reward" id="reward"><br>
        </div>
        <button type="submit" class="btn btn-primary">Create Story</button>
    </form>
@endsection
