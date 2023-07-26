@extends('plantilla.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-flex justify-content-center">Permisos y licencias</h3>
                        @can('permisolicencia.create')
                            <a href="{{ route('personal.create') }}" class="btn btn-primary float-right">Registrar Permiso Licencia</a>
                        @endcan
                    </div>
                    <div class="card-body py-3">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped" id="usuarios">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>documento</th>
                                        <th>dias_habiles</th>
                                        <th>fecha_inicio</th>
                                        <th>fecha_fin</th>
                                        <th>personal</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permisolicencia as $permisolicencia)
                                        <tr>
                                            <td>{{ $permisolicencia->nombre }} {{ $person->apellido }}</td>
                                            <td>{{ $permisolicencia->ci }}</td>
                                            <td>{{ $permisolicencia->correo }}</td>
                                            <td>{{ $permisolicencia->telefono }}</td>
                                            <td>{{ $permisolicencia->TipoPersonal->nombre }}</td>
                                            <td>
                                                @can('personal.show')
                                                    <a href="{{ route('personal.show', $person->id) }}"
                                                        class="btn btn-primary">Ver</a>
                                                @endcan
                                                @can('personal.edit')
                                                    <a href="{{ route('personal.edit', $person->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                @endcan
                                                @can('personal.destroy')
                                                    <form action="{{ route('personal.destroy', $person->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                                                            value="Borrar">Delete</button>
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
            </div>
        </div>
    </div>
@stop

@section('css')
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
