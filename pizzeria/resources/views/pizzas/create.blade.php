@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Pizza</h1>
    
    <form action="{{ route('pizzas.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la Pizza</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <h4>Tamaños</h4>
        <div id="sizes-container">
            <div class="size-group mb-3 border p-3">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Tamaño</label>
                        <select class="form-select" name="sizes[0][size]" required>
                            <option value="pequeña">Pequeña</option>
                            <option value="mediana">Mediana</option>
                            <option value="grande">Grande</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" name="sizes[0][price]" required>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-danger mt-4 remove-size">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <button type="button" id="add-size" class="btn btn-secondary mb-3">+ Agregar Tamaño</button>
        <button type="submit" class="btn btn-primary">Guardar Pizza</button>
    </form>
</div>

<script>
    document.getElementById('add-size').addEventListener('click', function() {
        const container = document.getElementById('sizes-container');
        const index = container.children.length;
        
        const newSize = document.createElement('div');
        newSize.className = 'size-group mb-3 border p-3';
        newSize.innerHTML = `
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Tamaño</label>
                    <select class="form-select" name="sizes[${index}][size]" required>
                        <option value="pequeña">Pequeña</option>
                        <option value="mediana">Mediana</option>
                        <option value="grande">Grande</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" class="form-control" name="sizes[${index}][price]" required>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-danger mt-4 remove-size">Eliminar</button>
                </div>
            </div>
        `;
        
        container.appendChild(newSize);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-size')) {
            e.target.closest('.size-group').remove();
        }
    });
</script>
@endsection