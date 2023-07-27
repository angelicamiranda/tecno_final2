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
            <form method="post" action="{{ route('credito.update', $credito) }}">
                @csrf
                @method('PATCH')

                <div class="form-group col-md-6 my-3">
                    <label for="monto"><b>Monto del crédito</b></label>
                    <input name="monto" type="number" step="0.50" max="999999.50" class="form-control" value="{{ old('monto', $credito->monto) }}" required
                        id="monto">
                    @error('monto')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="motivo"><b>Motivo del crédito</b></label>
                    <input name="motivo" type="text" class="form-control" value="{{ old('motivo', $credito->motivo) }}" required"
                        id="motivo">
                    @error('motivo')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="plazo"><b>Plazo del crédito en meses</b></label>
                    <input name="plazo" type="number" step="1" max="50" class="form-control" value="{{ old('plazo', $credito->plazo) }}" required"
                        id="plazo">
                    @error('plazo')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="dia_desembolso"><b>Desembolso del crédito</b></label>
                    <input name="dia_desembolso" type="date" class="form-control" value="{{ old('dia_desembolso', $credito->dia_desembolso) }}" required"
                        id="dia_desembolso">
                    @error('dia_desembolso')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="periodo_gracia"><b>Periodo de Gracia del crédito</b></label>
                    <input name="periodo_gracia" type="text" class="form-control" value="{{ old('periodo_gracia', $credito->periodo_gracia) }}" required"
                        id="periodo_gracia">
                    @error('periodo_gracia')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="cargo_adicional"><b>Cargo Adicional del crédito</b></label>
                    <input name="cargo_adicional" type="number" step="0.50" max="99999.50" class="form-control" value="{{ old('cargo_adicional', $credito->cargo_adicional) }}" required"
                        id="cargo_adicional">
                    @error('cargo_adicional')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="name"><b>Seleccione una Tasa de Interés</b></label>
                    <select name="tasa_interes_id" class="form-control col-md-6" id="tasa_interes_id">
                        @foreach ($tasas as $tasa)
                        @if ($credito->tasa_interes_id == $tasa->id)
                        <option selected value="{{$tasa->id}}">{{$tasa->descripcion}} - {{$tasa->porcentaje}}</option>
                        @else
                            <option value="{{$tasa->id}}">{{$tasa->descripcion}} - {{$tasa->porcentaje}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="name"><b>Seleccione un Cliente</b></label>
                    <select name="cliente_id" class="form-control col-md-6" id="cliente_id">
                        @foreach ($clientes as $cliente)
                        @if ($credito->cliente_id == $cliente->id)
                            <option selected value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @else
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Actualizar Crédito</button>
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
