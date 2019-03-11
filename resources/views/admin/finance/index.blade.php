@extends('adminlte::page')

@section('title', 'Finances')

@section('content_header')
    <h1>Finances</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Finances</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('admin.home') }} " class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
        </div>
        <div class="box-body">
            @include('includes.alerts')

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Produto</th>
                            <th>Parcela</th>
                            <th>DT Vence</th>
                            <th>Valor</th>
                            <th>Recebeu em</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                        <tr data-entry-id="{{ $payment->id }}" @if ($payment->paid == 1) class="success" @endif >
                            <td>{{$payment->id}}</td>
                            <td>{{$payment->product->title}}</td>
                            <td>{{$payment->parc}}</td>
                            <td>{{ date('d-m-Y', strtotime($payment->venciment) ) }}</td>
                            <td>R$ {{ number_format($payment->value, 2)}}</td>
                            <td> @if ($payment->paid == 1) {{ date('d-m-Y H:m:s', strtotime($payment->updated_at)) }} @endif </td>
                            <td>
                                {{-- <a href="{{route('products.show', $product->id)}}" class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Show</a> --}}
                                @if ($payment->paid != 1)
                                    <a href="{{route('finances.edit', [$payment->id])}} " id="receber" class="btn btn-xs btn-danger"><i class="fa fa-money" aria-hidden="true"></i> receber</a>
                                @else
                                    <label class="btn btn-xs btn-success"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> ok</label>
                                    {{-- <p class="btn btn-xs btn-success"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> OK</p> --}}
                                @endif
                            </td>
                        </tr>                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('js')

@stop