<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('lesson/update')}}" method= "post">
        @csrf
        <input type="hidden" name ="id" value="{{$lesson->id}}">

        <label for="title">title:</label>
       <input type="text" name="title" value="{{$lesson->title}}">

       <label for="description">description:</label>
       <input type="text" name="description" value="{{$lesson->description}}">

       <label for="lesson_group">lesson_group:</label>
       <input type="text" name="lesson_group" value="{{$lesson->lesson_group}}">

       <label for="master_id">master_id:</label>
       <input type="text" name="master_id" value="{{$lesson->master_id}}">

       <button>edit</button>
    </form>
</body>
</html>