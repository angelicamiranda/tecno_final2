@extends('plantilla.app')

@section('title', 'Ver Recomendaciones')

@section('content_header')
    <h1>DETALLE DE LA RECOMENDACIONES</h1>
@stop

@section('content')
<h1>Recomendaciones Personalizadas</h1>
    
    <ul>
        @foreach ($recommendations as $recommendation)
            <li>{{ $recommendation['itemId'] }} - {{ $recommendation['score'] }}</li>
        @endforeach
    </ul>

    
@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')

@stop
