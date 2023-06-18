@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto">
            <form action="{{ route('marca.store') }}" method="POST" class="space-y-4">
                @csrf

                <div class="mb-4">
                    <label for="nombre" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Nombre:</label>
                    <x-text-input id="nombre" class="border p-3 w-full rounded-lg" type="text" name="nombre" :value="old('nombre')" required autofocus />
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Descripción:</label>
                    <x-text-input id="descripcion" class="border p-3 w-full rounded-lg" type="text" name="descripcion" :value="old('descripcion')" required autofocus />
                </div>

                <div class="mb-4">
                    <label for="estado_marca" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Estado:</label>
                    <select name="estado_marca" id="estado_marca" class="border p-3 w-full rounded-lg" required>
                        <option value="activa">Activa</option>
                        <option value="inactiva">Inactiva</option>
                    </select>
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-600 text-white rounded-lg px-6 py-1 font-bold cursor-pointer">
                        <i class="fas fa-plus mr-2"></i> {{ __('Crear') }}
                    </button>
                    <a href="{{ route('marca.index') }}"
                        class="bg-gray-500 text-white rounded-lg px-6 py-2 font-bold cursor-pointer">
                        <i class="fas fa-times mr-2"></i> {{ __('Cancelar') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
