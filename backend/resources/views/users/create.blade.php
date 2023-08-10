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
        <label for="name">Name: </label>
        <input type="text" name="name" id="name"><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email"><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password"><br>
        <button type="submit">Create User</button>
    </form>
@endsection
