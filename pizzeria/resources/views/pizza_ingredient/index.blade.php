<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes por Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Ingredientes por Pizza</h1>
            <a href="{{ route('pizza_ingredient.create') }}" class="btn btn-success">Agregar ingrediente a pizza</a>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Pizza</th>
                        <th scope="col">Ingrediente</th>
                        <th scope="col">Creado</th>
                        <th scope="col">Actualizado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pizzaIngredients as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->pizza_name }}</td>
                        <td>{{ $item->ingredient_name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('pizza_ingredient.edit', ['pizza_ingredient' => $item->id]) }}"
                                    class="btn btn-info btn-sm">Editar</a>

                                <form action="{{ route('pizza_ingredient.destroy', ['pizza_ingredient' => $item->id]) }}" method="POST"
                                    style="display: inline;">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
