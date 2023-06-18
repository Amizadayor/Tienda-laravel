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
                                        <a href="{{ route('empleado.create') }}" data-placement="left">
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
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Dirección</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Teléfono</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Email</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Fecha de Nacimiento</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Departamento</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Puesto</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Salario</th>
                                        <th class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold cursor-default">Fecha de Contratación</th>
                                        <th class="px-4 py-2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td class="font-bold px-4 py-2 text-center">{{ $empleado->id }}</td>
                                            <td class="font-bold px-4 py-2">{{ $empleado->nombre }}</td>
                                            <td class="font-bold px-4 py-2">{{ $empleado->direccion }}</td>
                                            <td class="font-bold px-4 py-2">{{ $empleado->telefono }}</td>
                                            <td class="font-bold px-4 py-2">{{ $empleado->email }}</td>
                                            <td class="font-bold px-4 py-2">{{ $empleado->fecha_nacimiento }}</td>
                                            <td class="font-bold px-4 py-2">{{ $empleado->departamento }}</td>
                                            <td class="font-bold px-4 py-2">{{ $empleado->puesto }}</td>
                                            <td class="font-bold px-4 py-2">{{ $empleado->salario }}</td>
                                            <td class="font-bold px-4 py-2">{{ $empleado->fecha_contratacion }}</td>
                                            <td class="px-2 py-2 text-center">
                                                <form action="{{ route('empleado.destroy', $empleado->id) }}" method="POST">
                                                    <div class="flex">
                                                        <a href="{{ route('empleado.show', $empleado->id) }}" class="flex-1 bg-blue-500 hover:bg-blue-700 text-white rounded-lg px-4 py-2 font-bold cursor-pointer mr-2">
                                                            <i class="fas fa-fw fa-eye"></i> {{ __('Ver') }}
                                                        </a>
                                                        <a href="{{ route('empleado.edit', $empleado->id) }}" class="flex-1 bg-green-500 hover:bg-green-700 text-white rounded-lg px-4 py-2 font-bold cursor-pointer mr-2">
                                                            <i class="fas fa-fw fa-edit"></i> {{ __('Editar') }}
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="flex-1 bg-red-500 hover:bg-red-700 text-white rounded-lg px-4 py-2 font-bold cursor-pointer" onclick="return confirm('¿Estás seguro de que quieres eliminar este empleado?')">
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
