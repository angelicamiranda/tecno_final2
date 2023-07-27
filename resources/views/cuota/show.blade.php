@extends('plantilla.app')

@section('title', 'Ver Transacción')

@section('content_header')
    <h1>DETALLE DE LA CUOTA</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <tbody>
                  <tr>
                    <th></th>
                    <td>

                  </td>
                  </tr>
                  <tr>
                    <th>Nombre del cliente</th>
                    <td>{{ $cuotum->credito->cliente->nombre }}</td>
                  </tr>
                  <tr>
                    <th>Motivo del Crédito </th>
                    <td>{{ $cuotum->credito->motivo }}</td>
                  </tr>

                  <tr>
                    <th>Monto Pagado</th>
                    <td>{{ $cuotum->monto }}</td>
                  </tr>
                  <tr>
                      <th>Fecha de Pago</th>
                      <td>
                      {{ $cuotum->fecha }}
                      </td>
                  </tr>
                  <tr>
                      <th>Cargo Adicional</th>
                      <td>
                      {{ $cuotum->cargo_adicional }}
                      </td>
                  </tr>
                  <tr>
                    <th>Total Pagado</th>
                    <td>
                    {{ $cuotum->total_cuota }}
                    </td>
                </tr>
                </tbody>
              </table>




        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')

@stop
