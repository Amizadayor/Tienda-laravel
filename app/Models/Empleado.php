<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleado';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'puesto',
        'salario',
        'fecha_contratacion',
        'fecha_nacimiento',
        'departamento',
    ];
}
