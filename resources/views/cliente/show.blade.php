@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="flex flex-wrap">
            <div class="w-full">
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="bg-white rounded-lg">
                        <div class="p-4">
                            <div class="flex justify-between items-center">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                    {{ __('') }}
                                </h2>
                                <div class="ml-3 flex justify-end">
                                    <x-primary-button class="ml-3">
                                        <a href="{{ route('cliente.index') }}" data-placement="left">
                                            <i class="fas fa-arrow-left mr-1"></i> {{ __('Regresar') }}
                                        </a>
                                    </x-primary-button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full border-separate border-spacing-2">
                                <thead>
                                    <tr>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">ID</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Nombre</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Dirección</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Teléfono</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Email</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Fecha de Nacimiento</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Ciudad</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Código Postal</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">País</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Notas</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="font-bold px-4 py-2 text-center">{{ $cliente->id }}</td>
                                        <td class="font-bold px-4 py-2 text-center">{{ $cliente->nombre }}</td>
                                        <td class="font-bold px-4 py-2 text-center">{{ $cliente->direccion }}</td>
                                        <td class="font-bold px-4 py-2 text-center">{{ $cliente->telefono }}</td>
                                        <td class="font-bold px-4 py-2 text-center">{{ $cliente->email }}</td>
                                        <td class="font-bold px-4 py-2 text-center">{{ $cliente->fecha_nacimiento }}</td>
                                        <td class="font-bold px-4 py-2 text-center">{{ $cliente->ciudad }}</td>
                                        <td class="font-bold px-4 py-2 text-center">{{ $cliente->codigo_postal }}</td>
                                        <td class="font-bold px-4 py-2 text-center">{{ $cliente->pais }}</td>
                                        <td class="font-bold px-4 py-2 text-center">{{ $cliente->notas }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
