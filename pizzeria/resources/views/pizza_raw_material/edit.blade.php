<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Materia Prima de Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #ffffff; color: #000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">Editar Relación Pizza - Materia Prima</h1>

            <form method="POST" action="{{ route('pizza_raw_material.update', ['pizza_raw_material' => $ingredient->id]) }}">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" disabled value="{{ $ingredient->id }}">
                    <div class="form-text text-dark">ID de la relación</div>
                </div>

                <div class="mb-3">
                    <label for="pizza_id" class="form-label">Pizza</label>
                    <select class="form-select" id="pizza_id" name="pizza_id" required>
                        <option selected disabled value="">Seleccione una pizza...</option>
                        @foreach ($pizzas as $pizza)
                            <option value="{{ $pizza->id }}" {{ $pizza->id == $ingredient->pizza_id ? 'selected' : '' }}>
                                {{ $pizza->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="raw_material_id" class="form-label">Materia Prima</label>
                    <select class="form-select" id="raw_material_id" name="raw_material_id" required>
                        <option selected disabled value="">Seleccione una materia prima...</option>
                        @foreach ($rawMaterials as $material)
                            <option value="{{ $material->id }}" {{ $material->id == $ingredient->raw_material_id ? 'selected' : '' }}>
                                {{ $material->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Cantidad</label>
                    <input type="number" step="0.01" min="0" class="form-control" id="quantity" name="quantity"
                        value="{{ $ingredient->quantity }}" placeholder="Cantidad utilizada" required>
                    <div class="form-text text-gray">Ingrese la cantidad en unidades o gramos según corresponda.</div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">Actualizar</button>
                    <a href="{{ route('pizza_raw_material.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>