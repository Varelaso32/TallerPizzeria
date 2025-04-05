@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Pizza: {{ $pizza->name }}</h1>
    
    <form action="{{ route('pizzas.update', $pizza->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la Pizza</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $pizza->name }}" required>
        </div>
        
        <h4>Tamaños</h4>
        <div id="sizes-container">
            @foreach($pizza->sizes as $index => $size)
            <div class="size-group mb-3 border p-3">
                <input type="hidden" name="sizes[{{ $index }}][id]" value="{{ $size->id }}">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Tamaño</label>
                        <select class="form-select" name="sizes[{{ $index }}][size]" required>
                            <option value="pequeña" {{ $size->size == 'pequeña' ? 'selected' : '' }}>Pequeña</option>
                            <option value="mediana" {{ $size->size == 'mediana' ? 'selected' : '' }}>Mediana</option>
                            <option value="grande" {{ $size->size == 'grande' ? 'selected' : '' }}>Grande</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" name="sizes[{{ $index }}][price]" 
                               value="{{ $size->price }}" required>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-danger mt-4 remove-size">Eliminar</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <button type="button" id="add-size" class="btn btn-secondary mb-3">+ Agregar Tamaño</button>
        <button type="submit" class="btn btn-primary">Actualizar Pizza</button>
    </form>
</div>

<!-- El mismo script de create.blade.php -->
@endsection