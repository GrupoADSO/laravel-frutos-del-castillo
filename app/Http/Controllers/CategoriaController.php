<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class CategoriaController extends Controller
{
    // cambiar la consulta || el boton de la categoria debe ser un formulario con el id
    public function obtenerCategorias()
    {
        $categorias = Categoria::all();
        return view('paginas.productos', compact('categorias'));
    }


    public function obtenerSubcategorias()
    {
        $subcategorias = Subcategoria::all();
        return response()->json($subcategorias);
    }



    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categoria', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crear-categoria');
    }

    /**  
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->toArray());
        $validator = Validator::make($request->all(), [
            'nombre__categoria' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'foto__categoria' => 'required|mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $imagen = $request->file('foto__categoria')->store('public/imagen-categoria');
        $url = Storage::url($imagen);

        $dataCategoria = [
            'nombre' => $request->get('nombre__categoria'),
            'imagen' => $url,
        ];

        Categoria::create($dataCategoria);
        return redirect()->route('categorias')->with('alertaDeAccion', 'La categoria fue creada correctamente');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $Categoriaid = Categoria::find($id);
        return view('admin.editar-categoria', compact('Categoriaid'));
    }

    /**
     * Update the specified resource in storage.
     */

    /*se debe de borrar la foto*/
    public function update(Request $request, string $id)
    {
        // dd($request);
        // dd($request->toArray());
        $Categoriaid = Categoria::find($id);
        $validator = Validator::make($request->all(), [
            'cambiar__nombre__cate' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'cambiar__foto__cate' => 'required|mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $url = '';
        if($request->hasFile( "cambiar__foto__cate" )) {
            $rutaImagen = str_replace('storage', 'public', $Categoriaid->imagen);
            Storage::delete($rutaImagen);

            $imagen = $request->file('cambiar__foto__cate')->store('public/imagen-categoria');
            $url = Storage::url($imagen);
        }

        $Categoriaid->update([
            'nombre' => $request->get('cambiar__nombre__cate'),
            'imagen' => $url,
        ]);

        return redirect()->route('categorias')->with('alertaDeAccion', 'La categoria fue actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Categoriaid = Categoria::find($id);
        $Categoriaid->delete();
        return redirect()->route('categorias')->with('alertaDeAccion', 'La categoria fue eliminada correctamente');
    }
}
