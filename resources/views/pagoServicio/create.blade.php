@extends('plantilla.app')

@section('title', 'Crear Pago de Servicio')

@section('content_header')
    <h1>Crear Pago de Servicio</h1>
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
            <form method="POST" action="{{ route('pagoServicio.store') }}">
                @csrf

                <div class="form-group col-md-6 my-3">
                    <label for="tipo"><b>Código del Cliente</b></label>
                    <input name="codigo_cliente" type="number" class="form-control" value="{{ old('codigo_cliente') }}"
                        id="codigo_cliente">
                    @error('codigo_cliente')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="monto"><b>Monto del Pago</b></label>
                    <input name="monto" type="text" class="form-control" value="{{ old('monto') }}"
                        id="monto">
                    @error('monto')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="fecha"><b>Fecha del Pago</b></label>
                   <input name="fecha" type="date" step="0.01" max="0.99" class="form-control" value="{{ old('fecha') }}"
                        id="fecha">
                    @error('fecha')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group row my-3">
                    <label for="usuario_id"><b>Seleccione el Empleado</b></label>
                    <div class="col-md-6">
                        <select name="usuario_id" class="form-control" id="usuario_id" >
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"> {{$user->nombre}}</option>
                                @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-group row my-3">
                    <label for="servicio_id"><b>Seleccione el Servicio</b></label>
                    <div class="col-md-6">
                        <select name="servicio_id" class="form-control" id="servicio_id" >
                                @foreach ($servicios as $servicio)
                                    <option value="{{ $servicio->id }}"> {{$servicio->nombre}}</option>
                                @endforeach
                        </select>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary mt-2">Registrar el Pago</button>
                <a href="{{ route('tasaInteres.index') }}"class="btn btn-warning mt-2">Volver</a>
            </form>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')

@stop
