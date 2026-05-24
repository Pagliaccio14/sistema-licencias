<!DOCTYPE html>
<html>
<head>
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>Editar Licencia</h1>

<form action="{{ route('licencias.update', $licencia->id) }}"
      method="POST"
      enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <input type="text" name="nombre" value="{{ $licencia->nombre }}" class="form-control mb-2">

        <input type="text" name="apellido_paterno" value="{{ $licencia->apellido_paterno }}" class="form-control mb-2">

        <input type="text" name="apellido_materno" value="{{ $licencia->apellido_materno }}" class="form-control mb-2">

        <input type="number" name="edad" value="{{ $licencia->edad }}" class="form-control mb-2">

        <input type="text" name="telefono" value="{{ $licencia->telefono }}" class="form-control mb-2">

        <input type="text" name="direccion" value="{{ $licencia->direccion }}" class="form-control mb-2">

        <input type="text" name="tipo_licencia" value="{{ $licencia->tipo_licencia }}" class="form-control mb-2">

        <input type="date" name="fecha_expedicion" value="{{ $licencia->fecha_expedicion }}" class="form-control mb-2">

        <input type="date" name="fecha_vencimiento" value="{{ $licencia->fecha_vencimiento }}" class="form-control mb-2">

        <button class="btn btn-primary">
            Actualizar
        </button>

    </form>

</div>

</body>
</html>