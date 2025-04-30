<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('orders.editOrder') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #ffffff; color: #000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">{{ __('orders.editOrder') }}</h1>

            <form method="POST" action="{{ route('orders.update', ['order' => $order->id]) }}">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label for="client_id" class="form-label">{{ __('orders.forms.client.label') }}</label>
                    <select class="form-select" id="client_id" name="client_id" required>
                        <option selected disabled value="">{{ __('orders.forms.client.placeholder') }}</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="branch_id" class="form-label">{{ __('orders.forms.branch.label') }}</label>
                    <select class="form-select" id="branch_id" name="branch_id" required>
                        <option selected disabled value="">{{ __('orders.forms.branch.placeholder') }}</option>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $order->branch_id == $branch->id ? 'selected' : '' }}>
                                {{ $branch->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="total_price" class="form-label">{{ __('orders.forms.total.label') }}</label>
                    <input type="number" min="0" class="form-control" id="total_price" name="total_price" required
                        placeholder="{{ __('orders.forms.total.placeholder') }}" value="{{ $order->total_price }}">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">{{ __('orders.forms.status.label') }}</label>
                    <select class="form-select" id="status" name="status" required>
                        <option selected disabled value="">{{ __('orders.forms.status.placeholder') }}</option>
                        <option value="pendiente" {{ $order->status == 'pendiente' ? 'selected' : '' }}>{{ __('orders.forms.status.options.pendiente') }}</option>
                        <option value="en_preparacion" {{ $order->status == 'en_preparacion' ? 'selected' : '' }}>{{ __('orders.forms.status.options.en_preparacion') }}</option>
                        <option value="listo" {{ $order->status == 'listo' ? 'selected' : '' }}>{{ __('orders.forms.status.options.listo') }}</option>
                        <option value="entregado" {{ $order->status == 'entregado' ? 'selected' : '' }}>{{ __('orders.forms.status.options.entregado') }}</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="delivery_type" class="form-label">{{ __('orders.forms.typeOfDelivery.label') }}</label>
                    <select class="form-select" id="delivery_type" name="delivery_type" required>
                        <option selected disabled value="">{{ __('orders.forms.typeOfDelivery.placeholder') }}</option>
                        <option value="en_local" {{ $order->delivery_type == 'en_local' ? 'selected' : '' }}>{{ __('orders.forms.typeOfDelivery.options.en_local') }}</option>
                        <option value="a_domicilio" {{ $order->delivery_type == 'a_domicilio' ? 'selected' : '' }}>{{ __('orders.forms.typeOfDelivery.options.a_domicilio') }}</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="delivery_person_id" class="form-label">{{ __('orders.forms.deliveryMan.label') }}</label>
                    <select class="form-select" id="delivery_person_id" name="delivery_person_id">
                        <option selected disabled value="">{{ __('orders.forms.deliveryMan.placeholder') }}</option>
                        @foreach ($delivery_persons as $delivery_person)
                            <option value="{{ $delivery_person->id }}" {{ $order->delivery_person_id == $delivery_person->id ? 'selected' : '' }}>
                                {{ $delivery_person->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">Actualizar</button>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
