@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="p-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold">{{ __('') }}</h2>
                    <a href="{{ route('producto.index') }}" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-arrow-left"></i> {{ __('Volver') }}
                    </a>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul class="list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="p-4">
                <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nombre" class="block font-bold">{{ __('Nombre') }}</label>
                            <input type="text" name="nombre" id="nombre" class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500" value="{{ old('nombre') }}" required>
                        </div>
                        <div>
                            <label for="categoria_id" class="block font-bold">{{ __('Categoría') }}</label>
                            <select name="categoria_id" id="categoria_id" class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="" disabled selected>{{ __('Seleccionar categoría') }}</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="marca_id" class="block font-bold">{{ __('Marca') }}</label>
                            <select name="marca_id" id="marca_id" class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="" disabled selected>{{ __('Seleccionar marca') }}</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="precio" class="block font-bold">{{ __('Precio') }}</label>
                            <input type="number" name="precio" id="precio" class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500" value="{{ old('precio') }}" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="cantidad_disponible" class="block font-bold">{{ __('Cantidad Disponible') }}</label>
                            <input type="number" name="cantidad_disponible" id="cantidad_disponible" class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500" value="{{ old('cantidad_disponible') }}" required>
                        </div>
                        <div>
                            <label for="imagen" class="block font-bold">{{ __('Imagen') }}</label>
                            <input type="file" name="imagen" id="imagen" class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="descripcion" class="block font-bold">{{ __('Descripción') }}</label>
                        <textarea name="descripcion" id="descripcion" rows="4" class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white rounded-lg px-4 py-2 font-bold">
                            <i class="fas fa-save"></i> {{ __('Guardar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
