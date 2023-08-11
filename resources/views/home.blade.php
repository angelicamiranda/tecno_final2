@extends('plantilla.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h1 class="d-flex justify-content-center"><b>Bienvenido {{ auth()->user()->nombre }}</b></h1>

        <div id="divcategorias" class="card">
            <div class="card-title my-2 mx-2 justify-content-center">
                <h4> <b>
                    Gráficos de Transacciones y Pagos de Servicios Básicos
                </b> </h4>

            </div>





            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div id="servicios" style="width: 500px; height: auto;">

                    </div>
                    <div id="productos" style="width: 500px; height: 400px; border: 2px solid #blue;">

                    </div>
                </div>
                <br>
                <h5><b>Total de Transacciones: {{$total}}</b></h5>
                <h5><b>Total de Pagos de Servicios: {{$totalSer}}</b></h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div id="es" style="width: 500px; height: auto;">

                    </div>
                </div>
                <br>

            </div>
        </div>
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
                <h5><b>Visitas totales: {{$totaless}}</b></h5>
            </div>
        </div>



    </div>
@endsection

@section('css')

@stop

@section('js')
      <script>
        cargarTransacción()
         cargarServicios()

         cargarVisualizaciones()

        function cargarTransacción() {
            let valores = []
            let nombres = []
            let categorias = @json($transacciones);
            const total = {{ $totaless }};
            console.log(total)
            console.log(categorias)

            for (const categoria of categorias) {
                valores.push(categoria.cantidad)
                nombres.push(categoria.tipo_transaccion)
            }
            var options = {
                chart: {
                    type: "pie"
                },
                series: valores,
                labels: nombres,
            };
            var chart1 = new ApexCharts(document.querySelector("#servicios"), options);

            chart1.render();
        }

        function cargarServicios() {
            let data = [];
            let productos = @json($servicios);
            for (const producto of productos) {
                const prod = {
                    name: producto.nombre,
                    data: [producto.cantidad]
                }
                data.push(prod);
            }

            var options = {
                chart: {
                    type: "bar"
                },
                plotOptions: {
                    bar: {
                        distributed: true
                    }
                },
                series: data,
                xaxis: {
                    categories: ["Pago de Servicio"]
                }
            };

            console.log(options)

            var chart_participacion_productos = new ApexCharts(document.querySelector("#productos"), options);
            chart_participacion_productos.render();
        }

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

    </script>
@stop
