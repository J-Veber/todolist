@extends('main')

<!--если нет записей-->

@section('content')
    <input class="new-todo" placeholder="What needs to be done?" autofocus>
    @if(count($tasks) > 0)
        @foreach($tasks as $task)
            <li>{{$task}}</li>
        @endforeach
    @endif

@endsection