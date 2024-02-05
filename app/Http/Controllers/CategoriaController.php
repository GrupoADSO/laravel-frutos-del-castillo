<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Validator;
class CategoriaController extends Controller
{
    public function obtenerCategorias()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }



    public function index()
    {
        // $data = Categoria::all();
        return view('admin.categoria');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Categoria::all();
        return view('admin.crear-categoria', compact('data'));
    }

    /**  
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $validator = Validator::make($request->all(),[
            'nombre__categoria' => 'required|string',
            'foto__categoria' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        
        $dataCategoria = [
            'nombre' => $request->get('nombre__categoria'),
            'imagen' => $request->get('foto__categoria'),
        ];

        Categoria::create($dataCategoria);
        return redirect()->route('categorias');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Categoriaid = Categoria::find($id);
        return view('', compact('Categoriaid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $Categoriaid = Categoria::find($id);
        return view('', compact('Categoriaid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Categoriaid = Categoria::find($id);
        // Poner el nombre de los campos
        $validator = Validator::make($request->all(),[
            '' => 'required|string',
            '' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $Categoriaid->update([
            'nombre' => $request->get(''),
            'imagen' => $request->get(''),
        ]);

        return redirect()->route('categorias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $Categoriaid = Categoria::find($id);
        $Categoriaid->delete();
        return back();
    }    
}
