@extends('plantilla.app')

@section('title', 'Editar Pago de Servicio')

@section('content_header')
    <h1>Editar Pago de Servicio</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('pagoServicio.update', $pago) }}">
                @csrf
                @method('PATCH')

                <div class="form-group col-md-6 my-3">
                    <label for="codigo_cliente"><b>Código de cliente</b></label>
                    <input name="codigo_cliente" type="text" class="form-control" value="{{ old('codigo_cliente', $pago->codigo_cliente) }}"
                        id="codigo_cliente">
                    @error('codigo_cliente')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="monto"><b>Monto del pago</b></label>
                    <input name="monto" type="decimal" class="form-control" value="{{ old('monto', $pago->monto) }}"
                        id="monto">
                    @error('monto')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="fecha"><b>Fecha del pago</b></label>
                    <input name="fecha" type="date" class="form-control" value="{{ old('fecha', $pago->fecha) }}"
                        id="fecha">
                    @error('fecha')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="name"><b>Nuevo email</b></label>
                    <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                        id="email">
                    @error('email')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="check_password"><b>Nueva contraseña</b></label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                        id="passwordInput" placeholder="Escriba si modificara ">
                    @error('password')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="name"><b>Seleccione un Rol</b></label>
                    <select name="rol_id" class="form-control col-md-6" id="rol_id">
                        @foreach ($roles as $rol)
                        @if ($user->rol_id == $rol->id)
                            <option class="text-dark" selected value="{{$rol->id}}">{{$rol->nombre}}</option>
                        @else
                            <option class="text-dark" value="{{$rol->id}}">{{$rol->nombre}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Actualizar Usuario</button>
                <a href="{{ route('users.index') }}"class="btn btn-warning mt-2">Volver</a>
            </form>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')

@stop
