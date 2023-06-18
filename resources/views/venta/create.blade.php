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
                                    <h2 class="text-xl font-bold">Crear Venta</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4">
                        <form action="{{ route('venta.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="detalles_pedido" class="block text-gray-700 text-sm font-bold mb-2">Detalles Pedido:</label>
                                <select name="detalles_pedido" id="detalles_pedido" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Seleccionar detalles pedido</option>
                                    {{-- Recorre los detalles de pedido disponibles y crea las opciones --}}
                                    @foreach ($detallesPedidos as $detallesPedido)
                                        <option value="{{ $detallesPedido->id }}">{{ $detallesPedido->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="envio" class="block text-gray-700 text-sm font-bold mb-2">Envío:</label>
                                <select name="envio" id="envio" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Seleccionar envío</option>
                                    {{-- Recorre los envíos disponibles y crea las opciones --}}
                                    @foreach ($envios as $envio)
                                        <option value="{{ $envio->id }}">{{ $envio->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex items-center justify-end mt-6">
                                <x-primary-button type="submit">
                                    {{ __('Realizar venta') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
