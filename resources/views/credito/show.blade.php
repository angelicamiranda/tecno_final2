@extends('plantilla.app')

@section('title', 'Ver Crédito')

@section('content_header')
    <h1>DETALLE DEL CRÉDITO</h1>
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
                    <th>Destino del Crédito</th>
                    <td>{{ $credito->destino }}</td>
                  </tr>
                  <tr>
                    <th>Cápital del Crédito</th>
                    <td>{{ $credito->monto }}</td>
                  </tr>
                  <tr>
                    <th>Plazo de Pagos</th>
                    <td>{{ $credito->plazo}} meses</td>
                  </tr>


                    @if ($credito->estado == 'Aprobado')
                      <tr>
                            <th>Día de Desembolso</th>
                            <td>{{ $credito->fecha_apertura }}</td>
                       </tr>
                    @endif

                  <tr>
                      <th>Periodo de Gracia</th>
                      <td>
                      {{ $credito->periodo_gracia }}
                      </td>
                  </tr>

                  <tr>
                    <th>Cargo Adicional</th>
                    <td>
                    {{ $credito->cargo_adicional }}
                    </td>
                </tr>
                  <tr>
                      <th>Cuota Mensual</th>
                      <td>
                      {{ $credito->montomensual }}  Bs.
                      </td>
                  </tr>
                  <tr>
                    <th>Total de Cuota Mensual</th>
                    <td>
                    {{ $credito->totalmontomensual }} Bs.
                    </td>
                </tr>

                <tr>
                    <th>Monto Final al Pagar</th>
                    <td>
                    {{ $credito->montofinal }} Bs.
                    </td>
                </tr>

                <tr>
                    <th>Cuotas Pagadas</th>
                    <td>
                    {{ $cant }}
                    </td>
                </tr>

                <tr>
                    <th>Cuotas Faltantes</th>
                    <td>
                    {{ $cuotaFaltante }}
                    </td>
                </tr>
                </tbody>
              </table>

              @if ($credito->estado == 'Aceptado')
              <a href="{{route('credito.cuotas',$credito)}}" class="btn btn-info btn-sm">Ver Cuotas</a>

              @endif



        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')

@stop
