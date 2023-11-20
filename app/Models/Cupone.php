<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupone extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'numero',
        'porcentaje',
        'cantidad',
        'fecha_inicio',
        'fecha_fin',
        'imagen_1',
        'categorias_id',
        'productos_id',
        'productos_categorias_id',
    ];
}
