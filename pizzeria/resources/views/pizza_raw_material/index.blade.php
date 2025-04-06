<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes por Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Ingredientes por Pizza</h1>
            <a href="{{ route('pizza_raw_material.create') }}" class="btn btn-success">Agregar ingrediente</a>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Pizza</th>
                        <th scope="col">Materia Prima</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pizzaIngredients as $ingredient)
                    <tr>
                        <th scope="row">{{ $ingredient->id }}</th>
                        <td>{{ $ingredient->pizza_name ?? 'Desconocido' }}</td>
                        <td>{{ $ingredient->raw_material_name ?? 'Desconocido' }}</td>
                        <td>{{ $ingredient->quantity }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('pizza_raw_material.edit', ['pizza_raw_material' => $ingredient->id]) }}" class="btn btn-info btn-sm">Editar</a>

                                <form action="{{ route('pizza_raw_material.destroy', ['pizza_raw_material' => $ingredient->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
