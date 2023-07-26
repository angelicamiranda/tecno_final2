@extends('plantilla.app')

@section('title', 'Archivos')

@section('content_header')
    <h1>Archivos</h1>
@stop

@section('content')
    @can('cliente.create')
        <a href="{{ route('cliente.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Cliente</a>
    @endcan
    <div class="card">
        <div class="card-body">
            <div class="table-responsive my-3">
                <table class="table table-striped" id="clientes">

                    <thead>

                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Registrado</th>
                            <th scope="col">Link</th>
                            <th scope="col">Personal</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->descripcion }}</td>
                                <td>{{ $cliente->updated_at }}</td>
                                <td><a href="{{ asset($cliente->link) }}">Ver archivo</a></td>
                                <td>{{ $cliente->Personal->nombre }}</td>

                                <td class="d-flex justify-content-center">
                                    @can('cliente.edit')
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
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
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
    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable();
        });
    </script>
@stop
