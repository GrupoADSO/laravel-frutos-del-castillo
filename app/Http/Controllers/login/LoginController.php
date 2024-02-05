<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{

    // METODO PARA CREAR USUARIOS EN EL LOGIN
    public function crearUsuario(Request $request)
    {
        $datosUsuario = $request->validate([
            'nombre' => 'required|min:4|max:30|string',
            'apellido' => 'required|min:4|max:30|string',
            'fecha_nacimiento'=>'required|date_format:Y-m-d',
            'email' => 'required|email',
            'celular' => 'required|numeric',
            'password' => 'required|min:4|max:15',
        ]);

        if ($datosUsuario['password'] !== $request->input('password_verification')) {
            return back()->withErrors([
                'password_verification' => 'Las contraseñas no coinciden',
            ])->onlyInput('password_verification');
        } else {
            $datosUsuario["password"] = Hash::make($request->input('password'));


            User::create($datosUsuario)->assignRole('usuario');

            return redirect()->route('inicio')->with('usuarioCreado', 'La creación de la cuenta se realizó con éxito. ¡Accede a tu cuenta ahora mismo!');
        }
    }

    // METODO PARA INICIAR SESION DENTRO DEL LOGIN
    public function iniciarSesion(Request $request)
    {
        $datosUsuario = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:15',
        ]);

        if (Auth::attempt($datosUsuario)) {
            $usuarioLogueado = Auth::user();
            $request->session()->put('usuarioLogueado', $usuarioLogueado);
            return redirect()->route('inicio')->with('logueado', 'A iniciado sesión correctamente '.$usuarioLogueado->nombre);
        }

        return back()->withErrors([
            'email' => 'Correo no valido',
            'password' => 'Contraseña incorrecta',
        ])->onlyInput('email', 'password');
    }

    // METODO PARA CERRAR SESION EN EL LOGIN
    public function finalizarSesionUsuario()
    {
        Auth::logout();

        session()->forget('usuarioLogueado');

        return redirect()->route('inicio')->with('finalizarSesion', 'Se cerro la sesión correctamente');
    }

}
