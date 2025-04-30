<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('employees.add_employee') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #ffffff; color: #000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">{{ __('employees.add_employee') }}</h1>

            <form method="POST" action="{{ route('employees.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="user_id" class="form-label">{{ __('employees.user') }}</label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        <option selected disabled value="">{{ __('employees.select_user') }}</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label">{{ __('employees.position') }}</label>
                    <select class="form-select" id="position" name="position" required>
                        <option selected disabled value="">{{ __('employees.select_position') }}</option>
                        <option value="cajero">{{ __('employees.cashier') }}</option>
                        <option value="administrador">{{ __('employees.admin') }}</option>
                        <option value="cocinero">{{ __('employees.cook') }}</option>
                        <option value="mensajero">{{ __('employees.delivery') }}</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="identification_number" class="form-label">{{ __('employees.identification_number') }}</label>
                    <input type="text" class="form-control" id="identification_number" name="identification_number"
                        required placeholder="{{ __('employees.enter_identification_number') }}">
                </div>

                <div class="mb-3">
                    <label for="salary" class="form-label">{{ __('employees.salary') }}</label>
                    <input type="number" class="form-control" id="salary" name="salary" required
                        placeholder="{{ __('employees.enter_salary') }}">
                </div>

                <div class="mb-3">
                    <label for="hire_date" class="form-label">{{ __('employees.hire_date') }}</label>
                    <input type="date" class="form-control" id="hire_date" name="hire_date" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">{{ __('employees.save') }}</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">{{ __('employees.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>