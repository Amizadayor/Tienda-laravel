<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $table = 'marca';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado_marca'
    ];

    protected $enumEstadoMarca = ['activa', 'inactiva'];

    public function setEstadoMarcaAttribute($value)
    {
        if (in_array($value, $this->enumEstadoMarca)) {
            $this->attributes['estado_marca'] = $value;
        }
        else {
            // Si se intenta establecer un estado no válido, se establece el valor predeterminado
            $this->attributes['estado_marca'] = 'inactiva';
        }
    }
}
