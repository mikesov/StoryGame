@extends('layouts.app')

@section('content')
    <a href="{{route('users.create')}}">Create Users link</a>
    <h1>Users</h1>
{{--    @if(count($users) > 0)--}}
{{--        @foreach($users as $user)--}}
{{--            <p>{{$user->name}}</p>--}}
{{--        @endforeach--}}
{{--    @else--}}
{{--        <p>No users found</p>--}}
{{--    @endif--}}
@endsection
