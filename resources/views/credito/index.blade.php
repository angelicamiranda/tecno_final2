@extends('plantilla.app')

@section('title', 'Creditos')

@section('content_header')
    <h1>LISTA DE CRÉDITOS</h1>
@stop

@section('content')

        <a href="{{ route('credito.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Crédito</a>


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
                <th scope="col">Motivo</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>

             <tbody>
              @foreach ($creditos as $credito)
                <tr>
                  <td>{{$credito->id}}</td>
                  <td>{{$credito->cliente->nombre}}</td>
                  <td>{{$credito->motivo}}</td>
                  <td>{{$credito->estado}}</td>
                  <td>
                     <form action="{{route('credito.destroy', $credito)}}" method="post">
                      @csrf
                      @method('delete')
                       {{-- <a class="btn btn-primary btn-sm" href="{{route('creditoServicio.show',$credito)}}">Ver</a> --}}

                      <a href="{{route('credito.edit',$credito)}}" class="btn btn-info btn-sm">Editar</a>

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
