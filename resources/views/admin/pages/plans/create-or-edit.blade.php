@extends('adminlte::page')

@section('title', isset($plan) ? 'Editar Plano' : 'Novo Plano')

@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Cadastro de Planos <a href="{{ route('plans.index') }}" class="btn btn-xs btn-dark"><i class="fa fa-plus"
                                                                                                 aria-hidden="true"></i>
          Voltar</a></h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-tachometer-alt"></i>
            Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Plans</a></li>
        <li class="breadcrumb-item"><a class="active">{{ isset($plan) ? 'Edit' : 'Create' }}</a></li>
      </ol>
    </div>
  </div>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      @if (isset($plan))
        <form action="{{ route('plans.update', ['plan' => $plan->url]) }}" method="POST">
          @method('PUT')
      @else
        <form action="{{ route('plans.store') }}" class="form" method="POST">
      @endif

        @include('admin.pages.plans._partials.form')

      </form>
    </div>
  </div>
@stop
