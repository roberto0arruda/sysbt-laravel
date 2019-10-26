@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <a href="{{ route('products.index')}}" class="btn btn-warning" title="Voltar">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </a>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Products</a></li>
        <li><a href="">Show</a></li>
    </ol>
@stop

@section('content')
  <div class="box box-default">
    <div class="box-header text-center">
      <h3 class="page-header">
        <i class="fa fa-globe"></i> {{ $product->title }}
      </h3>
    </div>
    <div class="box-body">
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th colspan="4" class="text-center">Compras</th>
                <th colspan="3" class="text-center">Vendas</th>
              </tr>
              <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Info</th>
                <th>Subtotal</th>
                <th>Data</th>
                <th>Cliente</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($buysWithSale as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->date }}</td>
                  <td>{{ $product->title.' - '.$item->info }}</td>
                  <td>{{ $item->value }}</td>
                  @if ( isset($item->sale->id) )
                    <td>{{ $item->sale->date }}</td>
                    <td>{{ $item->sale->customer_id }}</td>
                    <td>{{ $item->sale->value }}</td>
                  @else
                    <td colspan="3" class="text-center">Botao de venda</td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div>

@stop
