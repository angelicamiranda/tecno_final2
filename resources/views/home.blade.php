@extends('plantilla.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h1 class="d-flex justify-content-center"><b>Bienvenido {{ auth()->user()->name }}</b></h1>

        <div id="divcategorias" class="card">
            <div class="card-title my-2 mx-2">
                <h4>Visualizaciones de Rutas:</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div id="categorias" style="width: 500px; height: auto;">

                    </div>
                </div>
                <br>
                <h5><b>Visitas totales: {{$total}}</b></h5>
            </div>
        </div>

        <div id="divproductos" class="card">
            <div class="card-title my-2 mx-2">
                <h4><b>Retrasos del Personal:</b></h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div id="productos" style="width: 500px; height: 400px; border: 2px solid #blue;">

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('css')

@stop

@section('js')
      <script>
         cargarVisualizaciones()
         cargarServicios()

        function cargarVisualizaciones() {
            let valores = []
            let nombres = []
            let categorias = @json($paginass);
            const total = {{ $total }};
            console.log(total)
            console.log(categorias)

            for (const categoria of categorias) {
                valores.push(categoria.visitas)
                nombres.push(categoria.path)
            }
            var options = {
                chart: {
                    type: "pie"
                },
                series: valores,
                labels: nombres,
            };
            var chart1 = new ApexCharts(document.querySelector("#categorias"), options);

            chart1.render();
        }

        function cargarServicios() {
            let valores = []
            let nombres = []
            let categorias = @json($pagoServicios);
            const total = {{ $servicios }};
            console.log(total)
            console.log(categorias)

            for (const categoria of categorias) {
                valores.push(categoria.)
                nombres.push(categoria.path)
            }
            var options = {
                chart: {
                    type: "pie"
                },
                series: valores,
                labels: nombres,
            };
            var chart1 = new ApexCharts(document.querySelector("#categorias"), options);

            chart1.render();
        }

    </script>
@stop
