<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Validator;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.mostrar-sliders');
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
            '' => 'required|string',
            '' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        
        $dataCategoria = [
            'nombre' => $request->get(''),
            'ruta' => $request->get(''),
        ];

        Slider::create($dataCategoria);
        return redirect()->route('slider');
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
        $sliderId = Slider::find($id);
        return view('', compact(''));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $sliderId = Slider::find($id);
        $validator = Validator::make($request->all(),[
            '' => 'required|string',
            '' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        
        $sliderId->update([
            'nombre' => $request->get(''),
            'ruta' => $request->get(''),
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sliderId = Slider::find($id);
        $sliderId->delete();
        return redirect()->route('slider');
    }
}
