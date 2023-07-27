<?php

namespace App\Http\Controllers;

use App\Models\CuentaAhorro;
use App\Models\Transaccion;
use Illuminate\Http\Request;
use App\Models\Cliente;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transacciones = Transaccion::all();
        return view('transaccion.index', compact('transacciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cuentas = CuentaAhorro::all();
        $mensaje = "";
        return view('transaccion.create',compact('cuentas', 'mensaje'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $monto = $request->monto;
        $cuenta = CuentaAhorro::find($request->cuenta_ahorro_id);
        $trans = $request->tipo_transaccion;
        if($trans == 'Egreso'){
            if($monto > $cuenta->monto){
                $cuentas = CuentaAhorro::all();
                $mensaje = 'Error!. La cuenta no tiene suficiente dinero.';
                return view('transaccion.create',compact('cuentas', 'mensaje'));
            }else {
                $cuenta->monto = $cuenta->monto - $monto;
            }
        }else{
            $cuenta->monto = $cuenta->monto + $monto;
        }


        $transaccion=Transaccion::create([
            'monto' => $request['monto'],
            'fecha' => $request['fecha'],
            'tipo_transaccion' => $request['tipo_transaccion'],
            'cuenta_ahorro_id' => $request['cuenta_ahorro_id'],


        ]);
        $transaccion->save();
        $cuenta->save();
        return redirect()->route('transaccion.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaccion=Transaccion::findOrFail($id);
        return view('transaccion.show', compact('transaccion'));
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
