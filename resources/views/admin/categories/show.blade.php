@extends('adminlte::page')

@section('title', 'Categories create')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <a href="{{ url()->previous() }}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Categories</a></li>
      <li class="breadcrumb-item"><a class="active">Detalhes</a></li>
    </ol>
  </div>
</div>
@stop

@section('content')
  <div class="card">
    <div class="card-header">Detalhes da categoria: {{ $category->title }}</div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-1">ID:</div>
        <div class="col-sm-11">{{ $category->id }}</div>
      </div>
      <div class="row">
        <div class="col-sm-1">Titulo:</div>
        <div class="col-sm-11">{{ $category->title }}</div>
      </div>
      <div class="row">
        <div class="col-sm-1">Url:</div>
        <div class="col-sm-11">{{  $category->url }}</div>
      </div>
      <div class="row">
        <div class="col-sm-1">Descrição:</div>
        <div class="col-sm-11">{{ $category->description }}</div>
      </div>
    </div>
    <div class="card-footer">
      <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </div>
  </div>
@stop
