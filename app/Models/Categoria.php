<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado_categoria',
        'created_at',
        'updated_at'
    ];

    protected $enumEstadoCategoria = ['activa', 'inactiva'];

    public function setEstadoCategoriaAttribute($value)
    {
        if (in_array($value, $this->enumEstadoCategoria)) {
            $this->attributes['estado_categoria'] = $value;
        }
        else {
            // Si se intenta establecer un estado no válido, se establece el valor predeterminado
            $this->attributes['estado_categoria'] = 'inactiva';
        }
    }
}
