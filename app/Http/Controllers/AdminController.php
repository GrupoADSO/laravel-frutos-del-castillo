<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = $request->get('buscar_usuario');
        $totalUsuarios = User::count();
        $totalProductos = Producto::count();
        $totalCompras = Compra::count();

        $datosUsuarios = User::where('nombre', 'LIKE', '%' . $texto . '%')
            ->orWhere('apellido', 'LIKE', '%' . $texto . '%')
            ->get();
            
            $mensaje = '';
        if ($datosUsuarios->isEmpty()) {
            $mensaje = 'No se encontraron usuarios.';
        }

        return view('admin.index', compact('datosUsuarios', 'mensaje', 'texto', 'totalUsuarios','totalProductos','totalCompras'));
    }

  
    /**
     * Show the form for creating a new resource.
     */
    public function edit()
    {
        $datosAdmin = Auth::user();
        return view('admin.perfil-admin', compact('datosAdmin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosUsuario =  User::find($id);
        $validator = Validator::make($request->all(), [
            'nombre_persona' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'apellido_persona' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'telefono_persona' => 'required|numeric',
            'nacimiento_persona' => 'required|date',
            'email_persona' => 'required|email',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $datosUsuario->update([
            'nombre'=>$request->get('nombre_persona'),
            'apellido'=>$request->get('apellido_persona'),
            'celular'=>$request->get('telefono_persona'),
            'fechaNacimiento'=>$request->get('nacimiento_persona'),
        ]);
        return redirect()->route('inicio-admin')->with('alertaDeAccion', 'Tus datos fueron actualizado correctamente');
    }


}
