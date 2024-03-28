<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'imagen_1',
        'descuento',
        'size',
        'disponibilidad',
        'categoria_id',
        'created_at',
        'updated_at'
    ];

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }
    protected $attributes = [
        'disponibilidad' => 1,
    ];
}
