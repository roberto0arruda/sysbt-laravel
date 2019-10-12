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
          {{-- <th>Imagem</th> --}}
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
            {{-- <td>@if($product->photo1) <img src="{{ asset('images/thumb/'.$product->photo1) }}"> @else <img src="{{ asset('images/thumb/no_image.png') }}"> @endif</td> --}}
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
              <!-- Button trigger modal newBuy -->
              <a class="tip btn btn-success btn-xs" href="#" role="button"
                data-product="{{ $product }}"data-toggle="modal" data-target="#newBuy"
                title="Comprar Produto" id="comprar">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
              </a>
              <!-- Button trigger modal newSale -->
              @if ($product->stock > 0)
                <a class="tip btn btn-danger btn-xs" href="#" role="button"
                  data-product="{{ $product }}"data-toggle="modal" data-target="#newSale"
                  data-customers="{{ $customers }}"
                  title="Vender Produto" id="vender">
                  <i class="fas fa-dollar-sign"></i>
                </a>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Buy -->
<div class="modal fade" id="newBuy" tabindex="-1" role="dialog" aria-labelledby="newBuyLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="newBuyLabel">Nova Compra</h4>
      </div>
      {!! Form::open(['route' => 'buys.store']) !!}
      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('value', 'Valor', ['class' => 'form-label']) !!}
          <div class="input-group">
            <span class="input-group-addon">R$</span>
            {!! Form::number('value', null, ['class'=>'form-control', 'required' ,'placeholder' => 'valor compra do Produto', 'min' => '1']) !!}
            <span class="input-group-addon">,00</span>
          </div>
        </div>
        <div class="form-group">
          <i class="fa fa-calendar-alt" aria-hidden="true"></i>
          {!! Form::label('date', 'Data', ['class' => 'form-label']) !!}
          {!! Form::date('date', now(), ['class' => 'form-control data', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('value', 'Info', ['class' => 'form-label']) !!}
            {!! Form::textarea('info', null, ['class' => 'form-control', 'required']) !!}
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

<!-- Modal Buy -->
<div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSaleLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="newSaleLabel">Vender</h4>
      </div>
      {!! Form::open(['route' => 'sales.store']) !!}
      <div class="modal-body">
        <div class="form-group">
          <select name="buy_id" id="buy_id" class="form-control"></select>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <select name="customer_id" id="customer" class="form-control" required>
              <option value="">Selecione um cliente</option>
              @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->nickname }}</option>
              @endforeach
            </select>
            <span class="input-group-addon"><i class="fa fa-plus" aria-hidden="true"></i></span>
          </div>
        </div>
        <div class="form-group">
          {!! Form::label('value', 'Valor', ['class' => 'form-label']) !!}
          <div class="input-group">
            <span class="input-group-addon">R$</span>
            {!! Form::number('value', null, ['class'=>'form-control', 'required', 'placeholder' => 'valor de venda do Produto']) !!}
            <span class="input-group-addon">,00</span>
          </div>
        </div>
        <div class="form-group">
          <i class="fa fa-calendar-alt" aria-hidden="true"></i>
          {!! Form::label('date', 'Data', ['class' => 'form-label']) !!}
          {!! Form::date('date', now(), ['class' => 'form-control data']) !!}
        </div>
        <div class="form-group text-center" id="condPag">
          {!! Form::label('fPag', 'À vista', ['class' => 'form-label', 'style' => 'margin-top: 30px']) !!}
          <!-- Rounded switch -->
          <label class="switch">
            <input type="checkbox" id="fPag">
            <span class="slider round"></span>
          </label>
          {!! Form::label('fPag', 'Parcelado', ['class' => 'form-label', 'style' => 'margin-top: 30px']) !!}
        </div>
      </div>
      <div class="modal-footer">
        {!! Form::button('Fechar',['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
        {!! Form::submit('Vender',['class' => 'btn btn-primary']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop

@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  $(document).ready( function () {
    $('#table_id').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
      }
    });
  } );

  $(document).on("click", "#comprar", function () {
    var product = $(this).data('product');
    $("#newBuyLabel").text("Nova Compra - " + product.title);
    $(".modal-body").append(`<input type="hidden" name="product_id" value="${product.id}"></input>`);
  });

  $(document).on("click", "#vender", function () {
    var product = $(this).data('product');
    var customers = $(this).data('customers');
    $("#newSaleLabel").text("Vender - " + product.title);
    $(".modal-body").append(`<input type="hidden" name="product_id" value="${product.id}"></input>`);

    axios.get(`/api/v1/buys/${product.id}/with_sold`)
      .then(function (response) {
        $("#buy_id").empty();
        console.log(response.data);
        response.data.map((data) => {
          if (data.sale == null) {
            $("#buy_id").append(`<option value="${data.id}">${data.info}</option>`);
          }
        });
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      });
  });

  $('#fPag').change(function() {
    var checkbox = $(this);
    if (checkbox.prop("checked")) {
      console.log('parcelado');
      $('#condPag').append(`
        <div class="row" id="row">
          <div class="col-xs-5">
            <label>Valor Entrada?</label>
            <input type="number" name="e" class='form-control' required></input>
          </div>
          <div class="col-xs-2" style="margin-top: 30px;"><i class="fas fa-plus"></i></div>
          <div class="col-xs-5">
            <label>Nº Parcelas</label>
            <select name="x" class="form-control" required>
              <option>1</option>
              <option>2</option>
              <option>3</option>
            </select>
          </div>
        </div>
      `);

    } else {
      console.log('a vista');
      $('#row').remove();
    }
  });
</script>
@stop

@section('css')
  <style>
    /* The switch - the box around the slider */
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* The slider */
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: #848;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
  </style>
@stop
