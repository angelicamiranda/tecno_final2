<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Credito;
use App\Models\Cuota;
use App\Models\TasaInteres;
use Illuminate\Http\Request;
use Symfony\Component\Console\Descriptor\JsonDescriptor;

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
        $clientes = Cliente::get();
        return view('credito.create',compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|between:50,999999.50',
            'destino' => 'required|string|max:250',
            'plazo' => 'required|numeric|between:0,50',
            'periodo_gracia' => 'required|string|max:20',
            'cargo_adicional' => 'required|numeric|between:0,99999.50',
        ]);


        $tasaget = TasaInteres::where('descripcion', $request->tipo)->where('tipo', $request->forma_pago)->first();


        $tasa = TasaInteres::find($tasaget->id);
        $monto_mensual = round($request->monto / $request->plazo, 2);
        $total_monto_mensual = round(($request->monto * $tasa->porcentaje) + $monto_mensual + $request->cargo_adicional, 2);
        $monto_final = round($total_monto_mensual * $request->plazo, 2);
        $credito=Credito::create([
            'monto' => $request['monto'],
            'destino' => $request['destino'],
            'plazo' => $request['plazo'],
            'periodo_gracia' => $request['periodo_gracia'],
            'cargo_adicional' => $request['cargo_adicional'],
            'montomensual' => $monto_mensual,
            'totalmontomensual' => $total_monto_mensual,
            'montofinal' => $monto_final,
            'estado' => "Solicitado",

            'cliente_id' => $request['cliente_id'],
        ]);
        $credito->tasa_interes_id = $tasa->id;
        $credito->tipo = $request->tipo;
        $credito->forma_pago = $request->forma_pago;
        $credito->save();

        return redirect()->route('credito.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $credito=Credito::findOrFail($id);
        $cant = Cuota::where('credito_id', $credito->id)->count('credito_id');
        $cuotaFaltante = $credito->plazo - $cant;
        return view('credito.show', compact('cant','credito', 'cuotaFaltante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tasas = TasaInteres::get();
        $clientes = Cliente::get();
        $credito = Credito::findOrFail($id);
        return view('credito.edit',compact('credito', 'tasas', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $credito = Credito::findOrFail($id);
        if($credito->monto <> $request->monto){
            $request->validate([
                'monto' => 'required|numeric|between:50,999999.50',
            ]);
            $credito->monto = $request->monto;
            $tasaget = TasaInteres::where('descripcion', $request->tipo)->where('tipo', $request->forma_pago)->first();
            $tasa = TasaInteres::find($tasaget->id);
            $monto_mensual = round($request->monto / $request->plazo, 2);
            $total_monto_mensual = round(($request->monto * $tasa->porcentaje) + $monto_mensual + $request->cargo_adicional, 2);
            $monto_final = round($total_monto_mensual * $request->plazo, 2);

            $credito->montomensual = $monto_mensual;
            $credito->totalmontomensual = $total_monto_mensual;
            $credito->montofinal = $monto_final;
        }

        if($credito->destino <> $request->destino){
            $request->validate([
                'destino' => 'required|string|max:100',
            ]);
            $credito->destino = $request->destino;
        }

        if($credito->plazo <> $request->plazo){
            $request->validate([
                'plazo' => 'required|numeric|between:0,50',
            ]);
            $credito->monto = $request->monto;
            $credito->plazo = $request->plazo;
            $tasaget = TasaInteres::where('descripcion', $request->tipo)->where('tipo', $request->forma_pago)->first();
            $tasa = TasaInteres::find($tasaget->id);
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
                'cargo_adicional' => 'required|numeric|between:0,99999.50',
            ]);
            $credito->monto = $request->monto;
            $credito->plazo = $request->plazo;
            $credito->cargo_adicional = $request->cargo_adicional;

            $credito->tipo = $request->tipo;
            $credito->forma_pago = $request->forma_pago;

            $tasaget = TasaInteres::where('descripcion', $request->tipo)->where('tipo', $request->forma_pago)->first();
            $tasa = TasaInteres::find($tasaget->id);
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
            $tasaget = TasaInteres::where('descripcion', $request->tipo)->where('tipo', $request->forma_pago)->first();
            $tasa = TasaInteres::find($tasaget->id);
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

    public function estado(Request $request, Credito $credito)
    {
        $credito->dia_desembolso = $request->dia_desembolso;
        $credito->estado = $request->estado;
        $credito->save();


       $creditos =Credito::where('condicion',0)->get();
        return view('credito.index', compact('creditos'));
    }

    public function estadoview(Credito $credito)
    {
        $tasas = TasaInteres::get();
        $clientes = Cliente::get();
        return view('credito.estado',compact('credito'));
    }



}
