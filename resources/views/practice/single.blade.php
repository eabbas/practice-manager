<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>