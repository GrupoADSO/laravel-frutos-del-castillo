<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProductoController extends Controller
{
    // Metodo para conseguir todos los productos segun la categoria

    public function index()
    {
        return view('paginas.productos');
    }

    public function obtenerProductosDeCategoria($categoria)
    {
        $productos = Producto::where('subcategoria_id', $categoria)->get();
        return response()->json($productos);
    }



    public function mostrarProductos()
    {
        $productos = Producto::all();
        return view('admin.productos', compact('productos'));
    }

    public function create()
    {
        // $categorias=  Categoria::all();
        $subcategorias =  Subcategoria::all();
        return view('admin.crear-productos', compact('subcategorias'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre__producto' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'precio__producto' => 'required|numeric',
            'tamanio__producto' => 'required|string|regex:/^[a-zA-Z\s]+$/   ',
            'foto__producto' => 'required|mimes:png,jpg,jpeg ',
            'descuento__producto' => 'required|numeric',
            'descripcion__producto' => 'required|string',
            'seleccion__subcategoria' => 'required|numeric',
        ]);


        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $imagen = $request->file('foto__producto')->store('public/imagen-produto');
        $url = Storage::url($imagen);

        $dataProducto = [
            'nombre' => $request->get('nombre__producto'),
            'precio' => $request->get('precio__producto'),
            'tamanio' => $request->get('tamanio__producto'),
            'descripcion' => $request->get('descripcion__producto'),
            'imagen_1' => $url,
            'descuento' => $request->get('descuento__producto'),
            'subcategoria_id' => $request->get('seleccion__subcategoria'),
        ];

        Producto::create($dataProducto);
        return redirect()->route('productos');
    }



    public function edit(string $id)
    {
        $productoId = Producto::find($id);
        $subcategorias = Subcategoria::all();
        return view('admin.editar-productos', compact('productoId', 'subcategorias'));
    }

    public function update(Request $request, string $id)
    {

        // dd($request);    
        $dataProducto =  Producto::find($id);
        $validator = Validator::make($request->all(), [
            'nombre__producto' => 'required|string||regex:/^[a-zA-Z\s]+$/',
            'precio__producto' => 'required|numeric',
            'tamanio__producto' => 'required|string||regex:/^[a-zA-Z\s]+$/',
            'foto__producto' => 'required|mimes:png,jpg,jpeg',
            'descuento__producto' => 'required|numeric',
            'descripcion__producto' => 'required|string',
            'seleccion__subcategoria' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $url = '';
        if($request->hasFile( "foto__producto" )) {
            $rutaImagen = str_replace('storage', 'public', $dataProducto->imagen_1);
            Storage::delete($rutaImagen);

            $imagen = $request->file('foto__producto')->store('public/imagen-produto');
            $url = Storage::url($imagen);
        }

        //

        $dataProducto->update([
            'nombre' => $request->get('nombre__producto'),
            'precio' => $request->get('precio__producto'),
            'tamanio' => $request->get('tamanio__producto'),
            'descripcion' => $request->get('descripcion__producto'),
            'imagen_1' => $url,
            'descuento' => $request->get('descuento__producto'),
            'subcategoria_id' => $request->get('seleccion__subcategoria'),
        ]);

        return redirect()->route('productos');
    }


    public function destroy(String $id)
    {
        $ruta = Producto::where('id', $id)->first();
        $rutaImagen = str_replace('storage', 'public', $ruta->imagen_1);
        Storage::delete($rutaImagen);

        $ruta->delete();
        return redirect()->route('productos');
    }
}
