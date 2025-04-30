<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('purchases.add_purchase') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #ffffff; color: #000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">{{ __('purchases.add_purchase') }}</h1>

            <form method="POST" action="{{ route('purchases.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="supplier_id" class="form-label">{{ __('purchases.supplier') }}</label>
                    <select class="form-select" id="supplier_id" name="supplier_id" required>
                        <option selected disabled value="">{{ __('purchases.select_supplier') }}</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="raw_material_id" class="form-label">{{ __('purchases.raw_material') }}</label>
                    <select class="form-select" id="raw_material_id" name="raw_material_id" required>
                        <option selected disabled value="">{{ __('purchases.select_raw_material') }}</option>
                        @foreach ($raw_materials as $material)
                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">{{ __('purchases.quantity') }}</label>
                    <input type="number" step="1" class="form-control" id="quantity" name="quantity"
                        placeholder="{{ __('purchases.enter_quantity') }}" required>
                </div>

                <div class="mb-3">
                    <label for="purchase_price" class="form-label">{{ __('purchases.purchase_price') }}</label>
                    <input type="number" step="0.01" class="form-control" id="purchase_price" name="purchase_price"
                        placeholder="{{ __('purchases.enter_purchase_price') }}" required>
                </div>

                <div class="mb-3">
                    <label for="purchase_date" class="form-label">{{ __('purchases.purchase_date') }}</label>
                    <input type="date" class="form-control" id="purchase_date" name="purchase_date" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">{{ __('purchases.save') }}</button>
                    <a href="{{ route('purchases.index') }}" class="btn btn-secondary">{{ __('purchases.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
