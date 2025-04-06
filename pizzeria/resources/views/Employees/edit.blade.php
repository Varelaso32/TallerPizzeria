<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #ffffff; color: #000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">Editar Empleado</h1>

            <form method="POST" action="{{ route('employees.update', ['employee' => $employee->id]) }}">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" disabled value="{{ $employee->id }}">
                    <div class="form-text text-dark">ID del empleado</div>
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label">Usuario</label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        <option selected disabled value="">Seleccione un usuario...</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $employee->user_id ? 'selected' : '' }}>
                                {{ $user->name }} - {{ $user->email }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label">Puesto</label>
                    <select class="form-select" id="position" name="position" required>
                        <option selected disabled value="">Seleccione un puesto...</option>
                        <option value="cajero" {{ $employee->position == 'cajero' ? 'selected' : '' }}>Cajero</option>
                        <option value="administrador" {{ $employee->position == 'administrador' ? 'selected' : '' }}>Administrador</option>
                        <option value="cocinero" {{ $employee->position == 'cocinero' ? 'selected' : '' }}>Cocinero</option>
                        <option value="mensajero" {{ $employee->position == 'mensajero' ? 'selected' : '' }}>Mensajero</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="identification_number" class="form-label">Número de Identificación</label>
                    <input type="text" class="form-control" id="identification_number" name="identification_number"
                        value="{{ $employee->identification_number }}" required>
                </div>

                <div class="mb-3">
                    <label for="salary" class="form-label">Salario</label>
                    <input type="number" class="form-control" id="salary" name="salary"
                        value="{{ $employee->salary }}" required>
                </div>

                <div class="mb-3">
                    <label for="hire_date" class="form-label">Fecha de Contratación</label>
                    <input type="date" class="form-control" id="hire_date" name="hire_date"
                        value="{{ $employee->hire_date }}" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">Actualizar</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>