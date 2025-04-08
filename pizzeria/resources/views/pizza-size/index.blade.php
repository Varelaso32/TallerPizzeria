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
                <a href="{{ route('pizzas.index') }}" class="btn btn-success me-2">Ir a Pizzas</a>
                <a href="{{ route('pizza-size.create') }}" class="btn btn-primary me-2">New Size</a>
                <a href="{{ route('ingredient.index') }}" class="btn btn-warning text-white me-2">Ingredientes</a>
        </div>
    </nav>

    <table class="table table-bordered bg-white" style="box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pizza</th>
                <th>Tamaño</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sizes as $size)
                <tr>
                    <td>{{ $size->id }}</td>
                    <td>{{ $size->pizza->name }}</td>
                    <td>{{ $size->size }}</td>
                    <td>${{ $size->price }}</td>
                    <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('pizza-size.show', $size->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Ver
                                </a>
                                <a href="{{ route('pizza-size.edit', $size->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    </div>
                        <form action="{{ route('pizza-size.destroy', $size->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="container mt-4">
        <a href="{{ route('pizzas.index') }}" class="btn btn-primary">Volver menu Principal</a>




    
</body>
</html>