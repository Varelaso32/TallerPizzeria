<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('clients.client_list') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('clients.client_list') }}
            </h2>
        </x-slot>

        <div class="container mt-5">
            <div class="card-style p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('clients.create') }}" class="btn btn-danger btn-sm ms-auto">
                        <i class="bi bi-plus-lg me-1"></i>{{ __('clients.add_client') }}
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('clients.id') }}</th>
                                <th>{{ __('clients.user_name') }}</th>
                                <th>{{ __('clients.email') }}</th>
                                <th>{{ __('clients.role') }}</th>
                                <th>{{ __('clients.address') }}</th>
                                <th>{{ __('clients.phone') }}</th>
                                <th>{{ __('clients.created_at') }}</th>
                                <th>{{ __('clients.updated_at') }}</th>
                                <th class="text-center">{{ __('clients.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->user_name }}</td>
                                <td>{{ $client->user_email }}</td>
                                <td>{{ $client->user_role }}</td>
                                <td>{{ $client->address ?? __('clients.no_clients') }}</td>
                                <td>{{ $client->phone ?? __('clients.no_clients') }}</td>
                                <td>{{ \Carbon\Carbon::parse($client->created_at)->format('d/m/Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($client->updated_at)->format('d/m/Y H:i') }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('clients.edit', ['client' => $client->id]) }}"
                                            class="btn btn-outline-dark btn-icon" title="{{ __('clients.edit') }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('clients.destroy', ['client' => $client->id]) }}"
                                            method="POST"
                                            data-confirm="{{ __('clients.confirm_delete') }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-icon" title="{{ __('clients.delete') }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                                     
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">{{ __('clients.no_clients') }}</td>
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