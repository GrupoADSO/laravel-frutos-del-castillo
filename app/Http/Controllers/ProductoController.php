<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Metodo para conseguir todos los productos segun la categoria

    public function index()
    {
        return view('paginas.productos');
    }

    public function obtenerProductosDeCategoria($categoria)
    {
        $productos = Producto::where('categoria_id', $categoria)->get();
        return response()->json($productos);
    }
}
