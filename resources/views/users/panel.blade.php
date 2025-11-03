
@extends('users.dashboard')
@section('title', 'panel')
@section('userName')
    {{$user->name}}
    {{$user->family}}
    @endsection
    <a href="{{route('user.logout')}}">logout</a>
    <?php// dd($user->roles); ?>