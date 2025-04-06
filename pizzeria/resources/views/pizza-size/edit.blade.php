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
    </nav>

    

    <div class="container bg-white bg-opacity-50 p-4 rounded shadow">
        <h1>Editar Tamaño de Pizza</h1>
    <form action="{{ route('pizza-size.update', $pizzaSize->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="pizza_id">Pizza:</label>
        <select name="pizza_id" id="pizza_id" required>
            @foreach($pizzas as $pizza)
                <option value="{{ $pizza->id }}" {{ $pizzaSize->pizza_id == $pizza->id ? 'selected' : '' }}>
                    {{ $pizza->name }}
                </option>
            @endforeach
        </select><br><br>

        <label for="size">Tamaño:</label>
        <select name="size" id="size" required>
            <option value="pequeña" {{ $pizzaSize->size == 'pequeña' ? 'selected' : '' }}>Pequeña</option>
            <option value="mediana" {{ $pizzaSize->size == 'mediana' ? 'selected' : '' }}>Mediana</option>
            <option value="grande" {{ $pizzaSize->size == 'grande' ? 'selected' : '' }}>Grande</option>
        </select><br><br>

        <label for="price">Precio:</label>
        <input type="number" name="price" id="price" step="0.01" value="{{ $pizzaSize->price }}" required><br><br>

        <button type="submit">Actualizar</button>
        <button href="{{route('pizza-size.index')}}">Return</button>
    </form>
    </div>

    
</body>
</html>