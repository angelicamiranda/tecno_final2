@extends('plantilla.app')

@section('title', 'Crear Tasa de Interés')

@section('content_header')
    <h1>Crear Tasa de Interés</h1>
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
            <form method="POST" action="{{ route('tasaInteres.store') }}">
                @csrf

                <div class="form-group col-md-6 my-3">
                    <label for="tipo"><b>Tipo de la Tasa de Interés</b></label>
                    <input name="tipo" type="text" class="form-control" value="{{ old('tipo') }}"
                        id="tipo">
                    @error('tipo')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="descripcion"><b>Descripción de la Tasa de Interés</b></label>
                    <input name="descripcion" type="text" class="form-control" value="{{ old('descripcion') }}"
                        id="descripcion">
                    @error('descripcion')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="porcentaje"><b>Porcentaje de la Tasa de Interés</b></label>
                    <input name="porcentaje" type="number" step="0.01" max="0.99" class="form-control" value="{{ old('porcentaje') }}"
                        id="porcentaje">
                    @error('porcentaje')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-2">Registrar Tasa de Interés</button>
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
