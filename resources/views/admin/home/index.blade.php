@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
    </ol>
@stop

@section('content')    
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$info['disponivel']}}</h3>
                        @if ($info['disponivel'] > 1)
                            <p>Disponiveis</p>
                        @else
                            <p>Disponivel</p>
                        @endif
                    </div>
                    <div class="icon">
                        <i class="ion ion-iphone"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><sup style="font-size: 20px">R$</sup> {{number_format($info['aReceber'], 2, '.', '')}}</h3>
                    <p>
                        A Receber 
                        {{$info['nParcel']}} 
                        @if ($info['nParcel'] > 1)
                            parcelas
                        @else
                            parcela
                        @endif
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-archive"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                <div class="inner">
                    <h3><sup style="font-size: 20px">R$</sup> {{number_format($info['gasto'], 2, '.', '')}}</h3>

                    <p>Despesas Celular</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                <div class="inner">
                    <h3><sup style="font-size: 20px">R$</sup> {{number_format($info['faturamento'],'2','.','')}}</h3>
                    <p>Faturamento</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

        </div>
        <!-- ./row -->
    </section>
@stop

@section('css')
    
@stop

@section('js')
    
@stop
