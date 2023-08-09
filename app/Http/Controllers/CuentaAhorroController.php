<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\CuentaAhorro;
use Illuminate\Http\Request;
use App\Models\Transaccion;

class CuentaAhorroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuentas = CuentaAhorro::all();
        return view('cuentaAhorro.index', compact('cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::get();
        return view('cuentaAhorro.create',compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_apertura' => 'required|date',
            'tipo_moneda' => 'required',
            'fecha_apertura' => 'required'
        ]);
        $cuenta=CuentaAhorro::create([

            'fecha_apertura' => $request['fecha_apertura'],
            'tipo_moneda' => $request['tipo_moneda'],
            'interes' => $request['interes'],
            'cliente_id' => $request['cliente_id'],

        ]);

        $numerodecuenta = str_pad($cuenta->id, 4, '0', STR_PAD_LEFT);
        if($request->tipo_moneda == 'Bolivianos'){
            $cuenta->nro_cuenta = '1051 - ' . $numerodecuenta;
        }else{
            $cuenta->nro_cuenta = '1052 - '.$numerodecuenta;
        }

        $cuenta->monto = 0;
        $cuenta->save();

        return redirect()->route('cuentaAhorro.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cuentaAhorro=CuentaAhorro::findOrFail($id);
        return view('cuentaAhorro.show', compact('cuentaAhorro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clientes = Cliente::get();
        $cuenta = CuentaAhorro::findOrFail($id);
        return view('cuentaAhorro.edit',compact('cuenta','clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        $cuenta = CuentaAhorro::findOrFail($id);
        $cuenta->fecha_apertura = $request->fecha_apertura;
        $cuenta->tipo_moneda = $request->tipo_moneda;
        $cuenta->interes = $request->interes;
        $cuenta->cliente_id = $request->cliente_id;
        $numerodecuenta = str_pad($cuenta->id, 4, '0', STR_PAD_LEFT);
        if($request->tipo_moneda == 'Bolivianos'){
            $cuenta->nro_cuenta = '1051 - ' . $numerodecuenta;
        }else{
            $cuenta->nro_cuenta = '1052 - '.$numerodecuenta;
        }
        $cuenta->save();


        return redirect()->route('cuentaAhorro.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function movimientos(CuentaAhorro $cuentaAhorro)
    {
        $transacciones = Transaccion::where('cuenta_ahorro_id', $cuentaAhorro->id)->get();
        return view('transaccion.index', compact('transacciones'));
    }
}
