<?php

namespace App\Models;

use App\Models\Producto;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesPedido extends Model
{
    use HasFactory;
    protected $table = 'detalles_pedido';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
    ];

    // Relación con la tabla Pedido
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    // Relación con la tabla Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
