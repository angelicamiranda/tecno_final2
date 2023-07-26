<?php

namespace App\Http\Controllers;

use App\Models\PagoServicio;
use App\Models\Servicio;
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
        return view('pagoServicio.create',compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
