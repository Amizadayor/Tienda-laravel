<?php

namespace App\Models;

use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'categoria_id',
        'marca_id',
        'precio',
        'cantidad_disponible',
        'descripcion',
        'imagen',
    ];

    // Relación con la tabla Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    // Relación con la tabla Marca
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }
}
