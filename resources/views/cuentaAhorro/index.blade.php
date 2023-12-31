@extends('plantilla.app')

@section('title', 'Cuentas')

@section('content_header')
    <h1>LISTA DE CUENTAS DE AHORRO</h1>
@stop

@section('content')

        <a href="{{ route('cuentaAhorro.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Cuenta de Ahorro</a>


    @if (session('error'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
          <div class="table-responsive">
          <table class="table" id="usuarios" >

            <thead>

              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nro Cuenta</th>
                <th scope="col">Cliente</th>
                <th scope="col">Tipo de Moneda</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>

             <tbody>
              @foreach ($cuentas as $cuenta)
                <tr>
                  <td>{{($cuenta->id == null)? "--": $cuenta->id}}</td>
                  <td>{{($cuenta->nro_cuenta == null)? "--":$cuenta->nro_cuenta}}</td>
                  <td>{{($cuenta->cliente_id == null)? "--":$cuenta->cliente->nombre}}</td>
                  <td>{{($cuenta->tipo_moneda == null)? "--":$cuenta->tipo_moneda}}</td>
                  <td>
                      {{--  <form action="{{route('users.destroy', $user)}}" method="post">
                      @csrf
                      @method('delete')  --}}
                       <a class="btn btn-primary btn-sm" href="{{route('cuentaAhorro.show',$cuenta->id)}}">Ver</a>

                      <a href="{{route('cuentaAhorro.edit',$cuenta)}}" class="btn btn-info btn-sm">Editar</a>

                      {{--  <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                      value="Borrar">Eliminar</button>
                    </form>    --}}
                  </td>
                </tr>
               @endforeach

            </tbody>

          </table>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css"> --}}
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable();
        });
    </script>
@stop
