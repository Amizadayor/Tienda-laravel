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
                                        <a href="{{ route('marca.index') }}" data-placement="left">
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
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Marca</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Estado</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="font-bold px-4 py-2 text-center">{{ $marca->id }}</td>
                                        <td class="font-bold px-4 py-2 text-center">{{ $marca->nombre }}</td>
                                        <td class="font-bold px-4 py-2 text-center">
                                            @if ($marca->estado_marca == 'activa')
                                                <span class="text-green-500">{{ $marca->estado_marca }}</span>
                                            @else
                                                <span class="text-red-500">{{ $marca->estado_marca }}</span>
                                            @endif
                                        </td>
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
