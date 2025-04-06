<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido a Pizza Planet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Tarjeta: Usuarios -->
                <a href="{{ route('users.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">👤 Usuarios</h3>
                    <p class="text-black text-sm">Gestiona todos los usuarios registrados.</p>
                </a>

                <!-- Tarjeta: Clientes -->
                <a href="{{ route('clients.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">👥 Clientes</h3>
                    <p class="text-black text-sm">Listado y control de clientes.</p>
                </a>

                <!-- Tarjeta: Empleados -->
                <a href="{{ route('employees.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🧑‍💼 Empleados</h3>
                    <p class="text-black text-sm">Gestiona el equipo de trabajo.</p>
                </a>

                <!-- Tarjeta: Proveedores -->
                <a href="{{ route('suppliers.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🚚 Proveedores</h3>
                    <p class="text-black text-sm">Administra los proveedores de insumos.</p>
                </a>

                <!-- Tarjeta: Materias Primas -->
                <a href="{{ route('raw_materials.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🧂 Materias Primas</h3>
                    <p class="text-black text-sm">Controla los ingredientes disponibles.</p>
                </a>

                <!-- Tarjeta: Ingredientes por Pizza -->
                <a href="{{ route('pizza_ingredient.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🍕 Ingredientes por Pizza</h3>
                    <p class="text-black text-sm">Administra las combinaciones para tus pizzas.</p>
                </a>

                <!-- Tarjeta: Pizza raw maeterias -->
                <a href="{{ route('pizza_raw_material.index') }}" class="bg-white border border-red-600 hover:bg-red-100 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🥣 Materia Prima Para Pizza</h3>
                    <p class="text-black text-sm">Administra las materias primas asociadas a cada pizza.</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
