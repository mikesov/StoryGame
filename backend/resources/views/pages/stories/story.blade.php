@extends('layouts.app')

@section('content')
    <h1>{{$story->name}}</h1>
    <p>{{$story->cover}}</p>
    <a href="/stories/{{$story->id}}/edit" class="btn btn-primary float-start">Edit</a>
    <form class="invisible" id="delete-form" action="{{ route('stories.destroy', $story->id) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
    </form>
    <button type="submit" form="delete-form" class="btn btn-danger float-end">Delete</button>
@endsection
