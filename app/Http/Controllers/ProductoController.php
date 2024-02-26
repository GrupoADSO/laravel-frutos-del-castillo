<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
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
        $categorias = Categoria::all();
        return view('paginas.productos', compact('categorias'));
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
        $categorias =  Categoria::all();
        return view('admin.crear-productos', compact('categorias'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre__producto' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'precio__producto' => 'required|numeric',
            'foto__producto' => 'required|mimes:png,jpg,jpeg ',
            'descuento__producto' => 'required|numeric',
            'descripcion__producto' => 'required|string',
            'seleccion__categoria' => 'required|numeric',
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
            'descripcion' => $request->get('descripcion__producto'),
            'imagen_1' => $url,
            'descuento' => $request->get('descuento__producto'),
            'categoria_id' => $request->get('seleccion__categoria'),
        ];

        Producto::create($dataProducto);
        return redirect()->route('admin-productos')->with('alertaDeAccion', 'El producto fue creado correctamente');
    }



    public function edit(string $id)
    {
        $productoId = Producto::find($id);
        $categorias = Categoria::all();
        return view('admin.editar-productos', compact('productoId', 'categorias'));
    }

    public function update(Request $request, string $id)
    {

        // dd($request);    
        $dataProducto =  Producto::find($id);
        $validator = Validator::make($request->all(), [
            'nombre__producto' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'precio__producto' => 'required|numeric',
            'foto__producto' => 'required|mimes:png,jpg,jpeg',
            'descuento__producto' => 'required|numeric',
            'descripcion__producto' => 'required|string',
            'seleccion__categoria' => 'required|numeric',
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
            'descripcion' => $request->get('descripcion__producto'),
            'imagen_1' => $url,
            'descuento' => $request->get('descuento__producto'),
            'categoria_id' => $request->get('seleccion__categoria'),
        ]);

        return redirect()->route('admin-productos')->with('alertaDeAccion', 'El producto fue aptualizado correctamente');
    }


    public function destroy(String $id)
    {
        $ruta = Producto::where('id', $id)->first();
        $rutaImagen = str_replace('storage', 'public', $ruta->imagen_1);
        Storage::delete($rutaImagen);

        $ruta->delete();
        return redirect()->route('admin-productos')->with('alertaDeAccion', 'El producto fue eliminado correctamente');
    }
}
