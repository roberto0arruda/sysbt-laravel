@extends('adminlte::page')

@section('title', 'Buy')

@section('content_header')
    <h1>Product for sale</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Products</a></li>
        <li><a href="">Sale</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
        </div>
        <div class="box-body">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        @if ($product->image)
                            <img class="media-object" src="{{asset('storage/products/'.$product->image)}}" alt="..." width="100px">
                        @endif
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{$product->title}}</h4>
                    Valor R$ {{number_format($product->price_sale, 2,'.',' ')}}
                </div>
            </div>

            <form action="{{route('products.update', $product->id)}}" method="POST">
                {!! csrf_field() !!}
                @method('PUT')

                <div class="form-group">
                    <label for="client">Pra Quem Vendeu?</label>
                    <input type="text" class="form-control" name="client" placeholder="nome">
                </div>

                <div class="form-group">
                    <label for="value">Entrada</label>
                    <input type="text" class="form-control" name="value" placeholder="R$">
                </div>

                <div class="form-group">
                    <label for="x">Mais</label>
                    <input type="number" class="form-control" name="x" placeholder="número de parcelas">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Sale</button>
                </div>
            </form>
        </div>
    </div>
    
@stop