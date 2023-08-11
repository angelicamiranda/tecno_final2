@extends('plantilla.app')

@section('title', 'Crear Transaccion')

@section('content_header')
    <a class="btn btn-secundary" href="{{route('transaccion.index')}}">Volver</a>
    @if ($mensaje <> '')
        <h5 style="color: red;"> {{$mensaje}}</h5>
    @endif
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('transaccion.store') }}">
                            @csrf

                            <div class="form-group row my-3">
                                <label for="cuenta_ahorro_id" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione la Cuenta') }}</label>

                                <div class="col-md-6">
                                    <select name="cuenta_ahorro_id" class="form-control" id="cuenta_ahorro_id" >
                                            @foreach ($cuentas as $cuenta)
                                                <option value="{{ $cuenta->id }}"> {{$cuenta->nro_cuenta}} - {{$cuenta->cliente->nombre}} - {{$cuenta->tipo_moneda}}</option>
                                            @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row my-3">
                                <label for="Monto" class="col-md-4 col-form-label text-md-right">{{ __('Monto') }}</label>

                                <div class="col-md-6">
                                    <input id="monto" type="number" class="form-control @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto') }}" required autocomplete="Numero de Cuenta" autofocus>

                                    @error('monto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-3">
                                <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                                <div class="col-md-6">
                                    <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}" required autocomplete="fecha_apertura" autofocus>

                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-3">
                                <label for="tipo_transaccion" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Tansacción') }}</label>
                                <div class="col-md-6">
                                        <select name="tipo_transaccion" class="form-control" id="tipo_transaccion" >
                                                    <option value="Deposito">Depósito</option>
                                                    <option value="Retiro">Retiro</option>
                                        </select>

                                    @error('tipo_transaccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>







                            <div class="form-group row mb-0 my-3">
                                <div class="col-md-6 offset-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')

@stop
