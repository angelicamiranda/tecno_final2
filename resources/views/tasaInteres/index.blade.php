
@extends('plantilla.app')

@section('title', 'Tasas')

@section('content_header')
    <h1>LISTA DE TASAS DE INTERÉS</h1>

@section('content')

        <a href="{{ route('tasaInteres.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Tasa de Interés</a>


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
                    <th scope="col">Tipo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Porcentaje</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tasas as $tasa)
                    <tr>
                        <td>{{ ($tasa->id == null)? "--": $tasa->id }}</td>
                        <td>{{($tasa->tipo == null)? "--": $tasa->tipo }}</td>
                        <td>{{ ($tasa->descripcion == null)? "--":$tasa->descripcion }}</td>
                        <td>{{($tasa->porcentaje == null)? "--": $tasa->porcentaje }}</td>
                        <td>



                                <a href="{{route('tasaInteres.edit',$tasa)}}" class="btn btn-info btn-sm">Editar</a>

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
