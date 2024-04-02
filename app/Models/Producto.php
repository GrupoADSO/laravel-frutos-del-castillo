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

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
