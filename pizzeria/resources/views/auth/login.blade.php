<head>
    <link rel="icon" href="{{ asset('img/pizza-planet.png') }}" type="image/png">
</head>
<x-guest-layout>
    <!-- Estado de sesión -->
    <x-auth-session-status class="mb-4 text-red-600" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Correo electrónico -->
        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" class="text-black" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-red-600 focus:ring-red-600" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Contraseña -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-black" />
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-red-600 focus:ring-red-600" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Recordarme -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500" name="remember">
                <span class="ms-2 text-sm text-black">{{ __('Recordarme') }}</span>
            </label>
        </div>

        <!-- Acciones -->
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-black hover:text-red-600" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 bg-red-600 hover:bg-red-700 text-white">
                {{ __('Iniciar sesión') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
