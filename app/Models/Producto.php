<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'imagen_1',
        'descuento',
        'categoria_id',
        'created_at',
        'updated_at'
    ];

    protected $attributes = [
        'disponibilidad' => 1,
    ];


}
