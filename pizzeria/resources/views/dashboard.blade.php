<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard.bienvenido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Usuarios -->
                <a href="{{ route('users.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.usuariostitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.usuariosdescripcion') }}</p>
                </a>

                <!-- Clientes -->
                <a href="{{ route('clients.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.clientestitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.clientesdescripcion') }}</p>
                </a>

                <!-- Empleados -->
                <a href="{{ route('employees.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.empleadostitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.empleadosdescripcion') }}</p>
                </a>

                <!-- Proveedores -->
                <a href="{{ route('suppliers.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.proveedorestitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.proveedoresdescripcion') }}</p>
                </a>

                <!-- Materias Primas -->
                <a href="{{ route('raw_materials.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.materiasprimastitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.materiasprimasdescripcion') }}</p>
                </a>

                <!-- Ingredientes por Pizza -->
                <a href="{{ route('pizza_ingredient.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.ingredientespizzatitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.ingredientespizzadescripcion') }}</p>
                </a>

                <!-- Materia Prima para Pizza -->
                <a href="{{ route('pizza_raw_material.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.materiaprimaparapizzatitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.materiaprimaparapizzadescripcion') }}</p>
                </a>

                <!-- Compras -->
                <a href="{{ route('purchases.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.comprastitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.comprasdescripcion') }}</p>
                </a>

                <!-- Órdenes -->
                <a href="{{ route('orders.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.ordenestitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.ordenesdescripcion') }}</p>
                </a>

                <!-- Ingredientes Extra -->
                <a href="{{ route('extra_ingredients.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.ingredientesestratitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.ingredientesestradescripcion') }}</p>
                </a>

                <!-- Pizzas -->
                <a href="{{ route('pizzas.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.pizzastitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.pizzasdescripcion') }}</p>
                </a>

                <!-- Tamaños de Pizza -->
                <a href="{{ route('pizza_size.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.tamanospizzatitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.tamanospizzadescripcion') }}</p>
                </a>

                <!-- Ingredientes -->
                <a href="{{ route('ingredients.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.ingredientestitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.ingredientesdescripcion') }}</p>
                </a>

                <!-- Pizzas por Orden -->
                <a href="{{ route('order_pizza.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.ordenpizzatitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.ordenpizzadescripcion') }}</p>
                </a>

                <!-- Sucursales -->
                <a href="{{ route('branches.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.sucursalestitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.sucursalesdescripcion') }}</p>
                </a>

                <!-- Extras por Pedido -->
                <a href="{{ route('order_extra_ingredients.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">{{ __('dashboard.extraspedidotitulo') }}</h3>
                    <p class="text-black text-sm">{{ __('dashboard.extraspedidodescripcion') }}</p>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
