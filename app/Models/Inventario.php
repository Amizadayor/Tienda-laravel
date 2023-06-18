<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $table = 'inventario';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'producto_id',
        'cantidad',
        'ultima_actualizacion',
    ];

    // Relación con la tabla Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
