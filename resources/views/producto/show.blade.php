@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="p-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold">{{ $producto->nombre }}</h2>
                    <a href="{{ route('producto.index') }}" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-arrow-left"></i> {{ __('Volver') }}
                    </a>
                </div>
            </div>

            <div class="p-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold">{{ __('Categoría') }}</label>
                        <p>{{ $producto->categoria->nombre }}</p>
                    </div>
                    <div>
                        <label class="block font-bold">{{ __('Marca') }}</label>
                        <p>{{ $producto->marca->nombre }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block font-bold">{{ __('Precio') }}</label>
                        <p>{{ $producto->precio }}</p>
                    </div>
                    <div>
                        <label class="block font-bold">{{ __('Cantidad Disponible') }}</label>
                        <p>{{ $producto->cantidad_disponible }}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block font-bold">{{ __('Descripción') }}</label>
                    <p>{{ $producto->descripcion }}</p>
                </div>

                <div class="mt-6">
                    <label class="block font-bold">{{ __('Imagen') }}</label>
                    <img src="{{ asset('storage/productos/UnretJXRILIgm2WduumHqteoxreU8UZiXaR649U3.jpg') }}" alt="{{ $producto->nombre }}" class="w-full">
                </div>
            </div>
        </div>
    </div>
@endsection
x