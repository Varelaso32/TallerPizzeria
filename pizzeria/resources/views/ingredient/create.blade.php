<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="{{ asset('css/stylePizza.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Listado Ingredient</title>
</head>
<body>
<nav class="navbar bg-dark">
        <div class="container-fluid justify-content-start">
                <a href="{{ route('pizzas.index') }}" class="btn btn-success me-2">Pizzas</a>
                <a href="{{ route('pizza-size.create') }}" class="btn btn-primary me-2">New Size</a>
                <a href="{{ route('ingredient.index') }}" class="btn btn-warning text-white me-2">Ingredientes</a>
        </div>
    </nav>


    <div class="container bg-white bg-opacity-50 p-4 rounded shadow">
    <h1>Agregar Ingrediente a Pizza</h1>

    <form action="{{ route('ingredient.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="pizza_id" class="form-label fw-bold fs-5">Pizza</label>
            <select name="pizza_id" class="form-control">
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="ingredient_name" class="form-label fw-bold fs-5">Nombre del Ingrediente</label>
            <input type="text" name="ingredient_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label fw-bold fs-5">Cantidad</label>
            <input type="number" step="0.01" name="quantity" class="form-control" required>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('ingredient.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>