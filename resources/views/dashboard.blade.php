@extends('layouts.app')

@section('content')
<div class="bg-gray-100">
    <div class="bg-purple-100 rounded-lg shadow-inner ml-8 mt-8 mr-8 mb-8">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="p-6 text-center font-mono font-bold text-gray-900">
                {{ __("TIENDA") }}
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{ route('categoria.index') }}"
                class="block bg-blue-400 rounded-lg shadow-2xl p-6 px-4 font-bold">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-list-alt text-4xl text-white"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4 text-center">Categorías</h2>
                <p class="text-white font-mono text-center">Administra las categorías de productos.</p>
            </a>

            <a href="{{ route('marca.index') }}"
                class="block bg-violet-400 rounded-lg shadow-2xl p-6 px-4 font-bold">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-tags text-4xl text-white"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4 text-center">Marcas</h2>
                <p class="text-white font-mono text-center">Administra las marcas de productos.</p>
            </a>

            <a href="{{ route('cliente.index') }}"
                class="block bg-pink-400 rounded-lg shadow-2xl p-6 px-4 font-bold">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-user-circle text-4xl text-white"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4 text-center">Clientes</h2>
                <p class="text-white font-mono text-center">Administra los clientes y sus detalles.</p>
            </a>

            <a href="{{ route('empleado.index') }}"
                class="block bg-green-400 rounded-lg shadow-2xl p-6 px-4 font-bold">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-users text-4xl text-white"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4 text-center">Empleados</h2>
                <p class="text-white font-mono text-center">Administra los empleados y sus detalles.</p>
            </a>

            <a href="{{ route('producto.index') }}"
                class="block bg-yellow-400 rounded-lg shadow-2xl p-6 px-4 font-bold">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-boxes text-4xl text-white"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4 text-center">Productos</h2>
                <p class="text-white font-mono text-center">Administra los productos y sus detalles.</p>
            </a>

            <a href="{{ route('inventario.index') }}"
                class="block bg-red-400 rounded-lg shadow-2xl p-6 px-4 font-bold">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-clipboard-list text-4xl text-white"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4 text-center">Inventario</h2>
                <p class="text-white font-mono text-center">Administra el inventario de productos.</p>
            </a>

            <a href="{{ route('pedido.index') }}"
                class="block bg-indigo-400 rounded-lg shadow-2xl p-6 px-4 font-bold">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-clipboard-check text-4xl text-white"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4 text-center">Pedidos</h2>
                <p class="text-white font-mono text-center">Administra los pedidos y sus detalles.</p>
            </a>

            <a href="{{ route('envio.index') }}"
                class="block bg-gray-500 rounded-lg shadow-2xl p-6 px-4 font-bold">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-shipping-fast text-4xl text-white"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4 text-center">Envíos</h2>
                <p class="text-white font-mono text-center">Administra los envíos y su estado.</p>
            </a>

            <a href="{{ route('venta.index') }}"
                class="block bg-teal-400 rounded-lg shadow-2xl p-6 px-4 font-bold">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-chart-line text-4xl text-white"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4 text-center">Ventas</h2>
                <p class="text-white font-mono text-center">Administra las ventas y sus detalles.</p>
            </a>
        </div>
    </div>
</div>
@endsection
