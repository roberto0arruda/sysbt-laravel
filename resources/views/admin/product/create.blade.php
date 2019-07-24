@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <a href="{{ route('products.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Products</a></li>
        <li><a href="">Create</a></li>
    </ol>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header">
            <p>Cadastro</p>
        </div>
        <div class="box-body">
            @include('includes.alerts')
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="title">
                </div>
                <div class="form-group">
                    <label for="">Valor</label>
                    <div class="input-group">
                        <span class="input-group-addon">R$</span>
                        <input type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="Qual o valor do produto">
                        <span class="input-group-addon">.00</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">salvar</button>
                </div>
            </form>
        </div>
    </div>
@stop