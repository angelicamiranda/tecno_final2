
@extends('plantilla.app')

@section('title', 'Usuarios')

@section('content_header')
    <h1>LISTA DE USUARIOS</h1>
@stop

@section('content')

        <a href="{{ route('users.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Usuario</a>


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
                <th scope="col">CI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cargo</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>

             <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{($user->id == null)? "--":$user->id}}</td>
                    <td>{{($user->ci == null)? "--":$user->ci}}</td>
                    <td>{{($user->nombre == null)? "--":$user->nombre}}</td>
                    <td>{{($user->cargo == null)? "--":$user->cargo}}</td>
                    {{-- <td>{{$user->rol_name()}}</td> --}}
                    <td>
                      <form action="{{route('users.destroy', $user)}}" method="post">
                        @csrf
                        @method('delete')
                        {{-- <a class="btn btn-primary btn-sm" href="{{route('users.show',$user)}}">Ver</a> --}}

                          <a href="{{route('users.edit',$user)}}" class="btn btn-info btn-sm">Editar</a>

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
