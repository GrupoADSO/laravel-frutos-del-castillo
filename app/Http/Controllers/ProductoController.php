<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Subcategoria;
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



    public function mostrarProductos(){
        return view('admin.productos');
    }

    public function create(){
        $categorias=  Categoria::all();
        $subcategorias=  Subcategoria::all();
        return view('admin.crear-productos', compact('subcategorias','categorias'));
    }


    public function store(Request $request){

        dd($request);
        
        $dataProducto = [
        'nombre' => $request->get('nombre__productos'),
        'precio'=> $request->get('precio__producto'),
        'tamanio'=> $request->get('tamanio__producto'),
        'descripcion'=> $request->get('descripcion__producto'),
        'imagen_1'=> $request->get('foto__producto'),
        'descuento'=> $request->get('descuento__producto'),
        'subcategoria'=> $request->get('seleccion__categoria'),
        'subcategoria'=> $request->get('seleccion__subcategoria'),
        ];

        Producto::created($dataProducto);
    }

    // public function edit(){
    //     return view('admin.editar-productos');
    // }

}
