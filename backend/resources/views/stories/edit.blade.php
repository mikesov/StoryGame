@extends('layouts.app')

@section('content')
    <h1>Edit Story</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stories.update', $story->id) }}" method="POST" >
        @csrf
        <div class="mb-3">
            <label for="name">Name: </label>
            <input type="text" class="form-control" name="name" id="name" value="{{$story->name}}"><br>
        </div>
        <div class="mb-3">
            <label for="cover">Cover: </label>
            <input type="text" class="form-control" name="cover" id="cover" value="{{$story->cover}}"><br>
        </div>
        <div class="mb-3">
            <label for="reward">Reward: </label>
            <input type="text" class="form-control" name="reward" id="reward" value="{{$story->reward}}"><br>
        </div>
        <div class="mb-3">
            <label for="pages">Pages: </label>
            <p>{{$story->pages}}</p>
        </div>
        <input type="hidden" name="_method" value="PUT">
        <button type="submit" class="btn btn-primary">Update Story</button>
    </form>
    <form action="{{ route('pages.create', $story->id) }}" method="POST" id="add-page-form" class="invisible">
        @csrf
    </form>
    <button form="add-page-form" action="{{ route('pages.create') }}" class="btn btn-primary">Add page</button>
@endsection
