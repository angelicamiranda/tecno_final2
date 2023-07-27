@extends('plantilla.app')

@section('title', 'Crear Usuario')

@section('content_header')
    <a class="btn btn-secundary" href="{{route('cuentaAhorro.index')}}">Volver</a>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('cuentaAhorro.store') }}">
                            @csrf

                            <div class="form-group row my-3">
                                <label for="numero_cuenta" class="col-md-4 col-form-label text-md-right">{{ __('Número de Cuenta') }}</label>

                                <div class="col-md-6">
                                    <input id="numero_cuenta" type="text" class="form-control @error('numero_cuenta') is-invalid @enderror" name="numero_cuenta" value="{{ old('numero_cuenta') }}" required autocomplete="Numero de Cuenta" autofocus>

                                    @error('numero_cuenta')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-3">
                                <label for="fecha_apertura" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Apertura') }}</label>

                                <div class="col-md-6">
                                    <input id="fecha_apertura" type="date" class="form-control @error('fecha_apertura') is-invalid @enderror" name="fecha_apertura" value="{{ old('fecha_apertura') }}" required autocomplete="fecha_apertura" autofocus>

                                    @error('fecha_apertura')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-3">
                                <label for="tipo_moneda" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Moneda') }}</label>
                                <div class="col-md-6">
                                        <select name="tipo_moneda" class="form-control" id="tipo_moneda" >
                                                    <option value="Bolivianos">Bolivianos</option>
                                                    <option value="Dólares">Dólares</option>
                                        </select>

                                    @error('tipo_moneda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-3">
                                <label for="interes" class="col-md-4 col-form-label text-md-right">{{ __('Interés') }}</label>

                                <div class="col-md-6">
                                    <input id="interes" type="text" class="form-control @error('interes') is-invalid @enderror" name="interes" value="{{ old('interes') }}" required autocomplete="email">

                                    @error('interes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row my-3">
                                <label for="cliente_id" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione el Cliente') }}</label>

                                <div class="col-md-6">
                                    <select name="cliente_id" class="form-control" id="cliente_id" >
                                            @foreach ($clientes as $cliente)
                                                <option value="{{ $cliente->id }}">{{ $cliente->nombre}}</option>
                                            @endforeach
                                    </select>
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
