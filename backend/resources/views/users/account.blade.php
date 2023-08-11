@extends('layouts.app')

@section('content')
    <h1>{{$user->name}}</h1>
    <p>{{$user->created_at}}</p>
@endsection
