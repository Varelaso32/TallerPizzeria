<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido de Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #ffffff; color: #000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">Editar Pedido de Pizza</h1>

            <form method="POST" action="{{ route('order_pizza.update', ['order_pizza' => $orderPizza->id]) }}">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" disabled value="{{ $orderPizza->id }}">
                    <div class="form-text text-dark">ID del pedido de pizza</div>
                </div>

                <div class="mb-3">
                    <label for="order_id" class="form-label">Pedido</label>
                    <select class="form-select" id="order_id" name="order_id" required>
                        <option selected disabled value="">Seleccione un pedido...</option>
                        @foreach ($orders as $order)
                            <option value="{{ $order->id }}" {{ $order->id == $orderPizza->order_id ? 'selected' : '' }}>
                                Pedido #{{ $order->id }} - {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="pizza_size_id" class="form-label">Tamaño de Pizza</label>
                    <select class="form-select" id="pizza_size_id" name="pizza_size_id" required>
                        <option selected disabled value="">Seleccione un tamaño...</option>
                        @foreach ($pizzaSizes as $size)
                            <option value="{{ $size->id }}" {{ $size->id == $orderPizza->pizza_size_id ? 'selected' : '' }}>
                                {{ $size->name }} - ${{ number_format($size->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1"
                        value="{{ $orderPizza->quantity }}" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">Actualizar</button>
                    <a href="{{ route('order_pizza.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>