@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="flex flex-wrap">
            <div class="w-full">
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                        <div class="flex justify-between items-center">
                            <h2 class="text-2xl font-bold">{{ __('') }}</h2>
                            <div class="ml-3 flex justify-end">
                                <a href="{{ route('inventario.index') }}" class="flex items-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg px-4 py-2 font-bold cursor-pointer">
                                    <i class="fas fa-times mr-2"></i>
                                    <span class="mr-2">{{ __('Cancelar') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('inventario.update', $inventario->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label for="producto_id" class="block font-bold mb-2">{{ __('Producto') }}</label>
                                    <select name="producto_id" id="producto_id" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                        @foreach ($productos as $producto)
                                            <option value="{{ $producto->id }}" {{ $producto->id === $inventario->producto_id ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="cantidad" class="block font-bold mb-2">{{ __('Cantidad') }}</label>
                                    <input type="number" name="cantidad" id="cantidad" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $inventario->cantidad }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="ultima_actualizacion" class="block font-bold mb-2">{{ __('Última Actualización') }}</label>
                                    <input type="date" name="ultima_actualizacion" id="ultima_actualizacion" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $inventario->ultima_actualizacion }}">
                                </div>
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
        </div>
    </div>
@endsection
