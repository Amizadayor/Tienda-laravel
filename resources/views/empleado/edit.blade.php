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
                                <a href="{{ route('empleado.index') }}" class="flex items-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg px-4 py-2 font-bold cursor-pointer">
                                    <i class="fas fa-times mr-2"></i>
                                    <span class="mr-2">{{ __('Cancelar') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('empleado.update', $empleado->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label for="nombre" class="block font-bold mb-2">{{ __('Nombre') }}</label>
                                    <input type="text" name="nombre" id="nombre" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $empleado->nombre }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="direccion" class="block font-bold mb-2">{{ __('Dirección') }}</label>
                                    <input type="text" name="direccion" id="direccion" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $empleado->direccion }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="telefono" class="block font-bold mb-2">{{ __('Teléfono') }}</label>
                                    <input type="text" name="telefono" id="telefono" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $empleado->telefono }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block font-bold mb-2">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="email" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $empleado->email }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="fecha_nacimiento" class="block font-bold mb-2">{{ __('Fecha de Nacimiento') }}</label>
                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $empleado->fecha_nacimiento }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="departamento" class="block font-bold mb-2">{{ __('Departamento') }}</label>
                                    <input type="text" name="departamento" id="departamento" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $empleado->departamento }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="puesto" class="block font-bold mb-2">{{ __('Puesto') }}</label>
                                    <input type="text" name="puesto" id="puesto" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $empleado->puesto }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="salario" class="block font-bold mb-2">{{ __('Salario') }}</label>
                                    <input type="number" name="salario" id="salario" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $empleado->salario }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="fecha_contratacion" class="block font-bold mb-2">{{ __('Fecha de Contratación') }}</label>
                                    <input type="date" name="fecha_contratacion" id="fecha_contratacion" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $empleado->fecha_contratacion }}" required>
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
