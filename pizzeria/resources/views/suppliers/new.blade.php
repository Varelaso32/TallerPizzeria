<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('suppliers.add_supplier') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #ffffff; color: #000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">{{ __('suppliers.add_supplier') }}</h1>

            <form method="POST" action="{{ route('suppliers.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('suppliers.supplier_name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" required
                        placeholder="{{ __('suppliers.enter_supplier_name') }}">
                </div>

                <div class="mb-3">
                    <label for="contact_info" class="form-label">{{ __('suppliers.contact_info') }}</label>
                    <input type="text" class="form-control" id="contact_info" name="contact_info"
                        placeholder="{{ __('suppliers.enter_contact_info') }}">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">{{ __('suppliers.save') }}</button>
                    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">{{ __('suppliers.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
