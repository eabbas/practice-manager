<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=1>
        <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>description</th>
                <th>lesson_name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($practiceWithLessons as $practice)
            <tr>
                <td>{{$practice->id}}</td>
                <td>{{$practice->title}}</td>
                <td>{{$practice->description}}</td>
                <td>
                    @if(isset($practice->lessons))
                        {{$practice->lessons->title}}
                    @endif
                </td>
                <td>
                    <a href="{{url('/practice/show/' . $practice->id)}}">Show</a>
                    <a href="{{url('/practice/edit/' . $practice->id)}}">Edit</a>
                    <a href="{{url('/practice/delete/' . $practice->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>