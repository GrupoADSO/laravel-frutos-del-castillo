<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacturaController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->only('index'); // Solo se permiten estas acciones a los usuarios autenticados
    }

    public function index()
    {
        $userID = Auth::id();
        $direccion = Compra::where('user_id', $userID)->latest()->first();
        if($direccion){
            $direccionUser = $direccion->direccion;
        }else{
            $direccionUser=null;
        }
        $datos = Auth::user();
        return  view('paginas.factura', compact('datos','direccionUser'));
    }
}
