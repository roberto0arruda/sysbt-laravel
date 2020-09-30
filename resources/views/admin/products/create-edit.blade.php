@push('css')
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush

@extends('adminlte::page')

@section('title', $title)

@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <a href="{{ route('products.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"
                                                                         aria-hidden="true"></i></a>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
          <a href="{{ route('admin.home') }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
          </a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}"> Produtos</a></li>
        <li class="breadcrumb-item active">{{ !isset($product) ? 'Create' : 'Edit' }}</li>
      </ol>
    </div>
  </div>
  @include('includes.alerts')
@stop

@section('content')

  @if (isset($product))
    <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      @else
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @endif
          <div class="card">
            <div class="card-header text-center">
              <h3>{{ !isset($product) ? 'Cadastrar' : 'Editar' }}</h3>
            </div>
            <div class="card-body">
              <div class="form-group @if($errors->has('title')) has-error @endif">
                <label for="title">Titulo</label>
                <input type="text" id="title" name="title" value="{{$product->title ?? old('title')}}"
                       class="form-control" placeholder="Titulo para o produto">
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
                      <label for="value" title="valor da compra">Valor</label><span class="badge">(compra)</span>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">R$</span>
                        </div>
                        <input type="number" id="value" name="value" value="{{ old('value') }}" class="form-control"
                               min="1" placeholder="Quanto custou esse produto?">
                        <div class="input-group-append">
                          <span class="input-group-text">,00</span>
                        </div>
                      </div>
                      @if($errors->has('value'))
                        <p class="help-block">{{ $errors->first('value') }}</p>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4" id="divDataCompra">
                    <div class="form-group @if($errors->has('data')) has-error @endif">
                      <label for="date">Data da Compra</label>
                      <input type="date" id="date" name="date" value="{{ \Carbon\Carbon::now() }}" class="form-control">
                    </div>
                  </div>
                @endif
                <div class="col-md-12">
                  <div class="form-group @if($errors->has('price')) has-error @endif">
                    <label for="price" title="Preço de venda">Preço</label><span class="badge">(venda)</span>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                      </div>
                      <input type="number" id="price" name="price" value="{{ $product->price ?? old('price') }}"
                             class="form-control" min="1" placeholder="Qual o valor do produto">
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
                    <label for="photo1">Photo1</label>
                    <input type="file" id="photo1" name="photo1" class="form-control"
                           onchange="openFile(event, output1)" style="margin-top: 4px">
                    <input name="photo1_max_size" type="hidden" value="8">
                    <input name="photo1_max_width" type="hidden" value="6000">
                    <input name="photo1_max_height" type="hidden" value="6000">
                    <!-- Button trigger modal -->
                    @if (isset($product) && isset($product->photo1))
                      <a href="#" data-toggle="modal" data-target="#modalPhoto">
                        <div class="text-center">
                          <img class="rounded" id="output1" width="30%"
                               src="{{ asset('images/thumb/'.$product->photo1) }}">
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
                    <label for="photo2">Photo2</label>
                    <input type="file" id="photo2" name="photo2" class="form-control"
                           onchange="openFile(event, output2)" style="margin-top: 4px">
                    <input name="photo2_max_size" type="hidden" value="8">
                    <input name="photo2_max_width" type="hidden" value="6000">
                    <input name="photo2_max_height" type="hidden" value="6000">
                    <!-- Button trigger modal -->
                    @if (isset($product) && isset($product->photo2))
                      <a href="#" data-toggle="modal" data-target="#modalPhoto">
                        <div class="text-center">
                          <img class="rounded" id="output2" width="30%"
                               src="{{ asset('images/thumb/'.$product->photo2) }}">
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
                    <label for="photo3">Photo3</label>
                    <input type="file" id="photo3" name="photo3" class="form-control"
                           onchange="openFile(event, output3)" style="margin-top: 4px">
                    <input name="photo3_max_size" type="hidden" value="8">
                    <input name="photo3_max_width" type="hidden" value="6000">
                    <input name="photo3_max_height" type="hidden" value="6000">
                    <!-- Button trigger modal -->
                    @if (isset($product) && isset($product->photo3))
                      <a href="#" data-toggle="modal" data-target="#modalPhoto">
                        <div class="text-center">
                          <img class="rounded" id="output3" width="30%"
                               src="{{ asset('images/thumb/'.$product->photo3) }}">
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
                <label for="description">Descrição</label>
                <textearea id="description" name="description">
                  {{ $product->description ?? old('description') }}
                </textearea>
                {{--        {!! Form::textarea('description', $product->description ?? old('description'), ['class' => 'form-control']) !!}--}}
                @if($errors->has('description'))
                  <p class="help-block">{{ $errors->first('description') }}</p>
                @endif
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success">{{ !isset($product) ? 'Cadastrar' : 'Editar' }}</button>
              </div>
            </div>
          </div>
        </form>

        <!-- Modal Photos -->
        @if (isset($product))
          <div class="modal fade" id="modalPhoto" tabindex="-1" role="dialog" aria-labelledby="modalPhotoLabel">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                  </button>
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
          var openFile = function (event, output) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function () {
              var dataURL = reader.result;
              output.src = dataURL;
            };

            reader.readAsDataURL(input.files[0]);
          };// Fim da função para pre visualizar imagem
        </script>

        <script>
          $(document).ready(function () {
            $('#divValueCompra').attr('hidden', true);
            $('#divDataCompra').attr('hidden', true);

            $('#comprar').change(function () {
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
