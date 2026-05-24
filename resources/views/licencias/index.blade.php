<!DOCTYPE html>
<html>
<head>

    <title>Sistema Licencias</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f4f6f9;">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>
            Sistema de Licencias
        </h1>

        <a href="{{ route('dashboard') }}"
           class="btn btn-dark">

            Dashboard

        </a>

    </div>

    <div class="card shadow p-4">

        <form method="GET"
              action="{{ route('licencias.index') }}"
              class="mb-4">

            <div class="row">

                <div class="col-md-10">

                    <input type="text"
                           name="buscar"
                           class="form-control"
                           placeholder="Buscar conductor">

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary w-100">

                        Buscar

                    </button>

                </div>

            </div>

        </form>

        <a href="{{ route('licencias.create') }}"
           class="btn btn-success mb-3">

            Nueva Licencia

        </a>

        <table class="table table-hover">

            <thead class="table-dark">

                <tr>

                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

                @foreach($licencias as $licencia)

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

                        {{ $licencia->tipo_licencia }}

                    </td>

                    <td>

                        {{ $licencia->telefono }}

                    </td>

                    <td>

                        <a href="{{ route('licencias.show', $licencia->id) }}"
                           class="btn btn-info btn-sm">

                            Ver

                        </a>

                        <a href="{{ route('licencias.edit', $licencia->id) }}"
                           class="btn btn-warning btn-sm">

                            Editar

                        </a>

                        <form action="{{ route('licencias.destroy', $licencia->id) }}"
                              method="POST"
                              style="display:inline-block;">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">

                                Eliminar

                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>