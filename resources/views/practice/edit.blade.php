
@extends('users.dashboard')
@section('title', 'edit practice')
@section('content')
    <form action="{{url('practice/update')}}" method= "post">
        @csrf
        <input type="hidden" name ="id" value="{{$practice->id}}">

        <label for="title">title:</label>
       <input type="text" name="title" value="{{$practice->title}}">

       <label for="description">description:</label>
       <input type="text" name="description" value="{{$practice->description}}">

      <select name="lessonId">
        @foreach($lessons as $lesson)
         <option value="{{$lesson->id}}" @if($practice->lesson_id == $lesson->id)
            {{"selected"}} @endif>
            {{$lesson->title}}
         </option>
        @endforeach
       </select>
     
       <button>edit</button>
    </form>
@endsection