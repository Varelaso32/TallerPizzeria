<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Órdenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('orders.listTitle') }}
            </h2>
        </x-slot>

        <div class="container mt-5">
            <div class="card-style p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('orders.create') }}" class="btn btn-danger btn-sm ms-auto">
                        <i class="bi bi-plus-lg me-1"></i>{{ __('orders.addOrder') }}
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('orders.headers.client') }}</th>
                                <th>{{ __('orders.headers.branch') }}</th>
                                <th>{{ __('orders.headers.total') }}</th>
                                <th>{{ __('orders.headers.status') }}</th>
                                <th>{{ __('orders.headers.typeDelivery') }}</th>
                                <th>{{ __('orders.headers.deliveryMan') }}</th>
                                <th>{{ __('orders.headers.createdAt') }}</th>
                                <th>{{ __('orders.headers.updatedAt') }}</th>
                                <th class="text-center">{{ __('orders.headers.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->client_name }}</td>
                                    <td>{{ $order->branch_name }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>{{ $order->delivery_type }}</td>
                                    <td>{{ $order->employee_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->updated_at)->format('d/m/Y H:i') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('orders.edit', ['order' => $order->id]) }}"
                                                class="btn btn-outline-dark btn-icon" title="{{ __('orders.actions.edit') }}">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('orders.destroy', ['order' => $order->id]) }}"
                                                method="POST"
                                                onsubmit="return confirm(__('orders.actions.confirmMessage');">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-icon" title="{{ __('orders.actions.delete') }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center text-muted">{{ __('orders.headers.empty') }}</td>
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
