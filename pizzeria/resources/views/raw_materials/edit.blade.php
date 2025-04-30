<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('raw_materials.edit') }} {{ __('raw_materials.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #ffffff; color: #000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">{{ __('raw_materials.edit') }} {{ __('raw_materials.name') }}</h1>

            <form method="POST" action="{{ route('raw_materials.update', ['raw_material' => $raw_material->id]) }}">
                @method('PUT')
                @csrf

                <div class="mb-3">
                    <label for="id" class="form-label">{{ __('raw_materials.id') }}</label>
                    <input type="text" class="form-control" id="id" disabled value="{{ $raw_material->id }}">
                    <div class="form-text text-dark">{{ __('raw_materials.id') }} {{ __('raw_materials.name') }}</div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('raw_materials.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" required
                           placeholder="{{ __('raw_materials.name') }}" value="{{ $raw_material->name }}">
                </div>

                <div class="mb-3">
                    <label for="unit" class="form-label">{{ __('raw_materials.unit') }}</label>
                    <input type="text" class="form-control" id="unit" name="unit" required
                           placeholder="{{ __('raw_materials.unit') }}" value="{{ $raw_material->unit }}">
                </div>

                <div class="mb-3">
                    <label for="current_stock" class="form-label">{{ __('raw_materials.current_stock') }}</label>
                    <input type="number" step="0.01" class="form-control" id="current_stock" name="current_stock" required
                           placeholder="{{ __('raw_materials.current_stock') }}" value="{{ $raw_material->current_stock }}">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">{{ __('raw_materials.edit') }}</button>
                    <a href="{{ route('raw_materials.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
