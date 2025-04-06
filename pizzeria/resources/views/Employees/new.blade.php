<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #ffffff; color: #000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">Agregar Empleado</h1>

            <form method="POST" action="{{ route('employees.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="user_id" class="form-label">Usuario</label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        <option selected disabled value="">Seleccione un usuario...</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label">Puesto</label>
                    <select class="form-select" id="position" name="position" required>
                        <option selected disabled value="">Seleccione un puesto...</option>
                        <option value="cajero">Cajero</option>
                        <option value="administrador">Administrador</option>
                        <option value="cocinero">Cocinero</option>
                        <option value="mensajero">Mensajero</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="identification_number" class="form-label">Número de Identificación</label>
                    <input type="text" class="form-control" id="identification_number" name="identification_number"
                        required placeholder="Ingrese número de identificación">
                </div>

                <div class="mb-3">
                    <label for="salary" class="form-label">Salario</label>
                    <input type="number" step="0.01" class="form-control" id="salary" name="salary" required
                        placeholder="Ingrese salario">
                </div>

                <div class="mb-3">
                    <label for="hire_date" class="form-label">Fecha de Contratación</label>
                    <input type="date" class="form-control" id="hire_date" name="hire_date" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">Guardar</button>
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