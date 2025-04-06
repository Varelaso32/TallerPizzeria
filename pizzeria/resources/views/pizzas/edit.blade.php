@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="h4 mb-0">Editar Pizza: {{ $pizza->name }}</h1>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('pizzas.update', $pizza->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre de la Pizza</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $pizza->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tamaños y Precios</label>
                            <div id="sizes-container">
                                @foreach($pizza->sizes as $index => $size)
                                <div class="size-entry mb-3 row g-2">
                                    <input type="hidden" name="sizes[{{ $index }}][id]" value="{{ $size->id }}">
                                    <div class="col-md-6">
                                        <select class="form-select @error("sizes.$index.size") is-invalid @enderror" 
                                                name="sizes[{{ $index }}][size]" required>
                                            <option value="pequeña" {{ old("sizes.$index.size", $size->size) == 'pequeña' ? 'selected' : '' }}>Pequeña</option>
                                            <option value="mediana" {{ old("sizes.$index.size", $size->size) == 'mediana' ? 'selected' : '' }}>Mediana</option>
                                            <option value="grande" {{ old("sizes.$index.size", $size->size) == 'grande' ? 'selected' : '' }}>Grande</option>
                                        </select>
                                        @error("sizes.$index.size")
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control @error("sizes.$index.price") is-invalid @enderror" 
                                               name="sizes[{{ $index }}][price]" step="0.01" min="0" 
                                               value="{{ old("sizes.$index.price", $size->price) }}" required>
                                        @error("sizes.$index.price")
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="add-size">
                                <i class="bi bi-plus-circle"></i> Agregar otro tamaño
                            </button>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ingredientes</label>
                            <div class="row">
                                @foreach($ingredients as $ingredient)
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        @php
                                            $pivot = $pizza->ingredients->find($ingredient->id)?->pivot;
                                            $isChecked = $pivot || old("ingredients.$ingredient->id.active");
                                        @endphp
                                        <input class="form-check-input" type="checkbox" 
                                               name="ingredients[{{ $ingredient->id }}][active]" 
                                               id="ingredient-{{ $ingredient->id }}" 
                                               value="1" {{ $isChecked ? 'checked' : '' }}>
                                        <label class="form-check-label" for="ingredient-{{ $ingredient->id }}">
                                            {{ $ingredient->name }}
                                        </label>
                                        <input type="number" class="form-control form-control-sm mt-1" 
                                               name="ingredients[{{ $ingredient->id }}][quantity]" 
                                               placeholder="Cantidad (g)" min="0" 
                                               value="{{ old("ingredients.$ingredient->id.quantity", $pivot?->quantity ?? 0) }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('pizzas.index') }}" class="btn btn-secondary me-md-2">
                                <i class="bi bi-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Actualizar Pizza
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
@endsection