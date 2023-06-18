<?php

namespace App\Models;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;
    protected $table = 'envio';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'pedido_id',
        'metodo_envio',
        'direccion_envio',
        'metodo_pago',
    ];

    protected $enumMetodoEnvio = ['estandar', 'express', 'recogida'];
    protected $enumMetodoPago = ['tarjeta', 'efectivo', 'transferencia'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function setMetodoEnvioAttribute($value)
    {
        if (in_array($value, $this->enumMetodoEnvio)) {
            $this->attributes['metodo_envio'] = $value;
        }
    }

    public function setMetodoPagoAttribute($value)
    {
        if (in_array($value, $this->enumMetodoPago)) {
            $this->attributes['metodo_pago'] = $value;
        }
    }
}
