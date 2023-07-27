<?php

namespace App\Http\Controllers;

use App\Models\TasaInteres;
use Illuminate\Http\Request;

class TasaInteresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasas = TasaInteres::all();
        return view('tasaInteres.index', compact('tasas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasaInteres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:20',
            'descripcion' => 'required|string|max:50',
            'porcentaje' => 'required|numeric|between:0.01,0.99'
        ]);
        $tasa=TasaInteres::create([
            'tipo' => $request['tipo'],
            'descripcion' => $request['descripcion'],
            'porcentaje' => $request['porcentaje'],
        ]);
        $tasa->save();

        return redirect()->route('tasaInteres.index');
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
    public function edit(TasaInteres $tasa)
    {
        return view('tasaInteres.edit', compact('tasa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TasaInteres $tasa)
    {
        if($tasa->tipo <> $request->tipo){
            $request->validate([
                'tipo' => 'required|string|max:20',
            ]);
            $tasa->tipo = $request->tipo;
        }

        if($tasa->descripcion <> $request->descripcion){
            $request->validate([
                'descripcion' => 'required|string|max:50',
            ]);
            $tasa->descripcion = $request->descripcion;
        }
        if($tasa->porcentaje <> $request->porcentaje){
            $request->validate([
                'porcentaje' => 'required|numeric|between:0.01,0.99'
            ]);
            $tasa->porcentaje = $request->porcentaje;
        }
        $tasa->save();
        return redirect()->route('tasaInteres.edit', $tasa)->with('info', 'se actualizo el tasa correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TasaInteres $tasa)
    {
        $tasa->delete();
        return redirect()->route('tasaInteres.index');
    }
}
