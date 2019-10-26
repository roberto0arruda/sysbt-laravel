@push('css')
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush

@extends('adminlte::page')

@section('title', $title)

@section('content_header')
  <a href="{{ route('products.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

  <ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
      <li><a href="">Products</a></li>
    <li><a href="">{{ !isset($product) ? 'Create' : 'Edit' }}</a></li>
  </ol>
  @include('includes.alerts')
@stop

@section('content')

@if (isset($product))
  {!! Form::open(['route' => ['products.update', $product->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
@else
  {!! Form::open(['route' => 'products.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
@endif
  <div class="panel panel-primary">
    <div class="panel-heading text-center">
      <h3 class="panel-title">{{ !isset($product) ? 'Cadastrar' : 'Editar' }}</h3>
    </div>
    <div class="panel-body">

      <div class="form-group @if($errors->has('title')) has-error @endif">
        {!! Form::label('title', 'Título', ['class'=>'form-label']) !!}
        {!! Form::text('title', $product->title ?? old('title'), ['class'=>'form-control', 'placeholder' => 'Título para o produto']) !!}
        @if($errors->has('title'))
          <p class="help-block">{{ $errors->first('title') }}</p>
        @endif
      </div>

      <div class="row">
        @if (!isset($product))

          <div class="col-md-4">
            <span class="fas fa-shopping-cart"></span>
            <div class="icheck-primary">
              <input type="checkbox" name="comprar" id="comprar">
              <label for="comprar">Você está comprando?</label>
            </div>
          </div>
          <div class="col-md-4" id="divValueCompra">
            <div class="form-group @if($errors->has('value')) has-error @endif">
              {!! Form::label('value', 'Valor', ['class' => 'form-label', 'title' => 'valor de compra']) !!}<span class="badge">(compra)</span>
              <div class="input-group">
                <span class="input-group-addon">R$</span>
                {!! Form::number('value', old('value'), ['class' => 'form-control', 'min' => '1', 'placeholder' => 'Quanto custou esse produto?']) !!}
                <span class="input-group-addon">,00</span>
              </div>
              @if($errors->has('value'))
                <p class="help-block">{{ $errors->first('value') }}</p>
              @endif
            </div>
          </div>
          <div class="col-md-4" id="divDataCompra">
            <div class="form-group @if($errors->has('data')) has-error @endif">
              {!! Form::label('data', 'Data da Compra', ['class' => 'form-label']) !!}
              {!! Form::date('data', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            </div>
          </div>
        @endif
        <div class="col-md-12">
          <div class="form-group @if($errors->has('price')) has-error @endif">
            {!! Form::label('price', 'Preço', ['class' => 'form-label', 'title' => 'Preço de venda']) !!}<span class="badge">(venda)</span>
            <div class="input-group">
              <span class="input-group-addon">R$</span>
              {!! Form::number('price', $product->price ?? old('price'), ['class' => 'form-control', 'min' => '1', 'placeholder' => 'Qual o valor do produto']) !!}
            </div>
            @if($errors->has('price'))
              <p class="help-block">{{ $errors->first('price') }}</p>
            @endif
          </div>
        </div>
      </div>

      <div class="row">
        <div class='col-lg-4'>
          <div class="form-group">
            {!! Form::label('photo1', 'Photo1', ['class' => 'form-label']) !!}
            {!! Form::file('photo1', ['class' => 'form-control', 'onchange' => 'openFile(event, output1)', 'style' => 'margin-top:4px']) !!}
            <input name="photo1_max_size" type="hidden" value="8">
            <input name="photo1_max_width" type="hidden" value="6000">
            <input name="photo1_max_height" type="hidden" value="6000">
            <!-- Button trigger modal -->
            @if (isset($product) && isset($product->photo1))
            <a href="#" data-toggle="modal" data-target="#modalPhoto">
                <div class="text-center">
                    <img class="rounded" id="output1" width="30%" src="{{ asset('images/thumb/'.$product->photo1) }}">
                </div>
            </a>
            @else
              <div class="text-center">
                <img class="rounded" id="output1" width="30%">
              </div>
            @endif
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            {!! Form::label('photo2', 'Photo2', ['class' => 'form-label']) !!}
            {!! Form::file('photo2', ['class' => 'form-control', 'onchange' => 'openFile(event, output2)', 'style' => 'margin-top:4px']) !!}
            <input name="photo2_max_size" type="hidden" value="8">
            <input name="photo2_max_width" type="hidden" value="6000">
            <input name="photo2_max_height" type="hidden" value="6000">
            <!-- Button trigger modal -->
            @if (isset($product) && isset($product->photo2))
            <a href="#" data-toggle="modal" data-target="#modalPhoto">
              <div class="text-center">
                <img class="rounded" id="output2" width="30%" src="{{ asset('images/thumb/'.$product->photo2) }}">
              </div>
            </a>
            @else
              <div class="text-center">
                <img class="rounded" id="output2" width="30%">
              </div>
            @endif
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            {!! Form::label('photo3', 'Photo3', ['class' => 'form-label']) !!}
            {!! Form::file('photo3', ['class' => 'form-control', 'onchange' => 'openFile(event, output3)', 'style' => 'margin-top:4px']) !!}
            <input name="photo3_max_size" type="hidden" value="8">
            <input name="photo3_max_width" type="hidden" value="6000">
            <input name="photo3_max_height" type="hidden" value="6000">
            <!-- Button trigger modal -->
            @if (isset($product) && isset($product->photo3))
            <a href="#" data-toggle="modal" data-target="#modalPhoto">
              <div class="text-center">
                <img class="rounded" id="output3" width="30%" src="{{ asset('images/thumb/'.$product->photo3) }}">
              </div>
            </a>
            @else
              <div class="text-center">
                <img class="rounded" id="output3" width="30%">
              </div>
            @endif
          </div>
        </div>
      </div>

      <div class="form-group @if($errors->has('description')) has-error @endif">
        {!! Form::label('description', 'Descrição', ['class' => 'form-label']) !!}
        {!! Form::textarea('description', $product->description ?? old('description'), ['class' => 'form-control']) !!}
        @if($errors->has('description'))
          <p class="help-block">{{ $errors->first('description') }}</p>
        @endif
      </div>

      <div class="form-group">
        {!! Form::submit(!isset($product) ? 'Cadastrar' : 'Editar', ['class' => 'btn btn-success']) !!}
      </div>
    </div>
  </div>
  {!! Form::close() !!}

  <!-- Modal Photos -->
  @if (isset($product))
  <div class="modal fade" id="modalPhoto" tabindex="-1" role="dialog" aria-labelledby="modalPhotoLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modalPhotoLabel">{{ $product->title }}</h4>
        </div>
        <div class="modal-body text-center">
          <img src="{{ asset('storage/products/'.$product->photo1) }}">
          <img src="{{ asset('storage/products/'.$product->photo2) }}">
          <img src="{{ asset('storage/products/'.$product->photo3) }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endif
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<script>
  // funcao para pre-visualizar a imagem a ser carregada
  var openFile = function(event, output) {
    var input = event.target;
    var reader = new FileReader();

    reader.onload = function(){
      var dataURL = reader.result;
      output.src = dataURL;
    };

    reader.readAsDataURL(input.files[0]);
  };// Fim da função para pre visualizar imagem
</script>

<script>
  $(document).ready(function() {
    $('#divValueCompra').attr('hidden', true);
    $('#divDataCompra').attr('hidden', true);

    $('#comprar').change(function() {
      var checkbox = $(this);
      if (checkbox.prop("checked")) {
        console.log('marcado');
        $('#divValueCompra').removeAttr('hidden');
        $('#divDataCompra').removeAttr('hidden');
        $("#value").attr("required", true);
        $("#dt").attr("required", true);
      } else {
        console.log('desmarcado');
        $('#divValueCompra').attr('hidden', true);
        $('#divDataCompra').attr('hidden', true);
        $("#value").attr("required", false);
        $("#dt").attr("required", false);
      }
    })
  })
</script>

<script>
  CKEDITOR.replace('description');
</script>
@endsection
