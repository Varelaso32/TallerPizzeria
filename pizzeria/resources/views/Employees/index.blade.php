<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('employees.employee_list') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('employees.employee_list') }}
            </h2>
        </x-slot>

        <div class="container mt-5">
            <div class="card-style p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('employees.create') }}" class="btn btn-danger btn-sm ms-auto">
                        <i class="bi bi-plus-lg me-1"></i>{{ __('employees.add_employee') }}
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('employees.id') }}</th>
                                <th>{{ __('employees.user') }}</th>
                                <th>{{ __('employees.position') }}</th>
                                <th>{{ __('employees.identification_number') }}</th>
                                <th>{{ __('employees.salary') }}</th>
                                <th>{{ __('employees.hire_date') }}</th>
                                <th>{{ __('employees.created') }}</th>
                                <th>{{ __('employees.updated') }}</th>
                                <th class="text-center">{{ __('employees.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->user_name }}</td>
                                <td>{{ ucfirst($employee->position) }}</td>
                                <td>{{ $employee->identification_number }}</td>
                                <td>${{ number_format($employee->salary, 2) }}</td>
                                <td>{{ $employee->hire_date }}</td>
                                <td>{{ \Carbon\Carbon::parse($employee->created_at)->format('d/m/Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($employee->updated_at)->format('d/m/Y H:i') }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}"
                                            class="btn btn-outline-dark btn-icon" title="{{ __('employees.edit') }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}"
                                            method="POST" data-confirm="{{ __('employees.confirm_delete') }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-icon" title="{{ __('employees.delete') }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">{{ __('employees.no_employees') }}</td>
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
