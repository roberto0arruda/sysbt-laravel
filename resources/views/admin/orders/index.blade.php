@extends('adminlte::page')

@section('title', $title)

@section('content_header')
  <a href="{{route('admin.home')}}" class="btn btn-warning" title="Voltar">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
  </a>
  <a href="{{route('orders.create')}}" class="btn btn-success" title="Comprar">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
  </a>

  <ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Orders</a></li>
  </ol>
@stop

@section('content')

<div class="panel panel-success">
  <div class="panel-heading text-center"><h3 class="panel-title">Orders</h3></div>
  <div class="panel-body">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th></th>
          <th>Cliente</th>
          <th>Tipo</th>
          <th>Status</th>
          <th>Valor</th>
          <th>Data</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($orders as $order)
          <tr>
            <td>{{ $order->id }}</td>
            <td></td>
            <td>{{ $order->type }}</td>
            <td>{{ $order->status }}</td>
            <td>R$ {{ number_format($order->value, 2, ',', '.') }}</td>
            <td>{{ date('d-m-Y', strtotime($order->dt)) }}</td>
            <td>Ações</td>
          </tr>
        @empty
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

{{ $orders }}
@stop
