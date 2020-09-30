@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>
        Planos
        <a href="{{ route('plans.create') }}" class="btn btn-xs btn-dark">
          <i class="fa fa-plus" aria-hidden="true"></i> ADD
        </a>
      </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
          <a href="{{ route('admin.home') }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
          </a>
        </li>
        <li class="breadcrumb-item active">Planos</li>
      </ol>
    </div>
  </div>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
      <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
        <button type="submit" class="btn btn-dark"><i class="fas fa-filter"></i> Filtrar</button>
      </form>
    </div>
    <div class="card-body">
      <table class="table table-condensed">
        <thead>
        <tr>
          <th>Nome</th>
          <th>Preço</th>
          <th width="270">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($plans as $plan)
          <tr>
            <td>
              {{ $plan->name }}
            </td>
            <td>
              R$ {{ number_format($plan->price, 2, ',', '.') }}
            </td>
            <td style="width:10px;">
              {{-- <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-primary">Detalhes</a> --}}
              <a href="{{ route('plans.edit', ['plan' => $plan->url]) }}" class="btn btn-info">Edit</a>
              <a href="{{ route('plans.show', ['plan' => $plan->url]) }}" class="btn btn-warning">VER</a>
              {{-- <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-warning"><i class="fas fa-address-book"></i></a> --}}
            </td>
          </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>Nome</th>
          <th>Preço</th>
          <th width="270">Ações</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <div class="card-footer">
      @if (isset($filters))
        {!! $plans->appends($filters)->links() !!}
      @else
        {!! $plans->links() !!}
      @endif
    </div>
  </div>

@stop
