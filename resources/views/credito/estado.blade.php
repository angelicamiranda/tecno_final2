@extends('plantilla.app')

@section('title', 'Editar Crédito')

@section('content_header')
    <h1>Editar Crédito</h1>
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
            <form method="post" action="{{ route('credito.estado', $credito) }}">
                @csrf
                @method('PATCH')





                <div class="form-group col-md-6 my-3">
                    <label for="estado"><b>Seleccione un Estado</b></label>
                    <select name="estado" class="form-control col-md-6" id="estado">

                            <option selected value="Aceptado">Aceptar</option>

                            <option value="Rechazado">Rechazar</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Actualizar Estado</button>
                <a href="{{ route('credito.index') }}"class="btn btn-warning mt-2">Volver</a>
            </form>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')

@stop
