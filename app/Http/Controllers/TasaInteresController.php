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
    public function edit(TasaInteres $tasaIntere)
    {
        return view('tasaInteres.edit', compact('tasaIntere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TasaInteres $tasaIntere)
    {
        if($tasaIntere->tipo <> $request->tipo){
            $request->validate([
                'tipo' => 'required|string|max:20',
            ]);
            $tasaIntere->tipo = $request->tipo;
        }

        if($tasaIntere->descripcion <> $request->descripcion){
            $request->validate([
                'descripcion' => 'required|string|max:50',
            ]);
            $tasaIntere->descripcion = $request->descripcion;
        }
        if($tasaIntere->porcentaje <> $request->porcentaje){
            $request->validate([
                'porcentaje' => 'required|numeric|between:0.01,0.99'
            ]);
            $tasaIntere->porcentaje = $request->porcentaje;
        }
        $tasaIntere->save();
        return redirect()->route('tasaInteres.edit', $tasaIntere)->with('info', 'se actualizo el tasa correctamente');
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
