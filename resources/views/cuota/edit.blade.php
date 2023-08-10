@extends('plantilla.app')

@section('title', 'Editar Cuota')

@section('content_header')
    <h1>Editar Cuota</h1>
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
            <form method="post" action="{{ route('cuota.update', $cuotum) }}">
                @csrf
                @method('PATCH')

                <div class="form-group col-md-6 my-3">
                    <label for="capital"><b>Monto de la cuota</b></label>
                    <input name="capital" type="number" step="0.50" max="999999.50" class="form-control" value="{{ old('capital', $cuotum->capital) }}" required
                        id="capital">
                    @error('capital')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="fecha"><b>Fecha del cuota</b></label>
                    <input name="fecha" type="date" class="form-control" value="{{ old('fecha', $cuotum->fecha) }}" required
                        id="fecha">
                    @error('fecha')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="cargo_adicional"><b>Cargo Adicional del crédito</b></label>
                    <input name="cargo_adicional" type="number" step="0.50" max="99999.50" class="form-control" value="{{ old('cargo_adicional', $cuotum->cargo_adicional) }}" required
                        id="cargo_adicional">
                    @error('cargo_adicional')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="name"><b>Seleccione un Crédito</b></label>
                    <select name="credito_id" class="form-control col-md-6" id="credito_id">
                        @foreach ($creditos as $credito)
                            @if ($cuotum->credito_id == $credito->id)
                                <option selected value="{{$credito->id}}">{{$credito->motivo}} de {{$credito->cliente->nombre}}</option>
                            @else
                                <option value="{{$credito->id}}">{{$credito->motivo}} de {{$credito->cliente->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Actualizar Cuota</button>
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
