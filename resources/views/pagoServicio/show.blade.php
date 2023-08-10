@extends('plantilla.app')

@section('title', 'Ver Transacción')

@section('content_header')
    <h1>DETALLE DE LA PAGOS DE SERVICIOS</h1>
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
                    <th>Código del cliente</th>
                    <td>{{ $pago->codigo_cliente}}</td>
                  </tr>
                  <tr>
                    <th>Monto  </th>
                    <td>{{ $pago->monto }}</td>
                  </tr>

                  <tr>
                    <th> Fecha del Pago</th>
                    <td>{{ $pago->fecha }}</td>
                  </tr>
                  <tr>
                      <th>Empleado Encargado</th>
                      <td>
                      {{ $pago->usuario->nombre }}
                      </td>
                  </tr>
                  <tr>
                      <th>Servicio</th>
                      <td>
                      {{ $pago->servicio->nombre }}
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
