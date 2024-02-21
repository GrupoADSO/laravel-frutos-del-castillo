<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

    class UsuariosController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth',['only'=>['index']]);
    // }

    public function index(string $id)
    {
        // return $usuario;
        $usuario =  User::find($id);
        return view('paginas.perfil_usuario', compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $datosUsuario = User::find($id);
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario =  User::find($id);
        return view('admin.usuarios', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
        return redirect()->route('inicio-admin')->with('alertaDeAccion', 'El usuario fue actualizado correctamente');
    }

    public function destroy($id){
            $ruta = User::where('id', $id)->first();
            $ruta->delete();
            return redirect()->route('inicio-admin')->with('alertaDeAccion', 'El usuario fue eliminado correctamente');
    }

}
