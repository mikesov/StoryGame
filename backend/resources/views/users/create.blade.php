@extends('layouts.app')

@section('content')
    <h1>Create Users</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/users" method="post">
        @csrf
        <div class="mb-3">
            <label for="name">Name: </label>
            <input type="text" class="form-control" name="name" id="name"><br>
        </div>
        <div class="mb-3">
            <label for="email">Email: </label>
            <input type="email" class="form-control" name="email" id="email"><br>
        </div>
        <div class="mb-3">
            <label for="password">Password: </label>
            <input type="password" class="form-control" name="password" id="password"><br>
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
@endsection
