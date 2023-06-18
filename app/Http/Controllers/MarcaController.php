<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return view('marca.index', compact('marcas'));
    }

    public function create()
    {
        return view('marca.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'estado_marca' => 'required|in:activa,inactiva',
        ]);

        try {
            $marca = new Marca();
            $marca->nombre = $request->nombre;
            $marca->descripcion = $request->descripcion;
            $marca->estado_marca = $request->estado_marca;
            $marca->save();

            return redirect()->route('marca.index')->with('success', 'Marca creada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('marca.index')->with('error', 'Error al crear la marca');
        }
    }

    public function show(Marca $marca)
    {
        return view('marca.show', compact('marca'));
    }

    public function edit(Marca $marca)
    {
        return view('marca.edit', compact('marca'));
    }

    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'estado_marca' => 'required|in:activa,inactiva',
        ]);

        try {
            $marca->nombre = $request->input('nombre');
            $marca->descripcion = $request->input('descripcion');
            $marca->estado_marca = $request->input('estado_marca');
            $marca->save();

            return redirect()->route('marca.index', ['marca' => $marca])->with('success', 'Marca actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('marca.index')->with('error', 'Error al actualizar la marca: ' . $e->getMessage());
        }
    }

    public function destroy(Marca $marca)
    {
        $marca->delete();

        return redirect()->route('marca.index')->with('success', 'Marca eliminada correctamente');
    }
}
