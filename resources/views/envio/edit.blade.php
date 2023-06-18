@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="flex flex-wrap">
            <div class="w-full">
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                        <h1 class="text-2xl font-bold">{{ __('Editar Envío') }}</h1>
                        <form action="{{ route('envio.update', $envio->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mt-4">
                                <label for="pedido_id" class="block font-medium">{{ __('Pedido ID') }}</label>
                                <select name="pedido_id" id="pedido_id" class="w-full rounded-md border-gray-300 py-2 px-3 mt-1">
                                    <option value="" disabled>{{ __('Seleccionar pedido') }}</option>
                                    @foreach ($pedidos as $pedido)
                                        <option value="{{ $pedido->id }}" {{ $envio->pedido_id == $pedido->id ? 'selected' : '' }}>{{ $pedido->id }}</option>
                                    @endforeach
                                </select>
                                @error('pedido_id')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label for="metodo_envio" class="block font-medium">{{ __('Método de envío') }}</label>
                                <select name="metodo_envio" id="metodo_envio" class="w-full rounded-md border-gray-300 py-2 px-3 mt-1">
                                    <option value="" disabled>{{ __('Seleccionar método de envío') }}</option>
                                    @foreach ($enumMetodoEnvio as $option)
                                        <option value="{{ $option }}" {{ $envio->metodo_envio == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                                @error('metodo_envio')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label for="direccion_envio" class="block font-medium">{{ __('Dirección de envío') }}</label>
                                <input type="text" name="direccion_envio" id="direccion_envio" class="w-full rounded-md border-gray-300 py-2 px-3 mt-1" value="{{ $envio->direccion_envio }}" />
                                @error('direccion_envio')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="metodo_pago" class="block font-medium">{{ __('Método de pago') }}</label>
                                <select name="metodo_pago" id="metodo_pago" class="w-full rounded-md border-gray-300 py-2 px-3 mt-1">
                                    <option value="" disabled>{{ __('Seleccionar método de pago') }}</option>
                                    @foreach ($enumMetodoPago as $option)
                                        <option value="{{ $option }}" @if ($option === $envio->metodo_pago) selected @endif>{{ $option }}</option>
                                    @endforeach
                                </select>
                                @error('metodo_pago')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mt-6">
                                <x-primary-button>
                                    {{ __('Actualizar Envío') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
