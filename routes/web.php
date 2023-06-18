<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PedidoController;
use App\Models\Envio;
use App\Models\DetallesPedido;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   // Rutas de categorias
    Route::resource('categoria', App\Http\Controllers\CategoriaController::class)->parameters(['categoria' => 'categoria']);
    Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');

    //Rutas de marcas
    Route::resource('marca', App\Http\Controllers\MarcaController::class)->parameters(['marca' => 'marca']);
    Route::post('/marca', [MarcaController::class, 'store'])->name('marca.store');

    //Rutas de clientes
    Route::resource('cliente', App\Http\Controllers\ClienteController::class)->parameters(['cliente' => 'cliente']);
    Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');

    //Rutas de empleados
    Route::resource('empleado', App\Http\Controllers\EmpleadoController::class)->parameters(['empleado' => 'empleado']);
    Route::post('/empleado', [EmpleadoController::class, 'store'])->name('empleado.store');

    //Rutas de productos
    Route::resource('producto', App\Http\Controllers\ProductoController::class)->parameters(['producto' => 'producto']);
    Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');

    //Rutas de inventario
    Route::resource('inventario', App\Http\Controllers\InventarioController::class)->parameters(['inventario' => 'inventario']);
    Route::post('/inventario', [InventarioController::class, 'store'])->name('inventario.store');

    //Rutas de pedidos
    Route::resource('pedido', App\Http\Controllers\PedidoController::class)->parameters(['pedido' => 'pedido']);
    Route::post('/pedido', [PedidoController::class, 'store'])->name('pedido.store');

    //Rutas de envios
    Route::resource('envio', App\Http\Controllers\EnvioController::class)->parameters(['envio' => 'envio']);
    Route::post('/envio', [App\Http\Controllers\EnvioController::class, 'store'])->name('envio.store');

    //Rutas de detalles de pedidos
    Route::resource('detalles_pedido', App\Http\Controllers\DetallesPedidoController::class)->parameters(['detalles_pedido' => 'detalles_pedido']);
    Route::post('/detalles_pedido', [App\Http\Controllers\DetallesPedidoController::class, 'store'])->name('detalles_pedido.store');

    //Rutas de ventas
    Route::resource('venta', App\Http\Controllers\VentaController::class)->parameters(['venta' => 'venta']);
    Route::post('/venta', [App\Http\Controllers\VentaController::class, 'store'])->name('venta.store');



});

require __DIR__.'/auth.php';
