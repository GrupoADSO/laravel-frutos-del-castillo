<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalificacionController extends Controller
{
    public function addLike($idProducto)
    {
        if (Auth::check()) {
            $user_id = auth()->id();
            $existeLike = Calificacion::where('producto_id', $idProducto)
                ->where('user_id', $user_id)
                ->exists();

            if ($existeLike) {
                return response()->json(['message' => 'Ya has dado like a este producto']);
            }

            $calificacion = new Calificacion();
            $calificacion->puntuacion = 1;
            $calificacion->producto_id = $idProducto;
            $calificacion->user_id = auth()->user()->id;
            $calificacion->save();
            return response()->json(['message' => 'Like recibido con éxito']);
        } else {
            return response()->json(['message' => 'No estas autenticado']);
        }
    }
    public function disLike($idProducto)
    {
        if (Auth::user()) {
            $eliminarLike = Calificacion::where('producto_id', $idProducto)->where('user_id', Auth::id());
            $eliminarLike->delete();
            return response()->json(['message' => 'Like quitado con éxito']);
        } else {
            return response()->json(['message' => 'No estas autenticado']);
        }
    }
}
