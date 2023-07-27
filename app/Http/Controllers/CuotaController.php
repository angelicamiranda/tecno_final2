<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use App\Models\Cuota;
use Illuminate\Http\Request;

class CuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $cuotas = Cuota::all();
       return view('cuota.index', compact('cuotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $creditos = Credito::get();
        $mensaje = "";
        return view('cuota.create',compact('creditos', 'mensaje'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|between:50,999999.50',
            'fecha' => 'required',
            'cargo_adicional' => 'required|numeric|between:0.50,99999.50'
        ]);
        $Monto = Cuota::where('credito_id', $request->credito_id)->sum('monto');
        $credito = Credito::find($request->credito_id);
        if($request->monto >= $credito->totalmontomensual){
            if($Monto < $credito->montofinal){
                $totalCuota = round($request->monto + $request->cargo_adicional,2);
                $cuota = Cuota::create([
                    'monto' => $request['monto'],
                    'fecha' => $request['fecha'],
                    'cargo_adicional' => $request['cargo_adicional'],
                    'total_cuota' => $totalCuota,
                    'credito_id' => $request['credito_id'],
                ]);
                $cuota->save();
                return redirect()->route('cuota.index');
            }else{
                $creditos = Credito::get();
                $mensaje = 'Error!. La suma de todas las cuotas de ese crédito es mayor a su total del monto mensual.';
                return view('cuota.create',compact('creditos', 'mensaje'));
            }
        }else{
            $creditos = Credito::get();
            $mensaje = 'Error!. El monto no tiene que ser menor que el monto final del crédito.';
            return view('cuota.create',compact('creditos', 'mensaje'));
        }

        return redirect()->route('cuota.index');
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
