@extends('plantilla.app')

@section('title', 'Ver Cliente')

@section('content_header')
    <h1>DETALLE DEL CLIENTE</h1>
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
                    <th>Nombre Completo</th>
                    <td>{{ $cliente->nombre }}</td>
                  </tr>

                  <tr>
                    <th>Código de Cliente</th>
                    <td>{{ str_pad($cliente->id, 4, '0', STR_PAD_LEFT) }}</td>
                  </tr>
                  <tr>
                    <th>Correo Electrónico</th>
                    <td>{{ $cliente->correo}}</td>
                  </tr>
                 <tr>
                     <th>Carnet de Identidad</th>
                     <td>{{ $cliente->ci }}</td>
                  </tr>


                  <tr>
                      <th>Lugar de Nacimiento</th>
                      <td>
                      {{ $cliente->lugar_nac }}
                      </td>
                  </tr>

                  <tr>
                    <th>Fecha de Nacimiento</th>
                    <td>
                    {{ $cliente->fecha_nac }}
                    </td>
                </tr>
                  <tr>
                      <th>Estado Civil</th>
                      <td>
                      {{ $cliente->estado_civil }}
                      </td>
                  </tr>
                  <tr>
                    <th>Cantidad de Hijos</th>
                    <td>
                    {{ $cliente->hijos }}
                    </td>
                </tr>

                <tr>
                    <th>Nacionalidad</th>
                    <td>
                    {{ $cliente->nacionalidad }}
                    </td>
                </tr>
                <tr>
                    <th>Nivel de Educación</th>
                    <td>
                    {{ $cliente->nivel_educacion }}
                    </td>
                </tr>
                <tr>
                    <th>Dirección del Domicilio</th>
                    <td>
                    {{ $cliente->direccion_domicilio }}
                    </td>
                </tr>
                <tr>
                    <th>Tipo de Tenencia de Domicilio</th>
                    <td>
                    {{ $cliente->tipo_tenencia_dom }}
                    </td>
                </tr>

                <tr>
                    <th>Dirección del Trabajo</th>
                    <td>
                    {{ $cliente->direccion_trabajo }}
                    </td>
                </tr>
                <tr>
                    <th>Tipo de Tenencia de Trabajo</th>
                    <td>
                    {{ $cliente->tipo_tenencia_trab}}
                    </td>
                </tr>

                <tr>
                    <th>Ingreso Promedio Mensual</th>
                    <td>
                    {{ $cliente->ingreso_prom_mensual}} Bs.
                    </td>
                </tr>
                </tbody>
              </table>


              <a href="{{route('cliente.edit',$cliente)}}" class="btn btn-info btn-sm">Editar</a>




        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')

@stop
