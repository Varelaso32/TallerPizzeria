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

                <div class="mb-
