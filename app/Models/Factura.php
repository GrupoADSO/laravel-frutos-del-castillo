<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad_producto',
        'subtotal',
        'precio',
        'compra_id',
        'producto_id',
        'created_at',
        'updated_at'
    ];
}
