@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="flex flex-wrap">
            <div class="w-full">
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                        <h1 class="text-2xl font-bold">{{ __('Detalles del Envío') }}</h1>
                        <div class="mt-4">
                            <p><span class="font-medium">{{ __('Pedido ID') }}:</span> {{ $envio->pedido_id }}</p>
                            <p><span class="font-medium">{{ __('Método de envío') }}:</span> {{ $envio->metodo_envio }}</p>
                            <p><span class="font-medium">{{ __('Dirección de envío') }}:</span> {{ $envio->direccion_envio }}</p>
                            <p><span class="font-medium">{{ __('Método de pago') }}:</span> {{ $envio->metodo_pago }}</p>
                        </div>
                        <div class="ml-3 flex justify-end">
                            <a href="{{ route('envio.index') }}" class="flex items-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg px-4 py-2 font-bold cursor-pointer">
                                <i class="fas fa-arrow-left mr-2"></i>
                                <span class="mr-2">{{ __('Volver') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
