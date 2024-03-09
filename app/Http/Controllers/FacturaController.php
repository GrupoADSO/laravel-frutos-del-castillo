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
