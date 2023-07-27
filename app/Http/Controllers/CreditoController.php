<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Credito;
use App\Models\Cuota;
use App\Models\TasaInteres;
use Illuminate\Http\Request;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creditos = Credito::where('condicion',0)->get();
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
        $credito=Credito::findOrFail($id);
        return view('credito.show', compact('credito'));
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
    public function update(Request $request, Credito $credito)
    {
        if($credito->monto <> $request->monto){
            $request->validate([
                'monto' => 'required|numeric|between:50,999999.50',
            ]);
            $credito->monto = $request->monto;
            $tasa = TasaInteres::find($request->tasa_interes_id);
            $monto_mensual = round($request->monto / $request->plazo, 2);
            $total_monto_mensual = round(($request->monto * $tasa->porcentaje) + $monto_mensual + $request->cargo_adicional, 2);
            $monto_final = round($total_monto_mensual * $request->plazo, 2);

            $credito->montomensual = $monto_mensual;
            $credito->totalmontomensual = $total_monto_mensual;
            $credito->montofinal = $monto_final;
        }

        if($credito->motivo <> $request->motivo){
            $request->validate([
                'motivo' => 'required|string|max:50',
            ]);
            $credito->motivo = $request->motivo;
        }

        if($credito->plazo <> $request->plazo){
            $request->validate([
                'plazo' => 'required|numeric|between:1,50',
            ]);
            $credito->monto = $request->monto;
            $credito->plazo = $request->plazo;
            $tasa = TasaInteres::find($request->tasa_interes_id);
            $monto_mensual = round($request->monto / $request->plazo, 2);
            $total_monto_mensual = round(($request->monto * $tasa->porcentaje) + $monto_mensual + $request->cargo_adicional, 2);
            $monto_final = round($total_monto_mensual * $request->plazo, 2);

            $credito->montomensual = $monto_mensual;
            $credito->totalmontomensual = $total_monto_mensual;
            $credito->montofinal = $monto_final;
        }

        if($credito->dia_desembolso <> $request->dia_desembolso){
            $request->validate([
                'dia_desembolso' => 'required',
            ]);
            $credito->dia_desembolso = $request->dia_desembolso;
        }

        if($credito->periodo_gracia <> $request->periodo_gracia){
            $request->validate([
                'periodo_gracia' => 'required|string|max:20',
            ]);
            $credito->periodo_gracia = $request->periodo_gracia;
        }

        if($credito->cargo_adicional <> $request->cargo_adicional){
            $request->validate([
                'cargo_adicional' => 'required|numeric|between:0.50,99999.50',
            ]);
            $credito->monto = $request->monto;
            $credito->plazo = $request->plazo;
            $credito->cargo_adicional = $request->cargo_adicional;
            $tasa = TasaInteres::find($request->tasa_interes_id);
            $monto_mensual = round($request->monto / $request->plazo, 2);
            $total_monto_mensual = round(($request->monto * $tasa->porcentaje) + $monto_mensual + $request->cargo_adicional, 2);
            $monto_final = round($total_monto_mensual * $request->plazo, 2);

            $credito->montomensual = $monto_mensual;
            $credito->totalmontomensual = $total_monto_mensual;
            $credito->montofinal = $monto_final;
        }

        if($credito->tasa_interes_id <> $request->tasa_interes_id){
            $credito->monto = $request->monto;
            $credito->plazo = $request->plazo;
            $credito->cargo_adicional = $request->cargo_adicional;
            $credito->tasa_interes_id = $request->tasa_interes_id;
            $tasa = TasaInteres::find($request->tasa_interes_id);
            $monto_mensual = round($request->monto / $request->plazo, 2);
            $total_monto_mensual = round(($request->monto * $tasa->porcentaje) + $monto_mensual + $request->cargo_adicional, 2);
            $monto_final = round($total_monto_mensual * $request->plazo, 2);

            $credito->montomensual = $monto_mensual;
            $credito->totalmontomensual = $total_monto_mensual;
            $credito->montofinal = $monto_final;
        }

        if($credito->cliente_id <> $request->cliente_id){
            $credito->cliente_id = $request->cliente_id;
        }

        $credito->save();

        return redirect()->route('credito.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cuotas(Credito $credito)
    {
        $cuotas = Cuota::where('credito_id', $credito->id)->get();
        return view('cuota.index', compact('cuotas'));
    }
}
