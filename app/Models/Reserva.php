<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    // protected $table = 'elementos_catalogo';

    protected $fillable = [
        'fecha_hora',
        'cantidad_personas',
        'comentario',
        'tipo_reserva',
        'usuario_id'

    ];
}
