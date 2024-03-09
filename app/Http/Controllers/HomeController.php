<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Compra;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{



    // trae los datos del slider y la categoria
    public function index()
    {
        $userID = Auth::id();
        $ultimaCompra = Compra::where('user_id', $userID)->latest()->first();

        if ($ultimaCompra) {
            $ultimaDireccion = $ultimaCompra->direccion;
        } else {
            $ultimaDireccion = 'Registra tu direccion';
        }

        Session::put('ultima_direccion', $ultimaDireccion);


        $categorias = Categoria::all();
        $sliders = Slider::all();
        return view('index', compact('categorias', 'sliders', ));
    }
}
