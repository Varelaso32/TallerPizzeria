<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de órdenes con ingredientes extra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Lista de Órdenes con Ingredientes Extra</h1>
            <a href="{{ route('order_extra_ingredients.create') }}" class="btn btn-success">Agregar nueva orden con
                ingredientes extra</a>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Orden</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Ingrediente</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_extra_ingredients as $order)
                        <tr>
                            <th scope="row">{{ $order->order_id }}</th>
                            <td>{{ $order->client_name }}</td>
                            <td>{{ $order->extra_ingredient_name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('order_extra_ingredients.edit', ['order_extra_ingredient' => $order->id]) }}"
                                        class="btn btn-info btn-sm">Editar</a>
                                    <form
                                        action="{{ route('order_extra_ingredients.destroy', ['order_extra_ingredient' => $order->id]) }}"
                                        method="POST" style="display: inline;">
                                        @method('delete')
                                        @csrf
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
