<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('raw_materials.raw_material_list') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('raw_materials.raw_material_list') }}
            </h2>
        </x-slot>

        <div class="container mt-5">
            <div class="card-style p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('raw_materials.create') }}" class="btn btn-danger btn-sm ms-auto">
                        <i class="bi bi-plus-lg me-1"></i>{{ __('raw_materials.add_raw_material') }}
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('raw_materials.id') }}</th>
                                <th>{{ __('raw_materials.name') }}</th>
                                <th>{{ __('raw_materials.unit') }}</th>
                                <th>{{ __('raw_materials.current_stock') }}</th>
                                <th>{{ __('raw_materials.created_at') }}</th>
                                <th>{{ __('raw_materials.updated_at') }}</th>
                                <th class="text-center">{{ __('raw_materials.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($raw_materials as $material)
                                <tr>
                                    <td>{{ $material->id }}</td>
                                    <td>{{ $material->name }}</td>
                                    <td>{{ ucfirst($material->unit) }}</td>
                                    <td>{{ $material->current_stock }}</td>
                                    <td>{{ \Carbon\Carbon::parse($material->created_at)->format('d/m/Y H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($material->updated_at)->format('d/m/Y H:i') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('raw_materials.edit', ['raw_material' => $material->id]) }}"
                                               class="btn btn-outline-dark btn-icon"
                                               title="{{ __('raw_materials.edit') }}">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('raw_materials.destroy', ['raw_material' => $material->id]) }}"
                                                  method="POST"
                                                  data-confirm="{{ __('raw_materials.confirm_delete') }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon"
                                                        title="{{ __('raw_materials.delete') }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">
                                        {{ __('raw_materials.no_raw_materials') }}
                                    </td>
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
