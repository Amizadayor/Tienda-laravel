<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\DetallesPedido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'cliente_id',
        'empleado_id',
        'fecha_pedido',
        'estado_envio',
        'subtotal',
        'impuestos',
        'total',
    ];

    protected $enumEstadoEnvio = ['pendiente', 'enviado', 'entregado', 'cancelado'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function detallesPedido()
    {
        return $this->hasMany(DetallesPedido::class);
    }

    public function setEstadoEnvioAttribute($value)
    {
        if (in_array($value, $this->enumEstadoEnvio)) {
            $this->attributes['estado_envio'] = $value;
        } else {
            // Si se intenta establecer un estado no válido, se establece el valor predeterminado
            $this->attributes['estado_envio'] = 'pendiente';
        }
    }
}
