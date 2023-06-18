@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="p-4">
                <h1 class="text-2xl font-bold">{{ __('Detalles del Pedido') }}</h1>
                <div class="mt-4">
                    <label class="block font-bold">{{ __('Cliente') }}</label>
                    <p>{{ $pedido->cliente->nombre }}</p>
                </div>
                <div class="mt-4">
                    <label class="block font-bold">{{ __('Empleado') }}</label>
                    <p>{{ $pedido->empleado->nombre }}</p>
                </div>
                <div class="mt-4">
                    <label class="block font-bold">{{ __('Fecha Pedido') }}</label>
                    <p>{{ $pedido->fecha_pedido }}</p>
                </div>
                <div class="mt-4">
                    <label class="block font-bold">{{ __('Estado Envío') }}</label>
                    <p>{{ $pedido->estado_envio }}</p>
                </div>
                <div class="mt-4">
                    <label class="block font-bold">{{ __('Subtotal') }}</label>
                    <p>{{ $pedido->subtotal }}</p>
                </div>
                <div class="mt-4">
                    <label class="block font-bold">{{ __('Impuestos') }}</label>
                    <p>{{ $pedido->impuestos }}</p>
                </div>
                <div class="mt-4">
                    <label class="block font-bold">{{ __('Total') }}</label>
                    <p>{{ $pedido->total }}</p>
                </div>
                <div class="mt-6">
                    <a href="{{ route('pedido.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white rounded-lg px-4 py-2 font-bold">
                        {{ __('Volver') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
