<!DOCTYPE html>
<html>
<head>
    <title>Nueva Licencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>Registrar Licencia</h1>
<form action="{{ route('licencias.store') }}"
      method="POST"
      enctype="multipart/form-data">
        @csrf

        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2">

        <input type="text" name="apellido_paterno" placeholder="Apellido Paterno" class="form-control mb-2">

        <input type="text" name="apellido_materno" placeholder="Apellido Materno" class="form-control mb-2">

        <input type="number" name="edad" placeholder="Edad" class="form-control mb-2">

        <input type="text" name="telefono" placeholder="Teléfono" class="form-control mb-2">

        <input type="text" name="direccion" placeholder="Dirección" class="form-control mb-2">
        <label>Tipo de Sangre</label>
        <select name="tipo_sangre" class="form-control mb-3">

        <option>A+</option>
        <option>A-</option>
        <option>B+</option>
        <option>B-</option>
        <option>AB+</option>
        <option>AB-</option>
        <option>O+</option>
        <option>O-</option>

        </select>
        <label>Fotografía</label>
        <input type="file"
         name="foto"
         class="form-control mb-3">

        <select name="tipo_licencia" class="form-control mb-2">
            <option value="A">Tipo A</option>
            <option value="B">Tipo B</option>
            <option value="C">Tipo C</option>
        </select>

        <label>Fecha Expedición</label>
        <input type="date" name="fecha_expedicion" class="form-control mb-2">

        <label>Fecha Vencimiento</label>
        <input type="date" name="fecha_vencimiento" class="form-control mb-2">

        <form action="{{ route('licencias.store') }}"
      method="POST"
      enctype="multipart/form-data">

        <button class="btn btn-success">
            Guardar
        </button>

    </form>

</div>

</body>
</html>