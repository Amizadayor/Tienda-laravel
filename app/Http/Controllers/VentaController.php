<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Pedido;
use App\Models\DetallesPedido;
use App\Models\Envio;
use App\Models\Producto;
use App\Models\Inventario;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return view('venta.index', compact('ventas'));
    }

    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        $pedido = Pedido::findOrFail($venta->id_pedido);
        $detallesPedido = DetallesPedido::findOrFail($venta->id_detalles_pedido);
        $envio = Envio::findOrFail($venta->id_envio);

        return view('venta.show', compact('venta', 'pedido', 'detallesPedido', 'envio'));
    }

    public function create()
    {
        $detallesPedidos = DetallesPedido::all();
        $envios = Envio::all();

        return view('venta.create', compact('detallesPedidos', 'envios'));
    }

    public function store(Request $request)
    {
        $venta = new Venta();
        $venta->id_detalles_pedido = $request->input('detalles_pedido');
        $venta->id_envio = $request->input('envio');
        $venta->save();
    
        // Actualizar la cantidad disponible del producto
        $detallesPedido = DetallesPedido::findOrFail($request->input('detalles_pedido'));
        $producto = $detallesPedido->producto;
        $cantidadVendida = $detallesPedido->cantidad;
    
        $producto->cantidad_disponible -= $cantidadVendida;
        $producto->save();
    
        $inventario = $producto->inventario;
        if ($inventario) {
            $inventario->cantidad -= $cantidadVendida;
            $inventario->save();
        }
    
        return redirect()->route('venta.index')->with('success', 'Venta realizada correctamente.');
    }
    

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $detallesPedidos = DetallesPedido::all();
        $envios = Envio::all();

        return view('venta.edit', compact('venta', 'detallesPedidos', 'envios'));
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);

        // Obtener el pedido asociado a la venta
        $pedido = Pedido::findOrFail($venta->id_pedido);

        // Cambiar el estado de envío a "enviado"
        $pedido->estado_envio = 'enviado';
        $pedido->save();

        // Obtener el detalle del pedido y el producto asociado
        $detallesPedido = DetallesPedido::findOrFail($venta->id_detalles_pedido);
        $producto = Producto::findOrFail($detallesPedido->id_producto);

        // Verificar si hay suficiente cantidad disponible para la venta
        if ($producto->cantidad_disponible >= $detallesPedido->cantidad) {
            // Actualizar la cantidad disponible del producto
            $producto->cantidad_disponible -= $detallesPedido->cantidad;
            $producto->save();

            // Actualizar la cantidad en el inventario
            $inventario = Inventario::where('producto_id', $producto->id)->first();
            $inventario->cantidad -= $detallesPedido->cantidad;
            $inventario->save();

            // Obtener el cliente del pedido
            $cliente = $pedido->cliente;

            // Obtener el envío del pedido
            $envio = $pedido->envio;

            return view('venta.show', compact('pedido', 'cliente', 'detallesPedido', 'producto', 'envio'))->with('success', 'Venta realizada correctamente.');
        } else {
            return redirect()->route('venta.index')->with('error', 'No hay suficiente cantidad disponible para realizar la venta.');
        }
    }

    public function destroy($id)
    {
        // Buscar la venta y eliminarla
        $venta = Venta::findOrFail($id);
        $venta->delete();

        // Obtener el detalle del pedido y el producto asociado
        $detallesPedido = DetallesPedido::findOrFail($venta->id_detalles_pedido);
        $producto = Producto::findOrFail($detallesPedido->id_producto);

        // Incrementar la cantidad disponible del producto
        $producto->cantidad_disponible += $detallesPedido->cantidad;
        $producto->save();

        // Obtener el inventario del producto
        $inventario = Inventario::where('producto_id', $producto->id)->first();

        // Incrementar la cantidad en el inventario
        $inventario->cantidad += $detallesPedido->cantidad;
        $inventario->save();

        // Redireccionar al índice de ventas con un mensaje de éxito
        return redirect()->route('venta.index')->with('success', 'Venta eliminada correctamente.');
    }
}