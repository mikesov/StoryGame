@extends('layouts.app')

@section('content')
    <h1>Create Page</h1>

    <form action="/pages" method="post">
        @csrf
        <div class="mb-3">
            <label for="story_id">Story ID: </label>
            <input type="text" class="form-control" name="story_id" value="{{$story->id}}" id="story_id"><br>
        </div>
        <div class="mb-3">
            <label for="page_number">page Number: </label>
            <input type="text" class="form-control" name="page_number" id="page_number"><br>
        </div>
        <button type="submit" class="btn btn-primary">Create Page</button>
    </form>
@endsection
