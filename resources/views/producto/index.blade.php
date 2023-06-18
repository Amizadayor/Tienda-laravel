@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="flex flex-wrap">
            <div class="w-full">
                <div class="bg-white rounded-lg shadow-lg">

                    <div class="bg-white rounded-lg">
                        <div class="p-4">
                            <div class="flex justify-between items-center">
                                <div class="max-w-3xl mx-auto flex items-center justify-center">
                                </div>
                                <div class="ml-3 flex justify-end">
                                    <x-primary-button class="ml-3">
                                        <a href="{{ route('producto.create') }}" data-placement="left">
                                            <i class="fas fa-plus"></i> {{ __('Agregar') }}
                                        </a>
                                    </x-primary-button>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success text-center font-bold bg-green-500 text-white h-6 px-6 pr-6 rounded-full">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="p-4">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full border-separate border-spacing-2">
                                <thead>
                                    <tr>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">ID</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Nombre</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Categoría</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Marca</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Precio</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Cantidad Disponible</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Descripción</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Imagen</th>
                                        <th class="px-4 py-2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td class="font-bold px-4 py-2 text-center">{{ $producto->id }}</td>
                                            <td class="font-bold px-4 py-2">{{ $producto->nombre }}</td>
                                            <td class="font-bold px-4 py-2">{{ $producto->categoria->nombre }}</td>
                                            <td class="font-bold px-4 py-2">{{ $producto->marca->nombre }}</td>
                                            <td class="font-bold px-4 py-2">{{ $producto->precio }}</td>
                                            <td class="font-bold px-4 py-2">{{ $producto->cantidad_disponible }}</td>
                                            <td class="font-bold px-4 py-2">{{ $producto->descripcion }}</td>
                                            <td class="font-bold px-4 py-2">
                                                @if ($producto->imagen)
                                                    <div class="mt-6">
                                                        <label class="block font-bold">{{ __('Imagen') }}</label>
                                                        <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full">
                                                    </div>
                                                @else
                                                    No disponible
                                                @endif
                                            </td>
                                            <td class="px-2 py-2 text-center">
                                                <form action="{{ route('producto.destroy', $producto->id) }}" method="POST">
                                                    <div class="flex">
                                                        <a href="{{ route('producto.show', $producto->id) }}" class="flex-1 bg-blue-500 hover:bg-blue-700 text-white rounded-lg px-4 py-2 font-bold cursor-pointer mr-2">
                                                            <i class="fas fa-fw fa-eye"></i> {{ __('Ver') }}
                                                        </a>
                                                        <a href="{{ route('producto.edit', $producto->id) }}" class="flex-1 bg-green-500 hover:bg-green-700 text-white rounded-lg px-4 py-2 font-bold cursor-pointer mr-2">
                                                            <i class="fas fa-fw fa-edit"></i> {{ __('Editar') }}
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="flex-1 bg-red-500 hover:bg-red-700 text-white rounded-lg px-4 py-2 font-bold cursor-pointer" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">
                                                            <i class="fas fa-fw fa-trash"></i> {{ __('Borrar') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
