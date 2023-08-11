@extends('layouts.app')

@section('content')
    <a href="{{route('users.create')}}">Create Users link</a>
    <h1>Users</h1>
    @if(count($users) > 0)
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">{{$user->name}}</li>
            @endforeach
        </ul>
        <div class="pagination">
            {!! $users->render('pagination::bootstrap-4', [
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
