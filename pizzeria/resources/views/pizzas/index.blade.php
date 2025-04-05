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
</head>
<body>

    <!-- Navegación superior -->
    <nav class="navbar bg-dark">
        <div class="container-fluid justify-content-start">
            <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href='/crear'">Ir a Crear</button>
            <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href='/editar'">Ir a Editar</button>
            <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href='/listar'">Ir a Lista</button>
        </div>
    </nav>

    <!-- Navbar de acciones -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <a class="navbar-brand" href="#">Selecciona</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <button class="btn btn-success me-2" type="button">Crear</button>
                <button class="btn btn-primary me-2" type="button">Editar</button>
                <button class="btn btn-warning text-white me-2" type="button">Actualizar</button>
                <button class="btn btn-danger" type="button">Eliminar</button>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container py-5">
        <h1 class="text-center mb-4">Cecep Pizza</h1>

        <div class="row">
            <!-- Pizza 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card pizza-card mb-4">
                    <div class="card-header pizza-header">
                        <h3 class="pizza-title">Pizza Fundida con Pepperoni</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Tenemos muchas razones para que pidas ya muchas <strong>Pizza fundida de pepperoni</strong>: exceso de ingredientes,...</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-secondary">Familiar - 10 Porciones</span>
                            <span class="pizza-price">$51.400</span>
                        </div>                       
                    </div>
                </div>
            </div>

            <!-- Pizza 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card pizza-card mb-4">
                    <div class="card-header pizza-header">
                        <h3 class="pizza-title">Pizza de Pepperoni y Piña</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">¡Bienvenidas las ganas de <strong>Pizza de Pepperoni y Piña</strong>! Estás a un paso de tener la mejor combinación de la ciudad.</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-secondary">Mediana - 8 Porciones</span>
                            <span class="pizza-price">$28.400</span>
                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>

        <!-- Lista de Pizzas -->
        <div class="list-section mt-5">
            <h1 class="text-center mb-4">Lista de Pizzas</h1>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tamaños y Precios</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pizzas as $pizza)
                    <tr>
                        <td>{{ $pizza->id }}</td>
                        <td>{{ $pizza->name }}</td>
                        <td>
                            @foreach($pizza->sizes as $size)
                                <span class="badge bg-info">{{ $size->size }}: ${{ $size->price }}</span>
                            @endforeach
                        </td>
                        <td class="text-center">
                            <a href="{{ route('pizzas.edit', $pizza->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
