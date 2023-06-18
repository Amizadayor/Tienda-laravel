<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        // Obtener todos los empleados y mostrarlos en una lista
        $empleados = Empleado::all();
        return view('empleado.index', compact('empleados'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo empleado
        return view('empleado.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'nullable',
            'telefono' => 'nullable',
            'email' => 'nullable|email',
            'puesto' => 'nullable',
            'salario' => 'nullable|numeric',
            'fecha_contratacion' => 'nullable|date',
            'fecha_nacimiento' => 'nullable|date',
            'departamento' => 'nullable',
        ]);

        // Crear un nuevo empleado con los datos del formulario
        Empleado::create($request->all());

        // Redirigir al usuario a la lista de empleados con un mensaje de éxito
        return redirect()->route('empleado.index')->with('success', 'Empleado creado correctamente');
    }

    public function show(Empleado $empleado)
    {
        // Mostrar los detalles de un empleado específico
        return view('empleado.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        // Mostrar el formulario para editar un empleado específico
        return view('empleado.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'nullable',
            'telefono' => 'nullable',
            'email' => 'nullable|email',
            'puesto' => 'nullable',
            'salario' => 'nullable|numeric',
            'fecha_contratacion' => 'nullable|date',
            'fecha_nacimiento' => 'nullable|date',
            'departamento' => 'nullable',
        ]);

        // Actualizar los datos del empleado con los datos del formulario
        $empleado->update($request->all());

        // Redirigir al usuario a los detalles del empleado con un mensaje de éxito
        return redirect()->route('empleado.index', $empleado)->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy(Empleado $empleado)
    {
        // Eliminar el empleado
        $empleado->delete();

        // Redirigir al usuario a la lista de empleados con un mensaje de éxito
        return redirect()->route('empleado.index')->with('success', 'Empleado eliminado correctamente');
    }
}
