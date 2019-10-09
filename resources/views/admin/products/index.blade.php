@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
  <a href="{{ route('admin.home') }}" class="btn btn-warning" title="Voltar">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
  </a>
  <a href="{{ route('products.create') }}" class="btn btn-info" title="Novo">
    <i class="fa fa-plus" aria-hidden="true"></i>
  </a>

  <ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Produtos</a></li>
  </ol>
@stop

@section('content')

<div class="panel panel-default">
  <div class="panel-heading text-center"><h3 class="panel-title">Produtos</h3></div>
  <div class="panel-body">
    <table id="table_id" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Imagem</th>
          <th>Título</th>
          <th>Preço venda</th>
          <th>estoque</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr title="{{ $product->description }}">
            <td>{{ $product->id }}</td>
            <td>@if($product->photo1) <img src="{{ asset('images/thumb/'.$product->photo1) }}"> @else <img src="{{ asset('images/thumb/no_image.png') }}"> @endif</td>
            <td>{{ $product->title }}</td>
            <td>R$ {{ number_format($product->price, 2,',','.') }}</td>
            <td>{{ $product->stock }}</td>
            <td class="btn-group">
              <a href="{{route('products.edit', $product->id)}}" class="tip btn btn-info btn-xs">
                <i class="fa fa-edit" aria-hidden="true"></i>
              </a>
              <a href="{{ route('products.show', $product->id) }}" class="tip btn btn-warning btn-xs">
                <i class="fa fa-eye" aria-hidden="true"></i>
              </a>
              <!-- Button trigger modal newOrder -->
              <a class="tip btn btn-success btn-xs" href="#" role="button" title="Comprar Produto" data-toggle="modal" data-target="#newOrder">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Imagem</th>
          <th>Título</th>
          <th>Preço venda</th>
          <th>estoque</th>
          <th>Ações</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newOrder" tabindex="-1" role="dialog" aria-labelledby="newOrderLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="newOrderLabel">Nova Compra</h4>
      </div>
      {!! Form::open(['route' => 'orders.store']) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col col-md-6">
            <div class="form-group">
              {!! Form::label('product', 'Produto', ['class' => 'form-label']) !!}
              <select class="form-control" name="product" id="select">
                <option value="" selected>Selecione um produto</option>
                @foreach ($products as $key => $item)
                  <option value="{{ $key + 1 }}">{{ $item->title }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col col-md-6">
            <div class="form-group">
              {!! Form::label('value', 'Valor', ['class' => 'form-label']) !!}
              <div class="input-group">
                <span class="input-group-addon">R$</span>
                {!! Form::number('value', null, ['class'=>'form-control', 'placeholder' => 'valor compra do Produto', 'min' => '1']) !!}
                <span class="input-group-addon">.00</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          {!! Form::date('dt', null, ['class' => 'form-control data']) !!}
        </div>
      </div>
      <div class="modal-footer">
        {!! Form::button('Fechar',['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
        {!! Form::submit('Comprar',['class' => 'btn btn-primary']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop

@section('js')
<script>
  $(document).ready( function () {
    $('#table_id').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
      }
    });
  } );
</script>
@stop
