@extends('layouts.app')

@section('content')
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="p-4">
                <h1 class="text-2xl font-bold">{{ __('Crear Pedido') }}</h1>
                <form action="{{ route('pedido.store') }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Cliente') }}</label>
                        <select name="cliente_id" class="w-full border-gray-300 rounded-md">
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Empleado') }}</label>
                        <select name="empleado_id" class="w-full border-gray-300 rounded-md">
                            @foreach ($empleados as $empleado)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                            @endforeach
                        </select>
                        @error('empleado_id')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Fecha Pedido') }}</label>
                        <input type="date" name="fecha_pedido" class="w-full border-gray-300 rounded-md">
                        @error('fecha_pedido')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Estado Envío') }}</label>
                        <select name="estado_envio" class="w-full border-gray-300 rounded-md">
                            <option value="pendiente">{{ __('Pendiente') }}</option>
                            <option value="enviado">{{ __('Enviado') }}</option>
                            <option value="entregado">{{ __('Entregado') }}</option>
                            <option value="cancelado">{{ __('Cancelado') }}</option>
                        </select>
                        @error('estado_envio')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Subtotal') }}</label>
                        <input type="number" name="subtotal" id="subtotal" class="w-full border-gray-300 rounded-md" step="0.01" min="0" required>
                        @error('subtotal')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Impuestos') }} (%)</label>
                        <input type="number" name="impuestos" id="impuestos" class="w-full border-gray-300 rounded-md" step="0.01" min="0" required>
                        @error('impuestos')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold">{{ __('Total') }}</label>
                        <input type="number" name="total" id="total" class="w-full border-gray-300 rounded-md" step="0.01" min="0" required readonly>
                        @error('total')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white rounded-lg px-4 py-2 font-bold">
                            {{ __('Guardar') }}
                        </button>
                        <a href="{{ route('pedido.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white rounded-lg px-4 py-2 font-bold ml-2">
                            {{ __('Cancelar') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const subtotalInput = document.getElementById('subtotal');
        const impuestosInput = document.getElementById('impuestos');
        const totalInput = document.getElementById('total');

        subtotalInput.addEventListener('input', updateTotal);
        impuestosInput.addEventListener('input', updateTotal);

        function updateTotal() {
            const subtotal = parseFloat(subtotalInput.value);
            const impuestos = parseFloat(impuestosInput.value);

            if (!isNaN(subtotal) && !isNaN(impuestos)) {
                const total = subtotal + (subtotal * (impuestos / 100));
                totalInput.value = total.toFixed(2);
            } else {
                totalInput.value = '';
            }
        }
    </script>
@endsection
