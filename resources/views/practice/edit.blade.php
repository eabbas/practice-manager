<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>