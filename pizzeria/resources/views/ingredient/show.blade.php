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
        <h1>Detalle del Ingrediente</h1>
        <div class="card">
            <div class="card-body">
                <h5>ID: {{ $ingredient->id }}</h5>
                <h5>Nombre: {{ $ingredient->name }}</h5>
            </div>
        </div>
        <a href="{{ route('ingredient.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>


</body>
</html>