@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto">
            <form action="{{ route('marca.update', $marca->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Nombre:</label>
                    <x-text-input id="nombre" class="border p-3 w-full rounded-lg" type="text" name="nombre" :value="$marca->nombre" required autofocus />
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Descripción:</label>
                    <textarea id="descripcion" class="border p-3 w-full rounded-lg" name="descripcion" rows="4" required>{{ $marca->descripcion }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="estado_marca" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Estado:</label>
                    <select id="estado_marca" class="border p-3 w-full rounded-lg" name="estado_marca" required>
                        <option value="activa" {{ $marca->estado_marca === 'activa' ? 'selected' : '' }}>Activa</option>
                        <option value="inactiva" {{ $marca->estado_marca === 'inactiva' ? 'selected' : '' }}>Inactiva</option>
                    </select>
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-600 text-white rounded-lg px-6 py-2 font-bold cursor-pointer">
                        <i class="fas fa-check mr-2"></i> Actualizar
                    </button>
                    <a href="{{ route('marca.index') }}" class="bg-gray-500 text-white rounded-lg px-6 py-2 font-bold cursor-pointer">
                        <i class="fas fa-times mr-2"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
