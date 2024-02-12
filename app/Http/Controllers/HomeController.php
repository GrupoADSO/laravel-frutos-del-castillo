<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // trae los datos del slider y la categoria
    public function index()
    {
        $categorias = Categoria::all();
        $sliders = Slider::all();
        return view('index', compact('categorias','sliders'));
    }

    public function datosDashboard(){
        return view('admin.index');
    }
}
