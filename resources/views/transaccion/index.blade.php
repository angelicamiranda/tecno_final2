@extends('plantilla.app')

@section('title', 'Servicios')

@section('content_header')
    <h1>LISTA DE TRANSACCIONES</h1>
@stop

@section('content')

        <a href="{{ route('transaccion.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Transacción</a>


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
                <th scope="col">Cliente</th>
                <th scope="col">Nro Cuenta</th>
                <th scope="col">Fecha</th>
                <th scope="col">Tipo Transacción</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>

             <tbody>
              @foreach ($transacciones as $transaccione)
                <tr>
                  <td>{{($transaccione->id == null)? "--":$transaccione->id}}</td>
                  <td>{{($transaccione->cuenta_ahorro_id == null)? "--":$transaccione->cuenta_ahorro->cliente->nombre}}</td>
                  <td>{{($transaccione->cuenta_ahorro_id == null)? "--":$transaccione->cuenta_ahorro->nro_cuenta}}</td>
                  <td>{{($transaccione->fecha == null)? "--":$transaccione->fecha}}</td>
                  <td>{{($transaccione->tipo_transaccion == null)? "--":$transaccione->tipo_transaccion}}</td>

                  <td>
                     {{--  <form action="{{route('users.destroy', $user)}}" method="post">
                      @csrf
                      @method('delete')  --}}
                      <a class="btn btn-primary btn-sm" href="{{route('transaccion.show',$transaccione->id)}}">Ver</a>

                        {{--  <a href="{{route('users.edit',$user)}}" class="btn btn-info btn-sm">Editar</a>  --}}

                      {{--  <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                      value="Borrar">Eliminar</button>
                    </form>  --}}
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
