<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tamaño de Pizza</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:#ffffff; color:#000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">Agregar Tamaño de Pizza</h1>

            {{-- …encabezado y Bootstrap omitidos por brevedad … --}}

            <form method="POST" action="{{ route('pizza_size.store') }}">
                @csrf

                {{-- Pizza --}}
                <div class="mb-3">
                    <label for="pizza_id" class="form-label">Pizza</label>
                    <select class="form-select" id="pizza_id" name="pizza_id" required>
                        <option selected disabled value="">Seleccione una pizza…</option>
                        @foreach ($pizzas as $pizza)
                        <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Tamaño: solo pequeña, mediana, grande --}}
                <div class="mb-3">
                    <label for="size" class="form-label">Tamaño</label>
                    <select class="form-select" id="size" name="size" required>
                        <option selected disabled value="">Seleccione un tamaño…</option>
                        <option value="pequeña">Pequeña</option>
                        <option value="mediana">Mediana</option>
                        <option value="grande">Grande</option>
                    </select>
                </div>

                {{-- Precio --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Precio (COP)</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">Guardar</button>
                    <a href="{{ route('pizza_size.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>

        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>