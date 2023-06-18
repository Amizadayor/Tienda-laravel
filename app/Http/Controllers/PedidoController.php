<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        // Obtener todos los pedidos con sus productos y mostrarlos en una lista
        $pedidos = Pedido::with('detallesPedido.producto')->get();
        return view('pedido.index', compact('pedidos'));
    }

    public function create()
    {
        // Obtener la lista de clientes y empleados para mostrar en el formulario
        $clientes = Cliente::all();
        $empleados = Empleado::all();

        // Mostrar el formulario para crear un nuevo pedido
        return view('pedido.create', compact('clientes', 'empleados'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'cliente_id' => 'required|exists:cliente,id',
            'empleado_id' => 'required|exists:empleado,id',
            'fecha_pedido' => 'required|date',
            'estado_envio' => 'required|in:pendiente,enviado,entregado,cancelado',
            'subtotal' => 'required|numeric|min:0',
            'impuestos' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
        ]);

        // Calcular el total sumando el subtotal y aplicando el impuesto
        $subtotal = $request->input('subtotal');
        $impuestos = $request->input('impuestos');
        $total = $subtotal + ($subtotal * ($impuestos / 100));

        // Crear un nuevo pedido con los datos del formulario
        $pedido = Pedido::create([
            'cliente_id' => $request->input('cliente_id'),
            'empleado_id' => $request->input('empleado_id'),
            'fecha_pedido' => $request->input('fecha_pedido'),
            'estado_envio' => $request->input('estado_envio'),
            'subtotal' => $subtotal,
            'impuestos' => $impuestos,
            'total' => $total,
        ]);

        // Redirigir al usuario a la lista de pedidos con un mensaje de éxito
        return redirect()->route('pedido.index')->with('success', 'Pedido creado correctamente');
    }

    public function show(Pedido $pedido)
    {
        // Obtener los detalles del pedido con sus productos asociados
        $detallesPedido = $pedido->detallesPedido;
        
        foreach ($detallesPedido as $detalle) {
            $producto = $detalle->producto;
            // Hacer algo con el producto...
        }

        // Mostrar los detalles de un pedido específico
        return view('pedido.show', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        // Obtener la lista de clientes y empleados para mostrar en el formulario
        $clientes = Cliente::all();
        $empleados = Empleado::all();

        // Mostrar el formulario para editar un pedido específico
        return view('pedido.edit', compact('pedido', 'clientes', 'empleados'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        // Validar los datos del formulario
        $request->validate([
            'cliente_id' => 'required|exists:cliente,id',
            'empleado_id' => 'required|exists:empleado,id',
            'fecha_pedido' => 'required|date',
            'estado_envio' => 'required|in:pendiente,enviado,entregado,cancelado',
            'subtotal' => 'required|numeric|min:0',
            'impuestos' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
        ]);

        // Calcular el total sumando el subtotal y aplicando el impuesto
        $subtotal = $request->input('subtotal');
        $impuestos = $request->input('impuestos');
        $total = $subtotal + ($subtotal * ($impuestos / 100));

        // Actualizar los datos del pedido con los datos del formulario
        $pedido->update([
            'cliente_id' => $request->input('cliente_id'),
            'empleado_id' => $request->input('empleado_id'),
            'fecha_pedido' => $request->input('fecha_pedido'),
            'estado_envio' => $request->input('estado_envio'),
            'subtotal' => $subtotal,
            'impuestos' => $impuestos,
            'total' => $total,
        ]);

        // Redirigir al usuario a los detalles del pedido con un mensaje de éxito
        return redirect()->route('pedido.index', $pedido)->with('success', 'Pedido actualizado correctamente');
    }

    public function destroy(Pedido $pedido)
    {
        // Eliminar el pedido
        $pedido->delete();

        // Redirigir al usuario a la lista de pedidos con un mensaje de éxito
        return redirect()->route('pedido.index')->with('success', 'Pedido eliminado correctamente');
    }
}
