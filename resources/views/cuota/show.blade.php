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
                    <th>Número de la Cuenta </th>
                    <td>{{ $transaccion->cuenta_ahorro->numero_cuenta }}</td>
                  </tr>

                  <tr>
                    <th>Fecha de Transacción</th>
                    <td>{{ $transaccion->fecha }}</td>
                  </tr>
                  <tr>
                      <th>Monto</th>
                      <td>
                      {{ $transaccion->monto }}
                      </td>
                  </tr>
                  <tr>
                      <th>Tipo de Moneda</th>
                      <td>
                      {{ $transaccion->cuenta_ahorro->tipo_moneda }}
                      </td>
                  </tr>
                  <tr>
                    <th>Tipo de Transacción</th>
                    <td>
                    {{ $transaccion->tipo_transaccion }}
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
