<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Órdenes con Ingredientes Extra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('order_extra_ingredients.title') }}
            </h2>
        </x-slot>

        <div class="container mt-5">
            <div class="card-style p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('order_extra_ingredients.create') }}" class="btn btn-danger btn-sm ms-auto">
                        <i class="bi bi-plus-lg me-1"></i>{{ __('order_extra_ingredients.add_button') }}
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('order_extra_ingredients.headers.order') }}</th>
                                <th>{{ __('order_extra_ingredients.headers.client') }}</th>
                                <th>{{ __('order_extra_ingredients.headers.extra_ingredient') }}</th>
                                <th>{{ __('order_extra_ingredients.headers.quantity') }}</th>
                                <th class="text-center">{{ __('order_extra_ingredients.headers.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order_extra_ingredients as $order)
                                <tr>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->client_name }}</td>
                                    <td>{{ $order->extra_ingredient_name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('order_extra_ingredients.edit', $order->id) }}"
                                                class="btn btn-outline-dark btn-icon btn-sm" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('order_extra_ingredients.destroy', $order->id) }}"
                                                method="POST" onsubmit="return confirm(__('order_extra_ingredients.confirm_delete'));">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-icon btn-sm" title="Eliminar">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">{{ __('order_extra_ingredients.empty') }}</td>
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
