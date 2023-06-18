@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="p-4">
                <h2 class="text-2xl font-bold mb-4">{{ __('Detalle de Pedido') }}</h2>

                <div class="mb-4">
                    <label class="block font-bold">{{ __('Pedido ID') }}</label>
                    <p>{{ $detallesPedido->pedido_id }}</p>
                </div>

                <div class="mb-4">
                    <label class="block font-bold">{{ __('Producto ID') }}</label>
                    <p>{{ $detallesPedido->producto_id }}</p>
                </div>

                <div class="mb-4">
                    <label class="block font-bold">{{ __('Cantidad') }}</label>
                    <p>{{ $detallesPedido->cantidad }}</p>
                </div>

                <div class="mb-4">
                    <label class="block font-bold">{{ __('Precio Unitario') }}</label>
                    <p>{{ $detallesPedido->precio_unitario }}</p>
                </div>

                <div class="flex justify-end">
                    <x-primary-button>
                        <a href="{{ route('detalles_pedido.index', $detallesPedido->id) }}">
                            <i class="fas fa-arrow-left mr-2"></i>
                                    <span class="mr-2">{{ __('Volver') }}</span>
                        </a>
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
@endsection
