@extends('plantilla.app')

@section('title', 'Creditos')

@section('content_header')
    <h1>LISTA DE CRÉDITOS</h1>
@stop

@section('content')
@if (Auth::user()->rol_id == 2)
        <a href="{{ route('credito.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Crédito</a>

@endif
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
                <th scope="col">Destino</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>

             <tbody>
              @foreach ($creditos as $credito)
                <tr>
                  <td>{{($credito->id == null)? "--":$credito->id}}</td>
                  <td>{{($credito->cliente_id == null)? "--":$credito->cliente->nombre}}</td>
                  <td>{{($credito->destino == null)? "--":$credito->destino}}</td>
                  <td>{{($credito->estado == null)? "--":$credito->estado}}</td>
                  <td>

                     <a class="btn btn-primary btn-sm" href="{{route('credito.show',$credito)}}">Ver</a>
                     @if (Auth::user()->rol_id == 2)
                      <a href="{{route('credito.edit',$credito)}}" class="btn btn-info btn-sm">Editar</a>
                      @endif
                      @if (Auth::user()->rol_id == 1)
                        @if ($credito->estado == 'Solicitado')
                        <a href="{{route('credito.estadoview',$credito)}}" class="btn btn-info btn-sm">Editar Estado</a>
                        @endif

                      @endif


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
