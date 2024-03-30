<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:super_admin', ['except' => ['index', 'mostrarProductos']]);
    }

    public function index()
    {
        $categorias = Categoria::has('producto')->with('producto.calificaciones')->get();
        return view('paginas.productos', compact('categorias'));
    }

    public function mostrarProductos()
    {
        $productos = Producto::with('calificaciones')->get();
        
        return view('admin.productos', compact('productos'));
    }

    public function create()
    {
        $categorias =  Categoria::all();
        return view('admin.crear-productos', compact('categorias'));
    }


    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre__producto' => ['required', 'regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z$#(). ]*$/'],
                'precio__producto' => 'required|numeric',
                'foto__producto' => 'required|mimes:png,jpg,jpeg ',
                'descuento__producto' => 'required|numeric',
                'tamanio__producto' => ['required', 'regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z$#(). ]*$/'],
                'descripcion__producto' => ['required', 'regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z$#(). ]*$/'],
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
                'size' => $request->get('tamanio__producto'),
                'descuento' => $request->get('descuento__producto'),
                'categoria_id' => $request->get('seleccion__categoria'),
            ];

            Producto::create($dataProducto);
            return redirect()->route('admin-productos')->with('alertaDeAccion', 'El producto fue creado correctamente');
        } catch (\Throwable $th) {
            return 'error al subir la carga de datos ' . $th;
        }
    }



    public function edit(string $id)
    {
        try {
            $idProducto = decrypt($id);
            $productoId = Producto::find($idProducto);
            $categorias = Categoria::all();
            return view('admin.editar-productos', compact('productoId', 'categorias'));
        } catch (\Throwable $th) {
            return 'error al subir la carga de datos';
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $idProducto = decrypt($id);
            $dataProducto =  Producto::find($idProducto);
            $validator = Validator::make($request->all(), [
                'nombre__producto' => ['required', 'regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z$#(). ]*$/'],
                'precio__producto' => 'required|numeric',
                'foto__producto' => 'nullable|mimes:png,jpg,jpeg',
                'descuento__producto' => 'required|numeric',
                'tamanio__producto' => ['required', 'regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z$#(). ]*$/'],
                'descripcion__producto' => ['required', 'regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z$#(). ]*$/'],
                'disponibilidad' => 'required|numeric',
                'seleccion__categoria' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $url = '';
            if ($request->hasFile("foto__producto")) {
                $rutaImagen = str_replace('storage', 'public', $dataProducto->imagen_1);
                Storage::delete($rutaImagen);

                $imagen = $request->file('foto__producto')->store('public/imagen-produto');
                $url = Storage::url($imagen);
            }
            if ($url){
                $disponible = $request->get('disponibilidad');
                $dataProducto->update([
                    'nombre' => $request->get('nombre__producto'),
                    'precio' => $request->get('precio__producto'),
                    'descripcion' => $request->get('descripcion__producto'),
                    'size' => $request->get('tamanio__producto'),
                    'disponibilidad' => $disponible,
                    'imagen_1' => $url,
                    'descuento' => $request->get('descuento__producto'),
                    'categoria_id' => $request->get('seleccion__categoria'),
                ]);
                
            }else{
                $disponible = $request->get('disponibilidad');
                $dataProducto->update([
                    'nombre' => $request->get('nombre__producto'),
                    'precio' => $request->get('precio__producto'),
                    'descripcion' => $request->get('descripcion__producto'),
                    'size' => $request->get('tamanio__producto'),
                    'disponibilidad' => $disponible,
                    'descuento' => $request->get('descuento__producto'),
                    'categoria_id' => $request->get('seleccion__categoria'),
                ]);

            }


            return redirect()->route('admin-productos')->with('alertaDeAccion', 'El producto fue aptualizado correctamente');
        } catch (\Throwable $th) {
            return 'error al subir la carga de datos';
        }
    }


    public function destroy(String $id)
    {
        try {
            $idProducto = decrypt($id);
            $datosProductos = Producto::where('id', $idProducto)->first();
            if ($datosProductos->delete()) {
                $rutaImagen = str_replace('storage', 'public', $datosProductos->imagen_1);
                Storage::delete($rutaImagen);
                return redirect()->route('admin-productos')->with('alertaDeAccion', 'El producto fue eliminado correctamente');
            }
        } catch (\Throwable $th) {
            return 'error al tratar de eliminar los productos';
        }
    }
}
