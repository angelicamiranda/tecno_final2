<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\CuentaAhorro;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

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
            'numero_cuenta' => 'numeric|unique:cuenta_ahorro',

        ]);
        $cuenta=CuentaAhorro::create([
            'numero_cuenta' => $request['numero_cuenta'],
            'fecha_apertura' => $request['fecha_apertura'],
            'tipo_moneda' => $request['tipo_moneda'],
            'interes' => $request['interes'],
            'cliente_id' => $request['cliente_id'],

        ]);

        $cuenta->monto = 0;
        $cuenta->save();

        return redirect()->route('cuentaAhorro.index');

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
