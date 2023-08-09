@extends('plantilla.app')

@section('title', 'Crear Tasa de Interés')

@section('content_header')
    <h1>Crear Cliente</h1>
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
            <form method="POST" action="{{ route('cliente.store') }}">
                @csrf

                <div class="form-group col-md-6 my-3">
                    <label for="nombre"><b>Nombre Completo</b></label>
                    <input name="nombre" type="text" class="form-control" value="{{ old('nombre') }}"
                        id="nombre">
                    @error('nombre')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="ci"><b>Carnet de Identidad</b></label>
                    <input name="ci" type="text" class="form-control" value="{{ old('ci') }}"
                        id="ci">
                    @error('ci')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="correo"><b>Correo Electrónico</b></label>
                    <input name="correo" type="email" class="form-control" value="{{ old('correo') }}"
                        id="correo">
                    @error('correo')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="lugar_nac"><b>Lugar de Nacimiento</b></label>
                    <input name="lugar_nac" type="text" class="form-control" value="{{ old('lugar_nac') }}"
                        id="lugar_nac">
                    @error('lugar_nac')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="fecha_nac"><b>Fecha de Nacimiento</b></label>
                    <input name="fecha_nac" type="date" class="form-control" value="{{ old('fecha_nac') }}"
                        id="fecha_nac">
                    @error('fecha_nac')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="estado_civil"><b>Estado Civil </b></label>
                    <select name="estado_civil" class="form-control col-md-6" id="estado_civil">

                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Divorciado">Divorciado</option>
                            <option value="Viudo">Viudo</option>

                    </select>
                    @error('estado_civil')
                    <small>{{ $message }}</small>
                    <br><br>
                @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="hijos"><b>Cantidad de Hijos</b></label>
                    <input name="hijos" type="number" class="form-control" value="{{ old('hijos') }}"
                        id="hijos">
                    @error('hijos')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="nacionalidad"><b>Nacionalidad</b></label>
                    <input name="nacionalidad" type="text" class="form-control" value="{{ old('nacionalidad') }}"
                        id="nacionalidad">
                    @error('nacionalidad')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="nivel_educacion"><b>Nivel de Educación</b></label>
                    <select name="nivel_educacion" class="form-control col-md-6" id="nivel_educacion">

                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Doctorado">Doctorado</option>

                    </select>
                    @error('nivel_educacion')
                    <small>{{ $message }}</small>
                    <br><br>
                @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="direccion_domicilio"><b>Dirección de su Domicilio</b></label>
                    <input name="direccion_domicilio" type="text" class="form-control" value="{{ old('direccion_domicilio') }}"
                        id="direccion_domicilio">
                    @error('direccion_domicilio')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>
                <div class="form-group col-md-6 my-3">
                    <label for="tipo_tenencia_dom"><b>Tipo de Tenencia de su Domicilio</b></label>
                    <select name="tipo_tenencia_dom" class="form-control col-md-6" id="tipo_tenencia_dom">

                            <option value="Propio">Propio</option>
                            <option value="Alquiler">Alquiler</option>
                            <option value="Cedido">Cedidio</option>


                    </select>
                    @error('tipo_tenencia_dom')
                    <small>{{ $message }}</small>
                    <br><br>
                @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="direccion_trabajo"><b>Dirección de su Trabajo</b></label>
                    <input name="direccion_trabajo" type="text" class="form-control" value="{{ old('direccion_trabajo') }}"
                        id="direccion_trabajo">
                    @error('direccion_trabajo')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="tipo_tenencia_trab"><b>Tipo de Tenencia de su Trabajo</b></label>
                    <select name="tipo_tenencia_trab" class="form-control col-md-6" id="tipo_tenencia_trab">

                            <option value="Privado">Privado</option>
                            <option value="Público">Público</option>

                    </select>
                    @error('tipo_tenencia_trab')
                    <small>{{ $message }}</small>
                    <br><br>
                @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="ingreso_prom_mensual"><b>Ingreso Promedio Mensual</b></label>
                    <input name="ingreso_prom_mensual" type="text" class="form-control" value="{{ old('ingreso_prom_mensual') }}"
                        id="ingreso_prom_mensual">
                    @error('ingreso_prom_mensual')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <input type="hidden" name="usuario_id" id="usuario_id" value={{Auth::user()->id}}>

                <button type="submit" class="btn btn-primary mt-2">Registrar Cliente</button>
                <a href="{{ route('cliente.index') }}"class="btn btn-warning mt-2">Volver</a>
            </form>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')

@stop
