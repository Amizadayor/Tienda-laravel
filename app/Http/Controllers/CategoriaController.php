<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
    return view('categoria.index', compact('categorias'));

    }

    public function create()
    {
        return view('categoria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'estado_categoria' => 'required|in:activa,inactiva',
        ]);
    
        try {
            $categoria = new Categoria();
            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;
            $categoria->estado_categoria = $request->estado_categoria;
            $categoria->save();
    
            return redirect()->route('categoria.index')->with('success', 'Categoría creada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('categoria.index')->with('error', 'Error al crear la categoría');
        }
    }

    public function show(Categoria $categoria)
    {
        return view('categoria.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categoria.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'estado_categoria' => 'required|in:activa,inactiva',
        ]);
        try {
            $categoria->nombre = $request->input('nombre');
            $categoria->descripcion = $request->input('descripcion');
            $categoria->estado_categoria = $request->input('estado_categoria');
            $categoria->save();

            return redirect()->route('categoria.index', ['categoria' => $categoria])->with('success', 'Categoría actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('categoria.index')->with('error', 'Error al actualizar la categoria: ' . $e->getMessage());
        }
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categoria.index')->with('success', 'Categoría eliminada correctamente');
    }
}
