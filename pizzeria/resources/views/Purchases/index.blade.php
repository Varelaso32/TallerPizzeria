<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Listado de Compras</title>
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Lista de Compras</h1>
            <a href="{{ route('purchases.create') }}" class="btn btn-success">Registrar nueva compra</a>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio de Compra</th>
                        <th scope="col">Fecha de Compra</th>
                        <th scope="col">Creado</th>
                        <th scope="col">Actualizado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                    <tr>
                        <th scope="row">{{ $purchase->id }}</th>
                        <td>{{ $purchase->quantity }}</td>
                        <td>${{ number_format($purchase->purchase_price, 2) }}</td>
                        <td>{{ $purchase->purchase_date }}</td>
                        <td>{{ $purchase->created_at }}</td>
                        <td>{{ $purchase->updated_at }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('purchases.edit', ['purchase' => $purchase->id]) }}" class="btn btn-info btn-sm">Editar</a>

                                <form action="{{ route('purchases.destroy', ['purchase' => $purchase->id]) }}" method="POST" style="display: inline;">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
