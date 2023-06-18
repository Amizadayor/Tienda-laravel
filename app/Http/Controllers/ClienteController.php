<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        // Obtener todos los clientes y mostrarlos en una lista
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo cliente
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'nullable',
            'telefono' => 'nullable',
            'email' => 'nullable|email',
            'fecha_nacimiento' => 'nullable|date',
            'ciudad' => 'nullable',
            'codigo_postal' => 'nullable',
            'pais' => 'nullable',
            'notas' => 'nullable',
        ]);

        // Crear un nuevo cliente con los datos del formulario
        Cliente::create($request->all());

        // Redirigir al usuario a la lista de clientes con un mensaje de éxito
        return redirect()->route('cliente.index')->with('success', 'Cliente creado correctamente');
    }

    public function show(Cliente $cliente)
    {
        // Mostrar los detalles de un cliente específico
        return view('cliente.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        // Mostrar el formulario para editar un cliente específico
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'nullable',
            'telefono' => 'nullable',
            'email' => 'nullable|email',
            'fecha_nacimiento' => 'nullable|date',
            'ciudad' => 'nullable',
            'codigo_postal' => 'nullable',
            'pais' => 'nullable',
            'notas' => 'nullable',
        ]);

        // Actualizar los datos del cliente con los datos del formulario
        $cliente->update($request->all());

        // Redirigir al usuario a los detalles del cliente con un mensaje de éxito
        return redirect()->route('cliente.index', $cliente)->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy(Cliente $cliente)
    {
        // Eliminar el cliente
        $cliente->delete();

        // Redirigir al usuario a la lista de clientes con un mensaje de éxito
        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado correctamente');
    }
}
