@extends('plantilla.app')

@section('title', 'Cuotas')

@section('content_header')
    <h1>LISTA DE CUOTAS</h1>
@stop

@section('content')

        <a href="{{ route('cuota.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Cuota</a>


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
                <th scope="col">Destino del Crédito</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>

             <tbody>
              @foreach ($cuotas as $cuota)
                <tr>
                  <td>{{$cuota->id}}</td>
                  <td>{{$cuota->credito->cliente->nombre}}</td>
                  <td>{{$cuota->credito->destino}}</td>
                  <td>{{$cuota->fecha}}</td>
                  <td>
                    <a class="btn btn-primary btn-sm" href="{{route('cuota.show',$cuota)}}">Ver</a>
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
