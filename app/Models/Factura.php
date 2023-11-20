<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'factura';

    protected $fillable = [
        'cantidad_producto',
        'subtotal',
        'compra_id',
        'compra_usuarios_id',
        'compra_usuarios_reservas',
        'productos_id'
    ];
}
