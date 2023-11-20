<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compra';

    protected $fillable = [
        'fecha_hora',
        'iva',
        'costo_total',
        'comentario',
        'usuarios_id',
        'usuarios_reservas_id'
    ];
}
