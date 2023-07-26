@extends('plantilla.app')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    @can('archivos.create')
        <a href="{{ route('archivos.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Cliente</a>
    @endcan
    <div class="card">
        <div class="card-body">
            <div class="table-responsive my-3">
                {{-- <table class="table table-striped" id="usuarios">

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
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->ci }}</td>
                                <td>{{ $cliente->lugar_nac }}</td>
                                <td>{{ $cliente->estado_civil}}</a></td>
                                <td>{{ $cliente->nacionalidad }}</td>

                                <td class="d-flex justify-content-center">
                                    /*@can('cliente.edit')
                                        <a href="{{ route('cliente.edit', $cliente) }}"
                                            class="btn btn-info btn-sm mx-1">Editar</a>
                                    @endcan
                                    @can('cliente.destroy')
                                        <form action="{{ route('cliente.destroy', $cliente) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm mx-1"
                                                onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                                                value="Borrar">Eliminar</button>
                                        </form>
                                    @endcan
                                    */
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table> --}}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#usuarios').DataTable();
        });
    </script> --}}
@stop