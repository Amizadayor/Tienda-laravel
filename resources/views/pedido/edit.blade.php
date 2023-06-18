@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="p-4">
                <h1 class="text-2xl font-bold">{{ __('') }}</h1>
                <form action="{{ route('pedido.update', $pedido->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Cliente') }}</label>
                        <select name="cliente_id" class="w-full border-gray-300 rounded-md">
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ $pedido->cliente_id == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Empleado') }}</label>
                        <select name="empleado_id" class="w-full border-gray-300 rounded-md">
                            @foreach ($empleados as $empleado)
                                <option value="{{ $empleado->id }}" {{ $pedido->empleado_id == $empleado->id ? 'selected' : '' }}>
                                    {{ $empleado->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('empleado_id')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Fecha Pedido') }}</label>
                        <input type="date" name="fecha_pedido" value="{{ $pedido->fecha_pedido }}" class="w-full border-gray-300 rounded-md">
                        @error('fecha_pedido')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Estado Envío') }}</label>
                        <select name="estado_envio" class="w-full border-gray-300 rounded-md">
                            <option value="pendiente" {{ $pedido->estado_envio == 'pendiente' ? 'selected' : '' }}>{{ __('Pendiente') }}</option>
                            <option value="enviado" {{ $pedido->estado_envio == 'enviado' ? 'selected' : '' }}>{{ __('Enviado') }}</option>
                            <option value="entregado" {{ $pedido->estado_envio == 'entregado' ? 'selected' : '' }}>{{ __('Entregado') }}</option>
                            <option value="cancelado" {{ $pedido->estado_envio == 'cancelado' ? 'selected' : '' }}>{{ __('Cancelado') }}</option>
                        </select>
                        @error('estado_envio')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Subtotal') }}</label>
                        <input type="number" name="subtotal" value="{{ $pedido->subtotal }}" class="w-full border-gray-300 rounded-md">
                        @error('subtotal')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Impuestos') }}</label>
                        <input type="number" name="impuestos" value="{{ $pedido->impuestos }}" class="w-full border-gray-300 rounded-md">
                        @error('impuestos')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Total') }}</label>
                        <input type="number" name="total" value="{{ $pedido->total }}" class="w-full border-gray-300 rounded-md">
                        @error('total')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white rounded-lg px-4 py-2 font-bold">
                            {{ __('Guardar') }}
                        </button>
                        <a href="{{ route('pedido.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white rounded-lg px-4 py-2 font-bold ml-2">
                            {{ __('Cancelar') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
