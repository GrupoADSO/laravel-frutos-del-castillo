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
        'categoria_id',
        'producto_id',
        'created_at',
        'updated_at'
    ];
}
