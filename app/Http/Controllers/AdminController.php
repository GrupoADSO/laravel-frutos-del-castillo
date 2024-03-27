<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        $this->middleware('role:super_admin')->except(['index','edit']);
    }
    public function index(Request $request)
    {
        $texto = $request->get('buscar_usuario');
        $totalUsuarios = User::count();
        $totalProductos = Producto::count();
        $totalCompras = Compra::count();
        $mesActual = Carbon::now()->format('m');
        $gananciasDelMes = Compra::whereMonth('created_at', $mesActual)->sum('costo_total');

        $datosUsuarios = User::where('nombre', 'LIKE', '%' . $texto . '%')
            ->orWhere('apellido', 'LIKE', '%' . $texto . '%')
            ->paginate(10);
        $mensaje = '';
        if ($datosUsuarios->isEmpty()) {
            $mensaje = 'No se encontraron usuarios.';
        }

        return view('admin.index', compact('datosUsuarios', 'mensaje', 'texto', 'totalUsuarios', 'totalProductos', 'totalCompras', 'gananciasDelMes'));
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
        $descencriptarId = decrypt($id);
        $datosUsuario =  User::find($descencriptarId);
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
            'nombre' => $request->get('nombre_persona'),
            'apellido' => $request->get('apellido_persona'),
            'celular' => $request->get('telefono_persona'),
            'fechaNacimiento' => $request->get('nacimiento_persona'),
        ]);
        return redirect()->route('inicio-admin')->with('alertaDeAccion', 'Tus datos fueron actualizado correctamente');
    }
}
