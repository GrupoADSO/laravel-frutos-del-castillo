<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Validator;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crear-slider');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'foto__slider' => 'required|mimes:png,jpg,jpeg,webp',
            'nombre__slider' => 'required|string|regex:/^[a-zA-Z\s]+$/',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $imagen = $request->file('foto__slider')->store('public/imagen-slider');
        $url = Storage::url($imagen);

        
        $dataCategoria = [
            'nombre' => $request->get('nombre__slider'),
            'ruta' => $url,
        ];

        Slider::create($dataCategoria);
        return redirect()->route('slider')->with('alertaDeAccion','El Slider fue  agregado correctamente!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $sliderId = Slider::find($id);
        return view('', compact(''));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $slider = Slider::find($id);
        return view('admin.edit-slider', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $sliderId = Slider::find($id);
        $validator = Validator::make($request->all(),[
            'foto__slider' => 'required|mimes:png,jpg,jpeg',
            'nombre__slider' => 'required|string|regex:/^[a-zA-Z\s]+$/',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $url = '';
        if($request->hasFile( "foto__slider" )) {
            $rutaImagen = str_replace('storage', 'public', $sliderId->ruta);
            Storage::delete($rutaImagen);

            $imagen = $request->file('foto__slider')->store('public/imagen-slider');
            $url = Storage::url($imagen);
        }
        
        $sliderId->update([
            'nombre' => $request->get('nombre__slider'),
            'ruta' => $url,
        ]);

        return redirect()->route('slider')->with('alertaDeAccion','El Slider fue actualizado correctamente!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruta = Slider::where('id', $id)->first();
        $rutaImagen = str_replace('storage', 'public', $ruta->ruta);
        Storage::delete($rutaImagen);

        $ruta->delete();
        return redirect()->route('slider')->with('alertaDeAccion','El Slider fue  eliminado correctamente!');
    }
}
