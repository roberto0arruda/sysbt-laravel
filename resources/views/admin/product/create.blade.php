@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>o que comprou?</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Products</a></li>
        <li><a href="">Comprar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('products.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
        </div>
        
        <div class="box-body">
            @include('includes.alerts')
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" name="title" placeholder="title">
                </div>
                <div class="form-group">
                    <label for="price_buy">Quanto Pagou?</label>
                    <input type="text" class="form-control" name="price_buy" placeholder="R$">
                </div>
                <div class="form-group">
                    <label for="">Quanto Vai Vender?</label>
                    <input type="text" class="form-control" name="price_sale" placeholder="R$">
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