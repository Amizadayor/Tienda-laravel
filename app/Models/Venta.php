<?php

namespace App\Models;

use  App\Models\DetallesPedido;
use  App\Models\Envio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'venta';

    protected $fillable = [
        'id_detalles_pedido',
        'id_envio',
    ];

    public function detalles_pedido()
    {
        return $this->belongsTo(DetallesPedido::class, 'id_detalles_pedido');
    }

    public function envio()
    {
        return $this->belongsTo(Envio::class, 'id_envio');
    }
}
