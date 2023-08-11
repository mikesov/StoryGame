@extends('layouts.app')

@section('content')
    <a href="{{route('stories.create')}}">Create story link</a>
    <h1>Stories</h1>
    @if(count($stories) > 0)
        <ul class="list-group">
            @foreach($stories as $story)
                <li class="list-group-item">
                    <div>
                        <h3><a href="/stories/{{$story->id}}" class="link-underline-light">{{$story->name}}</a></h3>
                        <p>{{$story->created_at}}</p>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="pagination">
            {!! $stories->render('pagination::bootstrap-4', [
              'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
              'next_text' => '<i class="fa-solid fa-angle-right"></i>',
              'active_class' => 'active',
              'disabled_class' => 'disabled',
            ]) !!}
        </div>
    @else
        <p>No users found</p>
    @endif
@endsection
