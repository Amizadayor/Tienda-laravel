<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use App\Models\Pedido;
use Illuminate\Http\Request;

class DevolucionController extends Controller
{
    public function index()
    {
        // Obtener todas las devoluciones y mostrarlas en una lista
        $devoluciones = Devolucion::all();
        return view('devoluciones.index', compact('devoluciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear una nueva devolución
        return view('devoluciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'pedido_id' => 'required|exists:pedido,id',
            'fecha_devolucion' => 'required|date',
            'motivo' => 'required|string|max:255',
            'estado_devolucion' => 'required|in:pendiente,aprobada,rechazada,completada',
        ]);

        // Crear una nueva devolución con los datos del formulario
        Devolucion::create($request->all());

        // Redirigir al usuario a la lista de devoluciones con un mensaje de éxito
        return redirect()->route('devoluciones.index')->with('success', 'Devolución creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Devolucion $devolucion)
    {
        // Mostrar los detalles de una devolución específica
        return view('devoluciones.show', compact('devolucion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Devolucion $devolucion)
    {
        // Mostrar el formulario para editar una devolución específica
        return view('devoluciones.edit', compact('devolucion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Devolucion $devolucion)
    {
        // Validar los datos del formulario
        $request->validate([
            'pedido_id' => 'required|exists:pedido,id',
            'fecha_devolucion' => 'required|date',
            'motivo' => 'required|string|max:255',
            'estado_devolucion' => 'required|in:pendiente,aprobada,rechazada,completada',
        ]);

        // Actualizar los datos de la devolución con los datos del formulario
        $devolucion->update($request->all());

        // Redirigir al usuario a los detalles de la devolución con un mensaje de éxito
        return redirect()->route('devoluciones.show', $devolucion)->with('success', 'Devolución actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Devolucion $devolucion)
    {
        // Eliminar la devolución
        $devolucion->delete();

        // Redirigir al usuario a la lista de devoluciones con un mensaje de éxito
        return redirect()->route('devoluciones.index')->with('success', 'Devolución eliminada correctamente');
    }
}
