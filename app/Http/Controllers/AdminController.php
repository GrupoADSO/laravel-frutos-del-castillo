<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = $request->get('buscar_usuario');
        $DatosUsuarios = User::where('nombre', 'LIKE', '%' . $texto . '%')
            ->orWhere('apellido', 'LIKE', '%' . $texto . '%')
            ->get();

        if ($DatosUsuarios->isEmpty()) {
            $mensaje = 'No se encontraron usuarios.';
        } else {
            $mensaje = '';
        }

        return view('admin.index', compact('DatosUsuarios', 'mensaje', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
