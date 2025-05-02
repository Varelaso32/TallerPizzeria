<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('order_extra_ingredients.add_button') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #ffffff; color: #000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">{{ __('order_extra_ingredients.add_button') }}</h1>

            <form method="POST" action="{{ route('order_extra_ingredients.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="order_id" class="form-label">{{ __('order_extra_ingredients.headers.order') }}</label>
                    <select class="form-select" id="order_id" name="order_id" required>
                        <option selected disabled value="">{{ __('order_extra_ingredients.inputs.order') }}</option>
                        @foreach ($orders as $order)
                            <option value="{{ $order->id }}">{{ $order->id }} - {{ $order->client_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="extra_ingredient_id" class="form-label">{{ __('order_extra_ingredients.headers.extra_ingredient') }}</label>
                    <select class="form-select" id="extra_ingredient_id" name="extra_ingredient_id" required>
                        <option selected disabled value="">{{ __('order_extra_ingredients.inputs.extra_ingredient') }}</option>
                        @foreach ($extra_ingredients as $extraIngredient)
                            <option value="{{ $extraIngredient->id }}">{{ $extraIngredient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">{{ __('order_extra_ingredients.headers.quantity') }}</label>
                    <input type="number" min="1" class="form-control" id="quantity" name="quantity" required placeholder="{{ __('order_extra_ingredients.inputs.quantity') }}">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">{{ __('order_extra_ingredients.forms.save') }}</button>
                    <a href="{{ route('order_extra_ingredients.index') }}" class="btn btn-secondary">{{ __('order_extra_ingredients.forms.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
