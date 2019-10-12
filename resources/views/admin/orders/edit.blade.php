@extends('adminlte::page')

@section('title', 'Buy')

@section('content_header')
    <a href="{{ route('products.index') }}" class="btn btn-warning">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </a>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Products</a></li>
        <li><a href="">Edit</a></li>
    </ol>
@stop

@section('content')
    <div class="box box-warning">
        <div class="box-header">
            <p>Product edit</p>
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
                    Valor R$ {{number_format($product->price, 2,'.',' ')}}
                </div>
            </div>

            <form action="{{route('products.update', $product->id)}}" method="POST">
                {!! csrf_field() !!}
                @method('PUT')

                <div class="form-group">
                    
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Sale</button>
                </div>
            </form>
        </div>
    </div>
    
@stop