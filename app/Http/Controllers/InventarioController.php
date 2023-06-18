<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventario = Inventario::all();
        return view('inventario.index', compact('inventario'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('inventario.create', compact('productos'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'producto_id' => 'required|exists:producto,id',
            'cantidad' => 'required|integer|min:0',
            'ultima_actualizacion' => 'nullable|date',
        ]);

        Inventario::create($request->all());

        return redirect()->route('inventario.index')->with('success', 'Registro de inventario creado correctamente');
    }

    public function show(Inventario $inventario)
    {
        return view('inventario.show', compact('inventario'));
    }

    public function edit(Inventario $inventario)
    {
        $productos = Producto::all(); // Obtener todos los productos
        return view('inventario.edit', compact('inventario', 'productos'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'producto_id' => 'required|exists:producto,id',
            'cantidad' => 'required|integer|min:0',
            'ultima_actualizacion' => 'nullable|date',
        ]);

        $inventario->update($request->all());

        return redirect()->route('inventario.index', $inventario)->with('success', 'Registro de inventario actualizado correctamente');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();

        return redirect()->route('inventario.index')->with('success', 'Registro de inventario eliminado correctamente');
    }
}

