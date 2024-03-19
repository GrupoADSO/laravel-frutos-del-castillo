<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'imagen',
        'created_at',
        'updated_at'
    ];

    public function producto(){
        return $this->hasMany(Producto::class,'categoria_id')->where('disponibilidad',1);
    }
}
