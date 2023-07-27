<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Credito;
use App\Models\TasaInteres;
use Illuminate\Http\Request;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creditos = Credito::all();
        return view('credito.index', compact('creditos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tasas = TasaInteres::get();
        $clientes = Cliente::get();
        return view('credito.create',compact('tasas', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|between:50,999999.50',
            'motivo' => 'required|string|max:50',
            'plazo' => 'required|numeric|between:1,50',
            'desembolso' => 'required',
            'periodo_gracia' => 'required|string|max:20',
            'cargo_adicional' => 'required|numeric|between:0.50,99999.50',
        ]);
        $tasa = TasaInteres::find($request->tasa_interes_id);
        $monto_mensual = round($request->monto / $request->plazo, 2);
        $total_monto_mensual = round(($request->monto * $tasa->porcentaje) + $monto_mensual + $request->cargo_adicional, 2);
        $monto_final = round($total_monto_mensual * $request->plazo, 2);
        $credito=Credito::create([
            'monto' => $request['monto'],
            'motivo' => $request['motivo'],
            'plazo' => $request['plazo'],
            'dia_desembolso' => $request['desembolso'],
            'periodo_gracia' => $request['periodo_gracia'],
            'cargo_adicional' => $request['cargo_adicional'],
            'montomensual' => $monto_mensual,
            'totalmontomensual' => $total_monto_mensual,
            'montofinal' => $monto_final,
            'estado' => "Solicitado",
            'tasa_interes_id' => $request['tasa_interes_id'],
            'cliente_id' => $request['cliente_id'],
        ]);
        $credito->save();

        return redirect()->route('credito.index');
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
    public function edit(Credito $credito)
    {
        $tasas = TasaInteres::get();
        $clientes = Cliente::get();
        return view('credito.edit',compact('credito', 'tasas', 'clientes'));
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
