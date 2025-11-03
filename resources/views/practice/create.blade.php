
@extends('users.dashboard')
@section('title', 'practice create')
@section('content')
    <form action="{{url('practice/store')}}" method= "post" nctype = "multipart/form-data">
        @csrf
        <label for="title">title:</label>
       <input type="text" name="title">

       <label for="description">description:</label>
       <input type="text" name="description">


       <select name="lessonId">
        @foreach($lessons as $lesson)
         <option value="{{$lesson->id}}">{{$lesson->title}}</option>
        @endforeach
       </select>

     <input type="file" multiple>
       <button>create</button>
    </form>
@endsection