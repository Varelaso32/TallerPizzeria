<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Listado de Empleados') }}
            </h2>
        </x-slot>

        <div class="container mt-5">
            <div class="card-style p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('employees.create') }}" class="btn btn-danger btn-sm ms-auto">
                        <i class="bi bi-plus-lg me-1"></i>Agregar nuevo empleado
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Puesto</th>
                                <th>Número de Identificación</th>
                                <th>Salario</th>
                                <th>Fecha de Contratación</th>
                                <th class="text-center">Acciones</th>
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
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}"
                                                class="btn btn-outline-dark btn-icon" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}"
                                                method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este empleado?');">
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
                                    <td colspan="7" class="text-center text-muted">No hay empleados registrados.</td>
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