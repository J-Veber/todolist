@extends('main')

<!--если нет записей-->

@section('content')
    <h1>todos <input class="button" id="close_session" name="close_session" type= "submit" value="Exit"></h1>
    <input class="new-todo" placeholder="What needs to be done?" autofocus>
    {{--@if(count($tasks) > 0)--}}
        {{--@foreach($tasks as $task)--}}
            {{--<li>{{$task}}</li>--}}
        {{--@endforeach--}}
    {{--@endif--}}
@endsection