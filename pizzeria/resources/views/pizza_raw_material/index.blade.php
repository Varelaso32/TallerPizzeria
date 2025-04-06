<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes por Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pizza Raw Materials') }}
            </h2>
        </x-slot>
        <div class="container mt-5">
            <div class="card-style p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('pizza_raw_material.create') }}" class="btn btn-danger btn-sm ms-auto">
                        <i class="bi bi-plus-lg me-1"></i>Agregar Ingrediente
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pizza</th>
                                <th>Materia Prima</th>
                                <th>Cantidad</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pizzaIngredients as $ingredient)
                            <tr>
                                <td>{{ $ingredient->id }}</td>
                                <td>{{ $ingredient->pizza_name ?? 'Desconocido' }}</td>
                                <td>{{ $ingredient->raw_material_name ?? 'Desconocido' }}</td>
                                <td>{{ $ingredient->quantity }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('pizza_raw_material.edit', ['pizza_raw_material' => $ingredient->id]) }}"
                                            class="btn btn-outline-dark btn-icon" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('pizza_raw_material.destroy', ['pizza_raw_material' => $ingredient->id]) }}"
                                            method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este ingrediente?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-icon" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No hay ingredientes registrados.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>