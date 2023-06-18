<?php

namespace App\Http\Controllers;

use App\Models\DetallesPedido;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetallesPedidoController extends Controller
{
    public function index()
    {
        $detallesPedidos = DetallesPedido::all();
        return view('detalles_pedido.index', compact('detallesPedidos'));
    }

    public function create()
    {
        $pedidos = Pedido::all();
        $productos = Producto::all();
        return view('detalles_pedido.create', compact('pedidos', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedido,id',
            'producto_id' => 'required|exists:producto,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        DetallesPedido::create($request->all());

        return redirect()->route('detalles_pedido.index')->with('success', 'Detalle de pedido creado correctamente');
    }

    public function show(DetallesPedido $detallesPedido)
    {
        return view('detalles_pedido.show', compact('detallesPedido'));
    }

    public function edit(DetallesPedido $detallesPedido)
    {
        $pedidos = Pedido::all();
        $productos = Producto::all();

        return view('detalles_pedido.edit', compact('detallesPedido', 'pedidos', 'productos'));
    }
    public function update(Request $request, DetallesPedido $detallesPedido)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedido,id',
            'producto_id' => 'required|exists:producto,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        $detallesPedido->update($request->all());

        return redirect()->route('detalles_pedido.index', $detallesPedido)->with('success', 'Detalle de pedido actualizado correctamente');
    }

    public function destroy(DetallesPedido $detallesPedido)
    {
        $detallesPedido->delete();

        return redirect()->route('detalles_pedido.index')->with('success', 'Detalle de pedido eliminado correctamente');
    }
}
