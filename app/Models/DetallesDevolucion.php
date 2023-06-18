<?php

namespace App\Models;

use App\Models\Producto;
use App\Models\Devolucion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesDevolucion extends Model
{
    use HasFactory;
    protected $table = 'detalles_devolucion';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'devolucion_id',
        'producto_id',
        'cantidad_devuelta',
    ];

    public function devolucion()
    {
        return $this->belongsTo(Devolucion::class, 'devolucion_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
