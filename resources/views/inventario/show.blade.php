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
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    <span class="mr-2">{{ __('Volver') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="producto" class="block font-bold mb-2">{{ __('Producto') }}</label>
                                <p>{{ $inventario->producto->nombre }}</p>
                            </div>
                            <div class="mb-4">
                                <label for="cantidad" class="block font-bold mb-2">{{ __('Cantidad') }}</label>
                                <p>{{ $inventario->cantidad }}</p>
                            </div>
                            <div class="mb-4">
                                <label for="ultima_actualizacion" class="block font-bold mb-2">{{ __('Última Actualización') }}</label>
                                <p>{{ $inventario->ultima_actualizacion }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
