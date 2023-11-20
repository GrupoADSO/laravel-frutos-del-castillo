<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elementos_catalogo extends Model
{
    use HasFactory;


    protected $table = 'elementos_catalogo';

    protected $fillable = [
        'nombre',
        'n_mesa',
        'catologo_id'
    ];
}
