<?php

namespace App\Models;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    use HasFactory;
    protected $table = 'devolucion';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'pedido_id',
        'fecha_devolucion',
        'motivo',
        'estado_devolucion',
    ];

    protected $enumEstadoDevolucion = ['pendiente', 'aprobada', 'rechazada', 'completada'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function setEstadoDevolucionAttribute($value)
    {
        if (in_array($value, $this->enumEstadoDevolucion)) {
            $this->attributes['estado_devolucion'] = $value;
        } else {
            // Si se intenta establecer un estado no válido, se establece el valor predeterminado
            $this->attributes['estado_devolucion'] = 'pendiente';
        }
    }
}
