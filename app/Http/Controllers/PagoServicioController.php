<?php

namespace App\Http\Controllers;

use App\Models\PagoServicio;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Http\Request;

class PagoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = PagoServicio::all();
        return view('pagoServicio.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicios = Servicio::get();
        $users = User::all();
        return view('pagoServicio.create',compact('servicios', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|between:50,999999.50',
            'fecha' => 'required',
            'codigo_cliente' => 'required|unique:pago_servicio'
              ]);

         $pagoServicio = PagoServicio::create([
                    'monto' => $request['monto'],
                    'codigo_cliente' => $request['codigo_cliente'],
                    'monto' => $request['monto'],
                    'fecha' => $request['fecha'],
                    'usuario_id' => $request['usuario_id'],
                    'servicio_id' => $request['servicio_id'],
                ]);
                $pagoServicio->save();
                return redirect()->route('pagoServicio.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pago=PagoServicio::findOrFail($id);
        return view('pagoServicio.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PagoServicio $pago)
    {
        $servicios = Servicio::get();
        return view('pagoServicio.edit',compact('pago', 'servicios'));
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
