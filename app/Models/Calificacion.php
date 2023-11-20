<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $table = 'calificacion';

    protected $fillable = [
        'comentario',
        'puntuacion',
        'productos_id',
        'productos_categorias_id',
        'usuarios_id'
    ];
}
