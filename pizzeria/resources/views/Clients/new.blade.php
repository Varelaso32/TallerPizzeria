<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('clients.add_client') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #ffffff; color: #000000;">
    <div class="container mt-5">
        <div class="card shadow-sm rounded p-4">
            <h1 class="text-danger mb-4">{{ __('clients.add_client') }}</h1>

            <form method="POST" action="{{ route('clients.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="id" class="form-label">{{ __('clients.id') }}</label>
                    <input type="text" class="form-control" id="id" name="id" disabled>
                    <div class="form-text text-dark">{{ __('clients.client_id') }}</div>
                </div>

                <div class="mb-3">
                    <label for="user" class="form-label">{{ __('clients.user_associated') }}</label>
                    <select class="form-select" id="user" name="user_id" required>
                        <option selected disabled value="">{{ __('clients.select_user') }}</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">{{ __('clients.address') }}</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="{{ __('clients.enter_address') }}">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">{{ __('clients.phone') }}</label>
                    <input type="text"
                        class="form-control"
                        id="phone"
                        name="phone"
                        inputmode="numeric"
                        pattern="[0-9]+"
                        maxlength="20"
                        placeholder="{{ __('clients.enter_phone') }}"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    <div class="form-text text-dark">{{ __('clients.phone_info') }}</div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger">{{ __('clients.save') }}</button>
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">{{ __('clients.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
