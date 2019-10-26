@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
<a href="{{ route('products.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

<ol class="breadcrumb">
  <li><a href="">Dashboard</a></li>
  <li><a href="">Products</a></li>
  <li><a href="">Buy</a></li>
</ol>
@stop

@section('content')
<div class="box box-success">
  <div class="box-header">
    <p>Produto Compra</p>
  </div>
  <div class="box-body">
    {{ Form::open(['route' => 'orders.store', 'method' => 'POST']) }}

    <div class="form-group">
      {!! Form::label('title', 'Produto', ['class' => 'form-label']) !!}
      {!! Form::select('title', $products, null, ['placeholder' => 'Escolha um produto', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('price', 'Valor') !!}
      <div class="input-group">
        <span class="input-group-addon">R$</span>
        {!! Form::number('price', old('price'), ['class' => 'form-control', 'placeholder' => 'Qual o valor do produto']) !!}
        <span class="input-group-addon">.00</span>
      </div>
    </div>

    <div class="form-group">
      {!! Form::submit('Comprar', ['class' => 'btn btn-success']) !!}
    </div>

    {{ Form::close() }}
  </div>
</div>

@stop
