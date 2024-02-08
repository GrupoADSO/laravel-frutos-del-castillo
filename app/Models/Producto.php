<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // protected $table = 'elementos_catalogo';

    protected $fillable = [
        'nombre',
        'precio',
        'tamanio',
        'descripcion',
        'imagen_1',
        'descuento',
        'subcategoria_id',
        'created_at',
        'updated_at'
    ];

    protected $attributes = [
        'disponibilidad' => 1,
        'imagen_2' => 'null',
    ];

}
