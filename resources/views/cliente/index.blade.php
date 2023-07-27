
@extends('plantilla.app')

@section('title', 'Servicios')

@section('content_header')
    <h1>LISTA DE CLIENTES</h1>
@endsection
@section('content')

        <a href="{{ route('cliente.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Cliente</a>


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
                    <th scope="col">Nombre</th>
                    <th scope="col">Carnet de Identidad</th>
                    <th scope="col">Lugar de Nacimiento</th>
                    <th scope="col">Estado Civil</th>
                    <th scope="col">Nacionalidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{($cliente->id == null)? "--": $cliente->id }}</td>
                        <td>{{($cliente->nombre == null)? "--": $cliente->nombre }}</td>
                        <td>{{($cliente->ci == null)? "--": $cliente->ci }}</td>
                        <td>{{ ($cliente->lugar_nac == null)? "--":$cliente->lugar_nac }}</td>
                        <td>{{ ($cliente->estado_civil == null)? "--":$cliente->estado_civil}}</a></td>
                        <td>{{ ($cliente->nacionalidad == null)? "--":$cliente->nacionalidad }}</td>

                        <td class="d-flex justify-content-center">
                            <form action="{{route('cliente.destroy', $cliente)}}" method="post">
                                @csrf
                                @method('delete')
                                {{-- <a class="btn btn-primary btn-sm" href="{{route('cleintes.show',$cleinte)}}">Ver</a> --}}

                                  <a href="{{route('cliente.edit',$cliente)}}" class="btn btn-info btn-sm">Editar</a>

                                  <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                                  value="Borrar">Eliminar</button>
                              </form>
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
