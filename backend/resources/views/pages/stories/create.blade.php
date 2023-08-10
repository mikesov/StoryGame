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
        <label for="name">Name: </label>
        <input type="text" name="name" id="name"><br>
        <label for="cover">Cover: </label>
        <input type="text" name="cover" id="cover"><br>
        <button type="submit">Create User</button>
    </form>
@endsection
