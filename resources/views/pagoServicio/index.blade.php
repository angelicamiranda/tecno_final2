@extends('plantilla.app')

@section('title', 'Servicios')

@section('content_header')
    <h1>LISTA DE PAGOS DE SERVICIOS BÁSICOS</h1>
@stop

@section('content')

        <a href="{{ route('pagoServicio.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Pago de Servicio</a>


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
                <th scope="col">Código Cliente</th>
                <th scope="col">Servicio</th>
                <th scope="col">Fecha</th>
                <th scope="col">Empleado</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>

             <tbody>
              @foreach ($pagos as $pago)
                <tr>
                  <td>{{$pago->id}}</td>
                  <td>{{$pago->codigo_cliente}}</td>
                  <td>{{$pago->servicio->nombre}}</td>
                  <td>{{$pago->fecha}}</td>
                  <td>{{$pago->usuario->nombre}}</td>
                  <td>
                     <form action="{{route('pagoServicio.destroy', $pago)}}" method="post">
                      @csrf
                      @method('delete')
                       {{-- <a class="btn btn-primary btn-sm" href="{{route('pagoServicio.show',$pago)}}">Ver</a> --}}

                      <a href="{{route('pagoServicio.edit',$pago)}}" class="btn btn-info btn-sm">Editar</a>

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
