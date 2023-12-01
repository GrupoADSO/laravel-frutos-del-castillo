<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_hora',
        'cantidad_personas',
        'comentario',
        'tipo_reserva',
        'user_id',
        'mesa_id',
        'tipo_reserva_id',
        'created_at',
        'updated_at'
    ];
}
