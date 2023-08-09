@extends('plantilla.app')

@section('title', 'Ver Cuenta')

@section('content_header')
    <h1>DETALLE DE LA CUENTA DE AHORRO</h1>
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
                    <td>{{ $cuentaAhorro->cliente->nombre }}</td>
                  </tr>
                  <tr>
                    <th>Número de la Cuenta </th>
                    <td>{{ $cuentaAhorro->nro_cuenta }}</td>
                  </tr>

                  <tr>
                    <th>Fecha de Apertura</th>
                    <td>{{ $cuentaAhorro->fecha_apertura }}</td>
                  </tr>
                  <tr>
                      <th>Monto</th>
                      <td>
                      {{ $cuentaAhorro->monto }}
                      </td>
                  </tr>
                  <tr>
                      <th>Tipo de Moneda</th>
                      <td>
                      {{ $cuentaAhorro->tipo_moneda }}
                      </td>
                  </tr>
                  <tr>
                    <th>Interés</th>
                    <td>
                    {{ $cuentaAhorro->interes }}
                    </td>
                </tr>
                </tbody>
              </table>

             <a href="{{route('cuentaAhorro.movimientos',$cuentaAhorro)}}" class="btn btn-info btn-sm">Ver Movimientos</a>


        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')

@stop
