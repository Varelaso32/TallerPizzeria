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
                <a href="{{ route('pizzas.create') }}" class="btn btn-success me-2">Pizzas</a>
                <a href="{{ route('pizza-size.create') }}" class="btn btn-primary me-2">Crear</a>
                <a href="{{ route('ingredient.index') }}" class="btn btn-warning text-white me-2">Ingredientes</a>
        </div>
    </nav><h1>Detalles del Tamaño de Pizza</h1>

        <p><strong>ID:</strong> {{ $pizzaSize->id }}</p>
        <p><strong>Pizza:</strong> {{ $pizzaSize->pizza->name }}</p>
        <p><strong>Tamaño:</strong> {{ $pizzaSize->size }}</p>
        <p><strong>Precio:</strong> ${{ $pizzaSize->price }}</p>
        <p><strong>Creado:</strong> {{ $pizzaSize->created_at }}</p>
        <p><strong>Actualizado:</strong> {{ $pizzaSize->updated_at }}</p>

        <div class="btn-group" role="group">
    <a href="{{ route('pizza-size.edit', $pizzaSize->id) }}" class="btn btn-warning btn-sm">Editar</a>
    <a href="{{ route('pizza-size.index') }}" class="btn btn-info btn-sm">Volver</a>
</div>

    
</body>
</html>