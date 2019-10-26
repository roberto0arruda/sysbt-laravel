@extends('adminlte::page')

@section('title', '('.$user->name.')')

@section('content_header')
    <h1>{{ $user->name }}</h1>

    <ol class="breadcrumb">
        <li><a href="">User</a></li>
        <li><a href="">Profile</a></li>
    </ol>
@stop

@section('content')
{{$user}}
@stop