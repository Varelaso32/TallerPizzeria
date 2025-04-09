<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Materia Prima</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #ffffff; color: #000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">Editar Materia Prima</h1>

            <form method="POST" action="{{ route('raw_materials.update', ['raw_material' => $raw_material->id]) }}">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" disabled value="{{ $raw_material->id }}">
                    <div class="form-text text-dark">ID de la materia prima</div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required
                        placeholder="Ingrese el nombre" value="{{ $raw_material->name }}">
                </div>

                <div class="mb-3">
                    <label for="unit" class="form-label">Unidad</label>
                    <input type="text" class="form-control" id="unit" name="unit" required
                        placeholder="Ingrese la unidad" value="{{ $raw_material->unit }}">
                </div>

                <div class="mb-3">
                    <label for="current_stock" class="form-label">Stock Actual</label>
                    <input type="number" step="0.01" class="form-control" id="current_stock" name="current_stock" required
                        placeholder="Ingrese el stock actual" value="{{ $raw_material->current_stock }}">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">Actualizar</button>
                    <a href="{{ route('raw_materials.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>