<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
        }

        .sidebar a:hover{
            background:#0d6efd;
        }

    </style>

</head>

<body>

<div class="container-fluid">

    <div class="row">

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

        <div class="col-md-10 p-4">

            <h1 class="mb-4">
                Dashboard
            </h1>

            <div class="row">

                <div class="col-md-4">

                    <div class="card bg-primary text-white shadow p-4 card-dashboard">

                        <h4>Total Licencias</h4>

                        <h1>{{ $total }}</h1>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card bg-success text-white shadow p-4 card-dashboard">

                        <h4>Licencias Vigentes</h4>

                        <h1>{{ $vigentes }}</h1>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card bg-danger text-white shadow p-4 card-dashboard">

                        <h4>Licencias Vencidas</h4>

                        <h1>{{ $vencidas }}</h1>

                    </div>

                </div>

            </div>

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
                                     height="70"
                                     style="border-radius:50%; object-fit:cover;">

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

</body>
</html>