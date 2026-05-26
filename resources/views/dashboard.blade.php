<!DOCTYPE html>
<html>

<head>

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style>

        body{
            background:#eef2f7;
        }

        .card-dashboard{
            border:none;
            border-radius:20px;
            transition:0.3s;
        }

        .card-dashboard:hover{
            transform:scale(1.03);
        }

        .sidebar{
            background:#212529;
            min-height:100vh;
            color:white;
            padding:20px;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:12px;
            border-radius:10px;
            margin-bottom:10px;
            transition:0.3s;
        }

        .sidebar a:hover{
            background:#0d6efd;
        }

        .table img{
            border-radius:50%;
            object-fit:cover;
        }

    </style>

</head>

<body>

<div class="container-fluid">

    <div class="row">

        <!-- SIDEBAR -->

        <div class="col-md-2 sidebar">

            <h3>Sistema</h3>

            <hr>

            <a href="/">Dashboard</a>

            <a href="/licencias">
                Ver Licencias
            </a>

            <a href="/licencias/create">
                Nueva Licencia
            </a>

        </div>

        <!-- CONTENIDO -->

        <div class="col-md-10 p-4">

            <h1 class="mb-4">
                Dashboard
            </h1>

            <!-- CARDS -->

            <div class="row">

                <div class="col-md-4 mb-3">

                    <div class="card bg-primary text-white shadow p-4 card-dashboard">

                        <h4>Total Licencias</h4>

                        <h1>{{ $total }}</h1>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="card bg-success text-white shadow p-4 card-dashboard">

                        <h4>Licencias Vigentes</h4>

                        <h1>{{ $vigentes }}</h1>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="card bg-danger text-white shadow p-4 card-dashboard">

                        <h4>Licencias Vencidas</h4>

                        <h1>{{ $vencidas }}</h1>

                    </div>

                </div>

            </div>

            <!-- GRAFICA -->

            <div class="card shadow mt-4 p-4">

                <h3 class="mb-4">
                    Estadísticas de Licencias
                </h3>

                <div id="graficaLicencias"></div>

            </div>

            <!-- TABLA -->

            <div class="card shadow mt-5 p-4">

                <h3>
                    Últimos registros
                </h3>

                <table class="table table-hover mt-4">

                    <thead class="table-dark">

                        <tr>

                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Tipo Sangre</th>
                            <th>Licencia</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($ultimos as $licencia)

                        <tr>

                            <td>

                                <img src="{{ asset('fotos/'.$licencia->foto) }}"
                                     width="70"
                                     height="70">

                            </td>

                            <td>

                                {{ $licencia->nombre }}
                                {{ $licencia->apellido_paterno }}

                            </td>

                            <td>

                                {{ $licencia->tipo_sangre }}

                            </td>

                            <td>

                                {{ $licencia->tipo_licencia }}

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- MODAL -->

<div class="modal fade" id="modalGrafica" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Información de Estadística
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body" id="contenidoModal">

            </div>

        </div>

    </div>

</div>

<!-- BOOTSTRAP -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- GRAFICA -->

<script>

    let categorias = [
        'Total',
        'Vigentes',
        'Vencidas'
    ];

    let valores = [
        {{ $total }},
        {{ $vigentes }},
        {{ $vencidas }}
    ];

    let options = {

        chart: {

            type: 'bar',
            height: 400,

            toolbar: {
                show: true
            },

            animations: {
                enabled: true
            },

            events: {

                dataPointSelection: function(event, chartContext, config) {

                    let categoria =
                        categorias[config.dataPointIndex];

                    let valor =
                        valores[config.dataPointIndex];

                    document.getElementById(
                        'contenidoModal'
                    ).innerHTML = `

                        <div class="text-center">

                            <h2>${categoria}</h2>

                            <hr>

                            <h1 class="display-1 text-primary">
                                ${valor}
                            </h1>

                            <p class="mt-4">
                                Estadísticas detalladas de
                                <strong>${categoria}</strong>
                            </p>

                        </div>

                    `;

                    let modal = new bootstrap.Modal(
                        document.getElementById('modalGrafica')
                    );

                    modal.show();

                }

            }

        },

        series: [{

            name: 'Licencias',

            data: valores

        }],

        xaxis: {

            categories: categorias

        },

        colors: [
            '#0d6efd',
            '#198754',
            '#dc3545'
        ],

        plotOptions: {

            bar: {

                borderRadius: 10,
                distributed: true

            }

        },

        dataLabels: {

            enabled: true

        }

    };

    let chart = new ApexCharts(
        document.querySelector("#graficaLicencias"),
        options
    );

    chart.render();

    // ACTUALIZAR CADA 5 SEGUNDOS

    setInterval(() => {

        location.reload();

    }, 5000);

</script>

</body>
</html>