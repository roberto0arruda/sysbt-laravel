@extends('adminlte::page')

@section('title', 'Finances')

@section('content_header')
  <a href="{{ route('admin.home') }}" class="btn btn-warning" title="Voltar">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
  </a>

  <ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Finances</a></li>
  </ol>
@stop

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading text-center"><h2>Finanças</h2></div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered" id="table_id">
          <thead>
            <tr>
              <th class="text-center info" colspan="3">Compra</th>
              <th class="text-center success" colspan="3">Venda</th>
            </tr>
            <tr>
              <th class="info">Data / Compra</th>
              <th class="info">Produto</th>
              <th class="info">Valor</th>
              <th class="success">Data / Venda</th>
              <th class="success">Valor</th>
              <th class="success">Cliente</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($balances as $item)
              <tr data-toggle="modal" data-target="#infoInvoices" data-sale="{{ $item->sale->id }}">
                <td class="info">{{ $item->date }}</td>
                <td class="info">{{ $item->product->title .'-'. $item->info }}</td>
                <td class="info">{{ $item->value }}</td>
                <td class="success">{{ $item->sale->date ?? "" }}</td>
                <td class="success">{{ $item->sale->value ?? "" }}</td>
                <td class="success">{{ $item->sale->customer->nickname ?? "" }}</td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Buy -->
  <div class="modal fade" id="infoInvoices" tabindex="-1" role="dialog" aria-labelledby="infoInvoicesLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="infoInvoicesLabel">Faturas</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th></th>
                <th class="text-center">Vencimento</th>
                <th class="text-center">Valor</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th></th>
                <th class="text-center">Vencimento</th>
                <th class="text-center">Valor</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>

@stop

@section('js')
  <script>
     $(document).on('click', '#infoInvoices', function () {
      console.log($(this).data('sale'));
     });
  </script>
@stop
