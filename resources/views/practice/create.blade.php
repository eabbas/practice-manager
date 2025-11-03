<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
       <!-- <input type="file" name = "practiceMedia">
       <label>:فایل ضمیمه</label> -->
       
       <button>create</button>
    </form>
</body>
</html>