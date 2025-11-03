
@extends('users.dashboard')
@section('title', 'panel')
@section('content')
    {{$user->name}}
    {{$user->family}}
    {{$user->phone}}
    <a href="{{route('user.logout')}}">logout</a>
@endsection