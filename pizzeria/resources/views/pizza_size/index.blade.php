<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Tamaños de Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Listado de Tamaños de Pizza') }}
            </h2>
        </x-slot>

        <div class="container mt-5">
            <div class="card-style p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('pizza_size.create') }}" class="btn btn-danger btn-sm ms-auto">
                        <i class="bi bi-plus-lg me-1"></i>Agregar nuevo tamaño de pizza
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pizza</th>
                                <th>Tamaño</th>
                                <th>Precio</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pizzaSizes as $pizzaSize)
                            <tr>
                                <td>{{ $pizzaSize->id }}</td>
                                <td>{{ $pizzaSize->pizza_name }}</td>
                                <td>{{ ucfirst($pizzaSize->size) }}</td>
                                <td>${{ number_format($pizzaSize->price, 2) }}</td>
                                <td>{{ \Carbon\Carbon::parse($pizzaSize->created_at)->format('d/m/Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($pizzaSize->updated_at)->format('d/m/Y H:i') }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('pizza_size.edit', ['pizzaSize' => $pizzaSize->id]) }}"
                                            class="btn btn-outline-dark btn-icon" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('pizza_size.destroy', ['pizzaSize' => $pizzaSize->id]) }}"
                                            method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este tamaño de pizza?');">
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
                                <td colspan="7" class="text-center text-muted">No hay tamaños de pizza registrados.</td>
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