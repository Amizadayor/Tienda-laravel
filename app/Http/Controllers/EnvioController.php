<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use App\Models\Pedido;
use Illuminate\Http\Request;

class EnvioController extends Controller
{
    public function index()
    {
        // Obtener todos los envíos y mostrarlos en una lista
        $envios = Envio::all();
        return view('envio.index', compact('envios'));
    }

    public function create()
    {
        $pedidos = Pedido::all();
        $enumMetodoEnvio = ['estandar', 'express', 'recogida'];
        $enumMetodoPago = ['tarjeta', 'efectivo', 'transferencia'];
        return view('envio.create', compact('pedidos', 'enumMetodoEnvio', 'enumMetodoPago'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'pedido_id' => 'required|exists:pedido,id',
            'metodo_envio' => 'required|in:estandar,express,recogida',
            'direccion_envio' => 'required|string|max:255',
            'metodo_pago' => 'required|in:tarjeta,efectivo,transferencia',
        ]);

        // Crear un nuevo envío con los datos del formulario
        Envio::create($request->all());

        // Redirigir al usuario a la lista de envíos con un mensaje de éxito
        return redirect()->route('envio.index')->with('success', 'Envío creado correctamente');
    }

    public function show(Envio $envio)
    {
        // Mostrar los detalles de un envío específico
        return view('envio.show', compact('envio'));
    }

    public function edit(Envio $envio)
    {
        $pedidos = Pedido::all();
        $enumMetodoEnvio = ['estandar', 'express', 'recogida'];
        $enumMetodoPago = ['tarjeta', 'efectivo', 'transferencia'];
        return view('envio.edit', compact('envio', 'pedidos', 'enumMetodoEnvio', 'enumMetodoPago'));
    }


    public function update(Request $request, Envio $envio)
    {
        // Validar los datos del formulario
        $request->validate([
            'pedido_id' => 'required|exists:pedido,id',
            'metodo_envio' => 'required|in:estandar,express,recogida',
            'direccion_envio' => 'required|string|max:255',
            'metodo_pago' => 'required|in:tarjeta,efectivo,transferencia',
        ]);

        // Actualizar los datos del envío con los datos del formulario
        $envio->update($request->all());

        // Redirigir al usuario a los detalles del envío con un mensaje de éxito
        return redirect()->route('envio.index', $envio)->with('success', 'Envío actualizado correctamente');
    }

    public function destroy(Envio $envio)
    {
        // Eliminar el envío
        $envio->delete();

        // Redirigir al usuario a la lista de envíos con un mensaje de éxito
        return redirect()->route('envio.index')->with('success', 'Envío eliminado correctamente');
    }
}
