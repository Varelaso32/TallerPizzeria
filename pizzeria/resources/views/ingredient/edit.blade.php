<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="{{ asset('css/stylePizza.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Lista de tamaños</title>
</head>
<body>
    <!-- Bootstrap CSS -->
    
    <!-- Bootstrap Icons -->
  
    <nav class="navbar bg-dark">
        <div class="container-fluid justify-content-start">
                <a href="{{ route('pizzas.index') }}" class="btn btn-success me-2">Pizzas</a>
                <a href="{{ route('pizza-size.create') }}" class="btn btn-primary me-2">New Size</a>
                <a href="{{ route('ingredient.index') }}" class="btn btn-warning text-white me-2">Ingredientes</a>
        </div>
    </nav>


    <div class="container">
    <h1>Editar Ingrediente de Pizza</h1>

    <form action="{{ route('ingredient.update', $ingredient) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="pizza_id" class="form-label">Pizza</label>
            <select name="pizza_id" class="form-control">
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}" {{ $pizza->id == $ingredient->pizza_id ? 'selected' : '' }}>
                        {{ $pizza->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="ingredient_id" class="form-label">Ingrediente</label>
            <select name="ingredient_id" class="form-control">
                @foreach($ingredientTypes as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $ingredient->ingredient_id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" step="0.01" name="quantity" class="form-control" value="{{ $ingredient->quantity }}" required>
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('ingredient.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

    
</body>
</html>