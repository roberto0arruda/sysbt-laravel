@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Product Info</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Products</a></li>
        <li><a href="">Info</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('products.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
        </div>
        <div class="box-body">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        @if ($product->image)
                            <img class="media-object" src="{{ asset('storage/products/'.$product->image) }}" alt="..." width="250em">
                        @endif
                    </a>
                </div>
                <div class="media-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$product->title}}</td>
                                <td>R$ {{number_format($product->price_sale, 2,'.',' ')}}</td>
                            </tr>
                            <tr>
                                <td>
                                    @if ($product->sold != 1)
                                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-money" aria-hidden="true"></i> Vender</a>
                                    @else
                                        <a href="#" class="btn btn-xs btn-success"><i class="fa fa-like" aria-hidden="true"></i> Vendido</a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Parcelas</th>
                        <th>Vencimentos</th>
                        <th>tag</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product->payments as $payment)
                        <tr>
                            <td>{{$payment->id}}</td>
                            <td>{{$payment->venciment}}</td>
                            @if ($payment->paid == 1)
                                <td>recebido</td>
                            @else
                                <td>a receber</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop