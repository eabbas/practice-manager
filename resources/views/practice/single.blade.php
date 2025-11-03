
@extends('users.dashboard')
@section('title', 'single practice')
@section('content')
    <a href="{{url('/practices')}}">Back</a>
    <h1 style="text-align:center; color: pink;">

           practice name is::   {{$practice->title}}
</br>
           practice description is::   {{$practice->description}}
</br>
          @if(isset($practice->lesson_id))
             practice lesson_name is::  {{$practice->lesson->title}}
        @endif

    </h1>
@endsection