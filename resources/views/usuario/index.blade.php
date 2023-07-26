@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de Usuarios') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table>
                        <thead>
                             <tr>
                                 <th>Nombre</th>
                                 <th>Correo</th>
                                 <th>Rol</th>
                              </tr>
                        </thead>
                        <tbody>
                             @foreach ($usuarios as $usuario)
                             <tr>
                                 <td>{{$usuario->nombre}}</td>
                                 <td>{{$usuario->correo}}</td>
                                 <td>{{$usuario->rol->nombre}}</td>
                             </tr>
                             @endforeach
                        </tbody>

                     </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
