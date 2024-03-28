<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use Illuminate\Http\Request;
use Validator;

class InformacionController extends Controller
{
    public function __construct(){
        $this->middleware('role:super_admin',['except'=>['index','informacionLegal']]);
    }


    public function informacionLegal(){
        $informacionEmpresarialMision = Informacion::select('nombre','descripcion')
                                            ->where('nombre','LIKE', '%mision%')
                                            ->get();
        $informacionEmpresarialVision = Informacion::select('nombre','descripcion')
                                            ->where('nombre','LIKE', '%vision%')
                                            ->get();
        return view('paginas.sobre_nosotros',compact('informacionEmpresarialMision','informacionEmpresarialVision'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informacionEmpresarial = Informacion::all();
        return view('admin.informacion', compact('informacionEmpresarial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.informacion-crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'titulo' => ['required', 'regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z$#(). ]*$/'],
                'descripcion' => ['required', 'regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z$#(). ]*$/'],
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            
            $nuevaInformacion = [
                'nombre' => $request->get('titulo'),
                'descripcion' => $request->get('descripcion'),
            ];
            Informacion::create($nuevaInformacion);
            return redirect()->route('informacion');
            
        } catch (\Throwable $th) {
            return 'error en la carga de datos';
        }
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
        try {
            $desencriptarId = decrypt($id);
            $informacion = Informacion::find($desencriptarId);
            return view('admin.informacion-editar',compact('informacion'));
        } catch (\Throwable $th) {
            return 'error en la carga de datos'.$th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $desencriptarId = decrypt($id);
            $actualizarInfoEmpresarial = Informacion::find($desencriptarId);
            $validar = Validator::make($request->all(), [
                'titulo' => ['required', 'regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z$#(). ]*$/'],
                'descripcion' => ['required', 'regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z$#(). ]*$/'],
            ]);

            if ($validar->fails()) {
                return back()
                    ->withErrors($validar)
                    ->withInput();
            }

            $actualizarInfoEmpresarial->update([
                'nombre' => $request->get('titulo'),
                'descripcion' => $request->get('descripcion'),
            ]);
            return redirect()->route('informacion');
        } catch (\Throwable $th) {
            return 'error en la carga de datos '.$th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $idInformacion = decrypt($id);
            $informacion = Informacion::where('id', $idInformacion)->first();
            $informacion->delete();
            return redirect()->route('informacion');
        } catch (\Throwable $th) {
            return 'error al tratar de eliminar los productos';
        }
    }
}
