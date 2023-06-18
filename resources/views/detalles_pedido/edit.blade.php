@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="p-4">
                <h2 class="text-2xl font-bold mb-4">{{ __('Editar Detalle de Pedido') }}</h2>

                <form action="{{ route('detalles_pedido.update', $detallesPedido->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="pedido_id" class="block font-bold mb-1">{{ __('Pedido') }}</label>
                        <select name="pedido_id" id="pedido_id" class="border border-gray-300 rounded w-full p-2" required>
                            @foreach ($pedidos as $pedido)
                                <option value="{{ $pedido->id }}" @if ($pedido->id == $detallesPedido->pedido_id) selected @endif>{{ $pedido->id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="producto_id" class="block font-bold mb-1">{{ __('Producto') }}</label>
                        <select name="producto_id" id="producto_id" class="border border-gray-300 rounded w-full p-2" required>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}" @if ($producto->id == $detallesPedido->producto_id) selected @endif>{{ $producto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="cantidad" class="block font-bold mb-1">{{ __('Cantidad') }}</label>
                        <input type="number" name="cantidad" id="cantidad" class="border border-gray-300 rounded w-full p-2" value="{{ $detallesPedido->cantidad }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="precio_unitario" class="block font-bold mb-1">{{ __('Precio Unitario') }}</label>
                        <input type="text" name="precio_unitario" id="precio_unitario" class="border border-gray-300 rounded w-full p-2" value="{{ $detallesPedido->precio_unitario }}" required>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-blue-600 text-white rounded-lg px-6 py-1 font-bold cursor-pointer">
                            <i class="fas fa-check mr-2"></i> {{ __('Actualizar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
