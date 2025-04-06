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
    <h1>Ingredientes en Pizzas</h1>

    <a href="{{ route('ingredient.create') }}" class="btn btn-primary mb-3">Agregar Ingrediente a Pizza</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pizza</th>
                <th>Ingrediente</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ingredients as $item)
            <tr>
                <td>{{ $item->pizza->name }}</td>
                <td>{{ $item->ingredientType->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    <a href="{{ route('ingredient.edit', $item) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('ingredient.destroy', $item) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este ingrediente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
</body>
</html>