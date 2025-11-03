
@extends('users.dashboard')
@section('title', 'single lesson')
@section('content')
    <a href="{{url('/lessons')}}">Back</a>
    <h1 style="text-align:center; color: pink;">
           lesson name is::   {{$lesson->title}}
</br>
           lesson description is::   {{$lesson->description}}
</br>
           lesson lesson_group is::   {{$lesson->lesson_group}}
</br>
           lesson master is::   {{$lesson->master_id}}
    </h1>
@endsection