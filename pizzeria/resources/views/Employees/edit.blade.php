<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editar Empleado</title>
</head>

<body>
    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Editar Empleado</h1>
        </div>

        <form method="POST" action="{{ route('employees.update', ['employee' => $employee->id]) }}">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" disabled value="{{ $employee->id }}">
                <div class="form-text">ID del empleado.</div>
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
                <input type="text" class="form-control" id="identification_number" name="identification_number" required value="{{ $employee->identification_number }}">
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label">Salario</label>
                <input type="number" class="form-control" id="salary" name="salary" required value="{{ $employee->salary }}">
            </div>

            <div class="mb-3">
                <label for="hire_date" class="form-label">Fecha de Contratación</label>
                <input type="date" class="form-control" id="hire_date" name="hire_date" required value="{{ $employee->hire_date }}">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('employees.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
