<?php

namespace App\Http\Controllers;

use App\Models\DetallesDevolucion;
use Illuminate\Http\Request;

class DetallesDevolucionController extends Controller
{
    public function index()
    {
        // Obtener todos los detalles de devolución y mostrarlos en una lista
        $detallesDevolucion = DetallesDevolucion::all();
        return view('detalles_devolucion.index', compact('detallesDevolucion'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo detalle de devolución
        return view('detalles_devolucion.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'devolucion_id' => 'required|exists:devolucion,id',
            'producto_id' => 'required|exists:producto,id',
            'cantidad_devuelta' => 'required|integer|min:1',
        ]);

        // Crear un nuevo detalle de devolución con los datos del formulario
        DetallesDevolucion::create($request->all());

        // Redirigir al usuario a la lista de detalles de devolución con un mensaje de éxito
        return redirect()->route('detalles_devolucion.index')->with('success', 'Detalle de devolución creado correctamente');
    }

    public function show(DetallesDevolucion $detalleDevolucion)
    {
        // Mostrar los detalles de un detalle de devolución específico
        return view('detalles_devolucion.show', compact('detalleDevolucion'));
    }

    public function edit(DetallesDevolucion $detalleDevolucion)
    {
        // Mostrar el formulario para editar un detalle de devolución específico
        return view('detalles_devolucion.edit', compact('detalleDevolucion'));
    }

    public function update(Request $request, DetallesDevolucion $detalleDevolucion)
    {
        // Validar los datos del formulario
        $request->validate([
            'devolucion_id' => 'required|exists:devolucion,id',
            'producto_id' => 'required|exists:producto,id',
            'cantidad_devuelta' => 'required|integer|min:1',
        ]);

        // Actualizar los datos del detalle de devolución con los datos del formulario
        $detalleDevolucion->update($request->all());

        // Redirigir al usuario a los detalles del detalle de devolución con un mensaje de éxito
        return redirect()->route('detalles_devolucion.show', $detalleDevolucion)->with('success', 'Detalle de devolución actualizado correctamente');
    }

    public function destroy(DetallesDevolucion $detalleDevolucion)
    {
        // Eliminar el detalle de devolución
        $detalleDevolucion->delete();

        // Redirigir al usuario a la lista de detalles de devolución con un mensaje de éxito
        return redirect()->route('detalles_devolucion.index')->with('success', 'Detalle de devolución eliminado correctamente');
    }
}
