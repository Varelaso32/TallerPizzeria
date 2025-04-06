<head>
    <link rel="icon" href="{{ asset('img/pizza-planet.png') }}" type="image/png">
</head>
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nombre')" class="text-black" />
            <x-text-input id="name" class="block mt-1 w-full border-gray-300 focus:border-red-600 focus:ring-red-600" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" class="text-black" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-red-600 focus:ring-red-600" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-black" />
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-red-600 focus:ring-red-600" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" class="text-black" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-red-600 focus:ring-red-600" type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-black hover:text-red-600" href="{{ route('login') }}">
                ¿Ya estás registrado?
            </a>

            <x-primary-button class="ms-4 bg-red-600 hover:bg-red-700 text-white">
                Registrarse
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
