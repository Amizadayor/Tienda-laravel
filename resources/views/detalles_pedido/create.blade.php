@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="p-4">
                <h2 class="text-2xl font-bold mb-4">{{ __('Agregar Detalle de Pedido') }}</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('detalles_pedido.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="pedido_id" class="block font-bold mb-2">{{ __('Pedido') }}</label>
                            <select name="pedido_id" id="pedido_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                                @foreach ($pedidos as $pedido)
                                    <option value="{{ $pedido->id }}">{{ $pedido->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="producto_id" class="block font-bold mb-2">{{ __('Producto') }}</label>
                            <select name="producto_id" id="producto_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="cantidad" class="block font-bold mb-2">{{ __('Cantidad') }}</label>
                            <input type="number" name="cantidad" id="cantidad" class="border border-gray-300 rounded-lg px-3 py-2 w-full" min="1" step="1" required>
                        </div>
                        <div>
                            <label for="precio_unitario" class="block font-bold mb-2">{{ __('Precio Unitario') }}</label>
                            <input type="number" name="precio_unitario" id="precio_unitario" class="border border-gray-300 rounded-lg px-3 py-2 w-full" min="0.01" step="0.01" required>
                        </div>
                    </div>

                    <div class="mt-6">
                        <x-primary-button type="submit">
                            {{ __('Agregar Detalle de Pedido') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
