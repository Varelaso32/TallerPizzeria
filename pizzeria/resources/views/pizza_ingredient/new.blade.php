<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Ingrediente a Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-primary mb-4">Agregar Ingrediente a Pizza</h1>

            <form method="POST" action="{{ route('pizza_ingredient.store') }}">
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
                    <label for="ingredient_id" class="form-label">Ingrediente</label>
                    <select class="form-select" id="ingredient_id" name="ingredient_id" required>
                        <option selected disabled value="">Seleccione un ingrediente...</option>
                        @foreach ($ingredients as $ingredient)
                            <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('pizza_ingredient.index') }}" class="btn btn-warning">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
