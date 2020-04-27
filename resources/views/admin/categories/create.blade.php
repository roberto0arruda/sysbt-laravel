@extends('adminlte::page')

@section('title', 'Categories create')

@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <a href="{{ url()->previous() }}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Categories</a></li>
      <li class="breadcrumb-item active"><a class="active">Create</a></li>
    </ol>
  </div>
</div>
@stop

@section('content')

@include('includes.alerts')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Por favor, preencha as informações abaixo</h3>
  </div>
  <div class="card-body">
    <form action="{{ route('categories.store') }}" method="POST">
      @include('admin.categories._partials.form')
    </form>
  </div>
</div>
@stop
