
@extends('users.dashboard')
@section('title', 'single practice')
@section('content')
    <a href="{{url('/practices')}}">Back</a>
    <h1 style="text-align:center; color: pink;">

           practice name is::   {{$practiceWithLessons->title}}
</br>
           practice description is::   {{$practiceWithLessons->description}}
</br>
          @if(isset($practiceWithLessons->lessons))
             practice lesson_name is::  {{$practiceWithLessons->lessons->title}}
        @endif

    </h1>
@endsection