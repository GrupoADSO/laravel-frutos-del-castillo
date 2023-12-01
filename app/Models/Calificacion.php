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
        'producto_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
