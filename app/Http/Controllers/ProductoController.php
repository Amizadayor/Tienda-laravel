<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        // Obtener todos los productos y mostrarlos en una lista
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo producto
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('producto.create', compact('categorias', 'marcas'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'nullable|exists:categoria,id',
            'marca_id' => 'nullable|exists:marca,id',
            'precio' => 'nullable|numeric',
            'cantidad_disponible' => 'nullable|integer|min:0',
            'descripcion' => 'nullable',
            'imagen' => 'nullable|image',
        ]);

        // Procesar la imagen (si se ha cargado una)
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('productos', 'public');
            $request->merge(['imagen' => $imagePath]);
        }

        // Crear un nuevo producto con los datos del formulario
        Producto::create($request->all());

        // Redirigir al usuario a la lista de productos con un mensaje de éxito
        return redirect()->route('producto.index')->with('success', 'Producto creado correctamente');
    }

    public function show(Producto $producto)
    {
        // Mostrar los detalles de un producto específico
        return view('producto.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
    // Mostrar el formulario para editar un producto específico
    $categorias = Categoria::all();
    $marcas = Marca::all();

    return view('producto.edit', compact('producto', 'categorias', 'marcas'));
    }

    public function update(Request $request, Producto $producto)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'nullable|exists:categoria,id',
            'marca_id' => 'nullable|exists:marca,id',
            'precio' => 'nullable|numeric',
            'cantidad_disponible' => 'nullable|integer|min:0',
            'descripcion' => 'nullable',
            'imagen' => 'nullable|image',
        ]);

        // Procesar la imagen (si se ha cargado una)
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('productos', 'public');
            $request->merge(['imagen' => $imagePath]);
        }

        // Actualizar los datos del producto con los datos del formulario
        $producto->update($request->all());

        // Redirigir al usuario a los detalles del producto con un mensaje de éxito
        return redirect()->route('producto.index', $producto)->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Producto $producto)
    {
        // Eliminar el producto
        $producto->delete();

        // Redirigir al usuario a la lista de productos con un mensaje de éxito
        return redirect()->route('producto.index')->with('success', 'Producto eliminado correctamente');
    }
}
