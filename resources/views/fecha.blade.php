
@extends('plantilla.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h1 class="d-flex justify-content-center"><b>Bienvenido {{ auth()->user()->nombre }}</b></h1>


        <div id="graficos" class="card">
            <div class="card-title my-2 mx-2">
                <h4>Gráficos por Fecha:</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('store') }}">
                    @csrf
                <label for="fecha"> Ingrese la Fecha Inicial</label>

                <input type="date" name="fechaInicial" id="fechaInicial" >

                <label for="fecha"> Ingrese la Fecha Final</label>

                <input type="date" name="fechaFinal" id="fechaFinal" >

                <button type="submit" class="btn btn-primary mt-2">Mostrar Gráficos</button>

                </form>

            </div>
        </div>
    </div>
@endsection

@section('css')

@stop

@section('js')

@stop







