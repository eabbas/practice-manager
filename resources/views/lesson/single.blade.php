<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>