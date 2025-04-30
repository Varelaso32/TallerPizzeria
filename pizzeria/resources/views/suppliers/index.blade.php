<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('suppliers.supplier_list') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('suppliers.supplier_list') }}
            </h2>
        </x-slot>

        <div class="container mt-5">
            <div class="card-style p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('suppliers.create') }}" class="btn btn-danger btn-sm ms-auto">
                        <i class="bi bi-plus-lg me-1"></i>{{ __('suppliers.add_supplier') }}
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('suppliers.id') }}</th>
                                <th>{{ __('suppliers.name') }}</th>
                                <th>{{ __('suppliers.contact') }}</th>
                                <th>{{ __('suppliers.created_at') }}</th>
                                <th>{{ __('suppliers.updated_at') }}</th>
                                <th class="text-center">{{ __('suppliers.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->id }}</td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->contact_info ?? __('suppliers.no_contact') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($supplier->created_at)->format('d/m/Y H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($supplier->updated_at)->format('d/m/Y H:i') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('suppliers.edit', ['supplier' => $supplier->id]) }}"
                                                class="btn btn-outline-dark btn-icon" title="{{ __('suppliers.edit') }}">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('suppliers.destroy', ['supplier' => $supplier->id]) }}"
                                                method="POST"
                                                data-confirm="{{ __('supplier.confirm_delete') }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-icon" title="{{ __('supplier.delete') }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">{{ __('suppliers.no_suppliers') }}</td>
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
