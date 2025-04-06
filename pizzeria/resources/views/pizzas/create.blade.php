


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
                <a href="{{ route('pizza-size.index') }}" class="btn btn-primary me-1">cancelar</a>
                <a href="{{ route('ingredient.index') }}" class="btn btn-warning text-white me-2">Ingredientes</a>
        </div>
    </nav>

    <h1>Nueva Piza</h1>


    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2>Crear Nueva Pizza</h2>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('pizzas.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre de la Pizza</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tamaños y Precios</label>
                            <div id="sizes-container">
                                <div class="size-entry mb-3 row g-2">
                                    <div class="col-md-6">
                                        <select class="form-select @error('sizes.0.size') is-invalid @enderror" 
                                                name="sizes[0][size]" required>
                                            <option value="">Seleccione tamaño</option>
                                            <option value="pequeña" {{ old('sizes.0.size') == 'pequeña' ? 'selected' : '' }}>Pequeña</option>
                                            <option value="mediana" {{ old('sizes.0.size') == 'mediana' ? 'selected' : '' }}>Mediana</option>
                                            <option value="grande" {{ old('sizes.0.size') == 'grande' ? 'selected' : '' }}>Grande</option>
                                        </select>
                                        @error('sizes.0.size')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control @error('sizes.0.price') is-invalid @enderror" 
                                               name="sizes[0][price]" placeholder="Precio" step="0.01" min="0" 
                                               value="{{ old('sizes.0.price') }}" required>
                                        @error('sizes.0.price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="add-size">
                                <i class="bi bi-plus-circle"></i> Agregar otro tamaño
                            </button>
                        </div>

                        @if($ingredients->count() > 0)
                        <div class="mb-3">
                            <label class="form-label">Ingredientes</label>
                            <div class="row">
                                @foreach($ingredients as $ingredient)
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                               name="ingredients[{{ $ingredient->id }}][active]" 
                                               id="ingredient-{{ $ingredient->id }}" 
                                               value="1" {{ old("ingredients.$ingredient->id.active") ? 'checked' : '' }}>
                                        <label class="form-check-label" for="ingredient-{{ $ingredient->id }}">
                                            {{ $ingredient->name }}
                                        </label>
                                        <input type="number" class="form-control form-control-sm mt-1" 
                                               name="ingredients[{{ $ingredient->id }}][quantity]" 
                                               placeholder="Cantidad (g)" min="0" 
                                               value="{{ old("ingredients.$ingredient->id.quantity", 0) }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="alert alert-warning">
                            No hay ingredientes disponibles. <a href="{{ route('ingredient.create') }}">Crear nuevo ingrediente</a>
                        </div>
                        @endif

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('pizzas.index') }}" class="btn btn-secondary me-md-2">
                                <i class="bi bi-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Guardar Pizza
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-size').addEventListener('click', function() {
        const container = document.getElementById('sizes-container');
        const index = container.children.length;
        const sizeEntry = document.createElement('div');
        sizeEntry.className = 'size-entry mb-3 row g-2';
        sizeEntry.innerHTML = `
            <div class="col-md-6">
                <select class="form-select" name="sizes[${index}][size]" required>
                    <option value="">Seleccione tamaño</option>
                    <option value="pequeña">Pequeña</option>
                    <option value="mediana">Mediana</option>
                    <option value="grande">Grande</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control" name="sizes[${index}][price]" 
                       placeholder="Precio" step="0.01" min="0" required>
            </div>
        `;
        container.appendChild(sizeEntry);
    });
</script>

<style>
    .size-entry {
        background-color: #f8f9fa;
        padding: 10px;
        border-radius: 5px;
    }
</style>

    
</body>
</html>