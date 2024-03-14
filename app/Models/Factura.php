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

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'compra_id');
    }

    public function producto(){
        return $this->belongsTo(Factura::class,'producto_id');
    }

}

