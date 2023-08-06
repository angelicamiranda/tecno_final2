@extends('plantilla.app')

@section('title', 'Crear Cuota')

@section('content_header')
    @if ($mensaje <> '')
        <h5 style="color: red;"> {{$mensaje}}</h5>
    @endif
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
            <form method="POST" action="{{ route('cuota.store') }}">
                @csrf

                <div class="form-group col-md-6 my-3">
                    <label for="monto"><b>Monto de la cuota</b></label>
                    <input name="monto" type="number" step="0.01" max="999999.99" class="form-control" required"
                        id="monto">
                    @error('monto')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="fecha"><b>Fecha de la cuota</b></label>
                    <input name="fecha" type="date" class="form-control" required"
                        id="fecha">
                    @error('fecha')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="cargo_adicional"><b>Cargo Adicional de la cuota</b></label>
                    <input name="cargo_adicional" type="number" step="0.50" max="99999.50" class="form-control" required"
                        id="cargo_adicional">
                    @error('cargo_adicional')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="name"><b>Seleccione un crédito</b></label>
                    <select name="credito_id" class="form-control col-md-6" id="credito_id">
                        @foreach ($creditos as $credito)
                            @if ($credito->estado == "Aceptado")
                                <option value="{{$credito->id}}">{{$credito->motivo}} de {{$credito->cliente->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Registrar Cuota</button>
                <a href="{{ route('cuota.index') }}"class="btn btn-warning mt-2">Volver</a>
            </form>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')

@stop
