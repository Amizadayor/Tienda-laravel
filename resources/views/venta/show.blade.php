@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="flex flex-wrap">
            <div class="w-full">
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="bg-white rounded-lg">
                        <div class="p-4">
                            <div class="flex justify-between items-center">
                                <div class="max-w-3xl mx-auto flex items-center justify-center">
                                    <h2 class="text-xl font-bold">Detalles de la Venta</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4">
                        <div class="mb-4">
                            <p><strong>ID de Venta:</strong> {{ $venta->id }}</p>
                            <p><strong>ID de Pedido:</strong> {{ $pedido->id }}</p>
                            <p><strong>ID de Detalles de Pedido:</strong> {{ $detallesPedido->id }}</p>
                            <p><strong>ID de Envío:</strong> {{ $envio->id }}</p>
                        </div>
                        <div class="mb-4">
                            <p><strong>Fecha de Venta:</strong> {{ $venta->created_at }}</p>
                            <p><strong>Estado de Envío:</strong> {{ $pedido->estado_envio }}</p>
                            <p><strong>Nombre del Cliente:</strong> {{ $pedido->cliente->nombre }}</p>
                            <p><strong>Correo Electrónico del Cliente:</strong> {{ $pedido->cliente->email }}</p>
                        </div>
                        <div class="mb-4">
                            <p><strong>Producto:</strong> {{ $detallesPedido->producto->nombre }}</p>
                            <p><strong>Cantidad Vendida:</strong> {{ $detallesPedido->cantidad }}</p>
                            <p><strong>Precio Unitario:</strong> {{ $detallesPedido->precio_unitario }}</p>
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('venta.index') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md">Volver al Listado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
