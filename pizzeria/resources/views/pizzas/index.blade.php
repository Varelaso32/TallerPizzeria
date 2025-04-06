<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cecep Pizza</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/stylePizza.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>

    <!-- Navegación superior -->
    <nav class="navbar bg-dark">
        <div class="container-fluid justify-content-start">
                <a href="{{ route('pizzas.create') }}" class="btn btn-success me-2">Crear</a>
                <a href="{{ route('pizza-size.index') }}" class="btn btn-primary me-2">Tamaños</a>
                <a href="{{ route('ingredient.index') }}" class="btn btn-warning text-white me-2">Ingredientes</a>
        </div>
    </nav>

    <!-- Navbar de acciones -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <a class="navbar-brand" href="#">Opciones</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->



        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            @foreach($pizzas as $pizza)
            <!-- Tarjeta de Pizza -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card pizza-card h-100">
                    <div class="card-header pizza-header bg-primary text-white">
                        <h3 class="pizza-title">{{ $pizza->name }}</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Descripción de la pizza {{ $pizza->name }} con los mejores ingredientes.</p>
                        <div class="mt-auto">
                            @foreach($pizza->sizes as $size)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-secondary">{{ ucfirst($size->size) }}</span>
                                <span class="pizza-price">${{ number_format($size->price, 2) }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pizzas.edit', $pizza->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta pizza?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Lista de Pizzas -->
        <div class="list-section mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-center mb-10">....</h2>
                <a href="{{ route('pizzas.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Nueva Pizza
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tamaños y Precios</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pizzas as $pizza)
                        <tr>
                            <td>{{ $pizza->id }}</td>
                            <td>{{ $pizza->name }}</td>
                            <td>
                                @foreach($pizza->sizes as $size)
                                    <span class="badge bg-info me-1">{{ ucfirst($size->size) }}: ${{ number_format($size->price, 2) }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('pizzas.edit', $pizza->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta pizza?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('pizzas.show', $pizza->id) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>