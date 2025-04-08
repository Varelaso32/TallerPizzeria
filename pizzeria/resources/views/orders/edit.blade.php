<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Orden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Editar Orden</h1>
        </div>

        <form method="POST" action="{{ route('orders.update', ['order' => $order->id]) }}">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="client_id" class="form-label">Cliente</label>
                <select class="form-select" id="client_id" name="client_id" required>
                    <option selected disabled value="">Seleccione un cliente...</option>
                    @foreach ( $clients as $client )
                    <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="branch_id" class="form-label">Sucursal</label>
                <select class="form-select" id="branch_id" name="branch_id" required>
                    <option selected disabled value="">Seleccione una sucursal...</option>
                    @foreach ( $branches as $branch )
                    <option value="{{ $branch->id }}" {{ $order->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="total_price" class="form-label">Precio total</label>
                <input type="number" min="0" class="form-control" id="total_price" name="total_price" required placeholder="Ingrese el tipo de pizza" value="{{ $order->total_price }}">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Estado</label>
                <select class="form-select" id="status" name="status" required>
                    <option selected disabled value="">Seleccione un estado...</option>
                    <option value="pendiente" {{ $order->status == 'pendiente' ? 'selected': ''}}>Pendiente</option>
                    <option value="en_preparacion" {{ $order->status == 'en_preparacion' ? 'selected': ''}}>En preparación</option>
                    <option value="listo" {{ $order->status == 'listo' ? 'selected': ''}}>Listo</option>
                    <option value="entregado" {{ $order->status == 'entregado' ? 'selected': ''}}>Entregado</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="delivery_type" class="form-label">Tipo de delivery</label>
                <select class="form-select" id="delivery_type" name="delivery_type" required>
                    <option selected disabled value="">Seleccione un tipo...</option>
                    <option value="en_local" {{ $order->delivery_type == 'en_local' ? 'selected': '' }}>Se recoge en el local</option>
                    <option value="a_domicilio" {{ $order->delivery_type == 'a_domicilio' ? 'selected': '' }}>Domicilio</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="delivery_person_id" class="form-label">Domiciliario</label>
                <select class="form-select" id="delivery_person_id" name="delivery_person_id">
                    <option selected disabled value="">Seleccione un domiciliario...</option>
                    @foreach ( $delivery_persons as $delivery_person )
                    <option value="{{ $delivery_person->id }}" {{ $order->delivery_person_id == $delivery_person->id? 'selected': '' }}>{{ $delivery_person->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('orders.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
