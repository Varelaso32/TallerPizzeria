<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Materia Prima a Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">Agregar Materia Prima a Pizza</h1>

            <form method="POST" action="{{ route('pizza_raw_material.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="pizza_id" class="form-label">Pizza</label>
                    <select class="form-select" id="pizza_id" name="pizza_id" required>
                        <option selected disabled value="">Seleccione una pizza...</option>
                        @foreach ($pizzas as $pizza)
                        <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="raw_material_id" class="form-label">Materia Prima</label>
                    <select class="form-select" id="raw_material_id" name="raw_material_id" required>
                        <option selected disabled value="">Seleccione una materia prima...</option>
                        @foreach ($rawMaterials as $rawMaterial)
                        <option value="{{ $rawMaterial->id }}">{{ $rawMaterial->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Cantidad</label>
                    <input type="number"
                        class="form-control"
                        id="quantity"
                        name="quantity"
                        min="0.01"
                        step="0.01"
                        placeholder="Ingrese la cantidad utilizada"
                        required>
                    <div class="form-text">Ingrese la cantidad en unidades o gramos según corresponda.</div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">Guardar</button>
                    <a href="{{ route('pizza_raw_material.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
