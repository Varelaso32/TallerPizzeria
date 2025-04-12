<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido a Pizza Planet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Usuarios -->
                <a href="{{ route('users.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">👤 Usuarios</h3>
                    <p class="text-black text-sm">Gestiona todos los usuarios registrados.</p>
                </a>

                <!-- Clientes -->
                <a href="{{ route('clients.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">👥 Clientes</h3>
                    <p class="text-black text-sm">Listado y control de clientes.</p>
                </a>

                <!-- Empleados -->
                <a href="{{ route('employees.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🧑‍💼 Empleados</h3>
                    <p class="text-black text-sm">Gestiona el equipo de trabajo.</p>
                </a>

                <!-- Proveedores -->
                <a href="{{ route('suppliers.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🚚 Proveedores</h3>
                    <p class="text-black text-sm">Administra los proveedores de insumos.</p>
                </a>

                <!-- Materias Primas -->
                <a href="{{ route('raw_materials.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🧂 Materias Primas</h3>
                    <p class="text-black text-sm">Controla los ingredientes disponibles.</p>
                </a>

                <!-- Ingredientes por Pizza -->
                <a href="{{ route('ingredient.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🍕 Ingredientes por Pizza</h3>
                    <p class="text-black text-sm">Administra las combinaciones para tus pizzas.</p>
                </a>

                <!-- Pizza raw maeterias -->
                <a href="{{ route('pizza_raw_material.index') }}" class="bg-white border border-red-600 hover:bg-red-100 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🥣 Materia Prima Para Pizza</h3>
                    <p class="text-black text-sm">Administra las materias primas asociadas a cada pizza.</p>
                </a>

                <!-- Compras -->
                <a href="{{ route('purchases.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🧾 Compras</h3>
                    <p class="text-black text-sm">Registra y consulta las compras de insumos.</p>
                </a>

                <!-- Órdenes -->
                <a href="{{ route('orders.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">📦 Órdenes</h3>
                    <p class="text-black text-sm">Gestiona los pedidos realizados por clientes.</p>
                </a>

                <!-- Ingredientes Extra -->
                <a href="{{ route('extra_ingredients.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🌶 Ingredientes Extra</h3>
                    <p class="text-black text-sm">Administra ingredientes adicionales disponibles.</p>
                </a>

                <!-- Pizzas -->
                <a href="{{ route('pizzas.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🍕 Pizzas</h3>
                    <p class="text-black text-sm">Gestiona los tipos de pizza disponibles.</p>
                </a>

                <!-- Tamaños de Pizza -->
                <a href="{{ route('pizza-size.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">📏 Tamaños de Pizza</h3>
                    <p class="text-black text-sm">Administra los distintos tamaños de pizza ofrecidos.</p>
                </a>

                <!-- Ingredientes -->
                <a href="{{ route('ingredient.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🧄 Ingredientes</h3>
                    <p class="text-black text-sm">Lista y administra todos los ingredientes base.</p>
                </a>

                <!-- Relación Orden-Pizza -->
                <a href="{{ route('order_pizza.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">📋 Pizzas por Orden</h3>
                    <p class="text-black text-sm">Visualiza las pizzas asociadas a cada orden.</p>
                </a>

                <!-- Sucursales -->
                <a href="{{ route('branches.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🏬 Sucursales</h3>
                    <p class="text-black text-sm">Administra las distintas sucursales del negocio.</p>
                </a>

                <!-- Ingredientes Extra por Pedido -->
                <a href="{{ route('order_extra_ingredients.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🧂 Extras por Pedido</h3>
                    <p class="text-black text-sm">Gestiona los ingredientes extra por cada pedido realizado.</p>
                </a>
                
            </div>
        </div>
    </div>
</x-app-layout>