<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_hora',
        'iva',
        'costo_total',
        'comentario',
        'direccion',
        'user_id',
        'mesa_id',
        'created_at',
        'updated_at'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function factura()
    {
        return $this->hasOne(Factura::class, 'compra_id');
    }
    
    protected $attributes = [
        'iva' => 0,
        'estado' => 0
    ];

}