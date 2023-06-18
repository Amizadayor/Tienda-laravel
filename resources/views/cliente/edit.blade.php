@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto">
            <form action="{{ route('cliente.update', $cliente->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Nombre:</label>
                    <x-text-input id="nombre" class="border p-3 w-full rounded-lg" type="text" name="nombre" :value="$cliente->nombre" required autofocus />
                </div>

                <div class="mb-4">
                    <label for="direccion" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Dirección:</label>
                    <x-text-input id="direccion" class="border p-3 w-full rounded-lg" type="text" name="direccion" :value="$cliente->direccion" required autofocus />
                </div>

                <div class="mb-4">
                    <label for="telefono" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Teléfono:</label>
                    <x-text-input id="telefono" class="border p-3 w-full rounded-lg" type="text" name="telefono" :value="$cliente->telefono" required autofocus />
                </div>

                <div class="mb-4">
                    <label for="email" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Email:</label>
                    <x-text-input id="email" class="border p-3 w-full rounded-lg" type="email" name="email" :value="$cliente->email" required autofocus />
                </div>

                <div class="mb-4">
                    <label for="fecha_nacimiento" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Fecha de Nacimiento:</label>
                    <x-text-input id="fecha_nacimiento" class="border p-3 w-full rounded-lg" type="date" name="fecha_nacimiento" :value="$cliente->fecha_nacimiento" required autofocus />
                </div>

                <div class="mb-4">
                    <label for="ciudad" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Ciudad:</label>
                    <x-text-input id="ciudad" class="border p-3 w-full rounded-lg" type="text" name="ciudad" :value="$cliente->ciudad" required autofocus />
                </div>

                <div class="mb-4">
                    <label for="codigo_postal" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Código Postal:</label>
                    <x-text-input id="codigo_postal" class="border p-3 w-full rounded-lg" type="text" name="codigo_postal" :value="$cliente->codigo_postal" required autofocus />
                </div>

                <div class="mb-4">
                    <label for="pais" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">País:</label>
                    <x-text-input id="pais" class="border p-3 w-full rounded-lg" type="text" name="pais" :value="$cliente->pais" required autofocus />
                </div>

                <div class="mb-4">
                    <label for="notas" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Notas:</label>
                    <x-text-input id="notas" class="border p-3 w-full rounded-lg" type="text" name="notas" :value="$cliente->notas" required autofocus />
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-600 text-white rounded-lg px-6 py-1 font-bold cursor-pointer">
                        <i class="fas fa-save mr-2"></i> {{ __('Guardar') }}
                    </button>
                    <a href="{{ route('cliente.index') }}"
                        class="bg-gray-500 text-white rounded-lg px-6 py-2 font-bold cursor-pointer">
                        <i class="fas fa-times mr-2"></i> {{ __('Cancelar') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
