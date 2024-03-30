<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UsuariosController extends Controller
{

    public function __construct(){
        $this->middleware('role:super_admin',['except'=>['index','store']]);
    }

    public function index()
    {
        try {
            $userId = Auth::id();
            $usuario =  User::find($userId);
            $historialDeCompras = Compra::where('user_id', $userId)
            ->where('estado', 1)
            ->with('factura')
            ->get();
        
            // dd($historialDeCompras);
            
            return view('paginas.perfil_usuario', compact('usuario', 'historialDeCompras'));
        } catch (\Throwable $th) {
            return 'error en la carga de datos ' . $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        try {
            $idUser = decrypt($id);
            $datosUsuario = User::find($idUser);
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|regex:/^[a-zA-Z\s]+$/',
                'apellido' => 'required|regex:/^[a-zA-Z\s]+$/',
                'telefono' => 'required|numeric',
            ]);


            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $datosUsuario->update([
                'nombre' => $request->get('nombre'),
                'apellido' => $request->get('apellido'),
                'celular' => $request->get('telefono'),
            ]);

            return back()->with('usuarioEditado', 'Tus datos fueron actualizados');
        } catch (\Throwable $th) {
            return 'error en la carga de datos';
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            // $idUser = decrypt($id);
            $usuario =  User::find($id);
            return view('admin.usuarios', compact('usuario'));
        } catch (\Throwable $th) {
            return 'error en la carga de datos';
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $idUser = decrypt($id);
            $datosUsuario =  User::find($idUser);
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
            return redirect()->route('inicio-admin')->with('alertaDeAccion', 'El usuario fue actualizado correctamente');
        } catch (\Throwable $th) {
            return 'error en la carga de datos';
        }
    }

    public function destroy($id)
    {
        try {
            $idUsuarioDesencriptado = decrypt($id);
            $ruta = User::where('id', $idUsuarioDesencriptado)->first();
            $ruta->delete();
            return redirect()->route('inicio-admin')->with('alertaDeAccion', 'El usuario fue eliminado correctamente');
        } catch (\Throwable $th) {
            return 'error en la carga de datos';
        }
    }
}
