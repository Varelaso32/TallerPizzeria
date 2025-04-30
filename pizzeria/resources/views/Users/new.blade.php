<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('users.add_user') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #ffffff; color: #000000;">

    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">{{ __('users.add_user') }}</h1>

            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('users.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="{{ __('users.name') }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('users.email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="ejemplo@correo.com">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('users.passwordN') }}</label>
                    <input type="password" class="form-control" id="password" name="password" required minlength="6" placeholder="{{ __('users.password_placeholder') }}">
                    <div class="form-text text-gray">{{ __('users.password_hint') }}</div>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">{{ __('users.role') }}</label>
                    <select class="form-select" id="role" name="role" required>
                        <option selected disabled value="">{{ __('users.select_roleN') }}</option>
                        <option value="cliente">{{ __('users.client') }}</option>
                        <option value="empleado">{{ __('users.employee') }}</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">{{ __('users.save') }}</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __('users.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
