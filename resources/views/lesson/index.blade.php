
@extends('users.dashboard')
@section('title', 'lesson list')
@section('content')
    <table border=1>
        <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>description</th>
                <th>lesson_group</th>
                <th>master_id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lessons as $lesson)
            <tr>
                <td>{{$lesson->id}}</td>
                <td>{{$lesson->title}}</td>
                <td>{{$lesson->description}}</td>
                <td>{{$lesson->lesson_group}}</td>
                <td>{{$lesson->master_id}}</td>
                <td>
                    <a href="{{url('/lesson/show/' . $lesson->id)}}">Show</a>
                    <a href="{{url('/lesson/edit/' . $lesson->id)}}">Edit</a>
                    <a href="{{url('/lesson/delete/' . $lesson->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection