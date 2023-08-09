<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente=Cliente::create([
            'correo' => $request['correo'],
            'ci' => $request['ci'],
            'nombre' => $request['nombre'],
            'lugar_nac' => $request['lugar_nac'],
            'fecha_nac' => $request['fecha_nac'],
            'estado_civil' => $request['estado_civil'],
            'hijos' => $request['hijos'],
            'nacionalidad' => $request['nacionalidad'],
            'nivel_educacion' => $request['nivel_educacion'],
            'direccion_domicilio' =>  $request['direccion_domicilio'],
            'direccion_trabajo' =>  $request['direccion_trabajo'],
            'tipo_tenencia_dom' =>  $request['tipo_tenencia_dom'],
            'tipo_tenencia_trab' =>  $request['tipo_tenencia_trab'],
            'ingreso_prom_mensual' =>  $request['ingreso_prom_mensual'],

            'usuario_id' =>  $request['usuario_id'],
        ]);
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente=Cliente::findOrFail($id);
        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->ci = $request->ci;
        $cliente->correo = $request->correo;
        $cliente->nombre = $request->nombre;
        $cliente->lugar_nac = $request->lugar_nac;
        $cliente->fecha_nac = $request->fecha_nac;
        $cliente->estado_civil = $request->estado_civil;
        $cliente->hijos = $request->hijos;
        $cliente->nacionalidad = $request->nacionalidad;
        $cliente->nivel_educacion = $request->nivel_educacion;
        $cliente->direccion_domicilio = $request->direccion_domicilio;
        $cliente->direccion_trabajo = $request->direccion_trabajo;
        $cliente->tipo_tenencia_dom = $request->tipo_tenecia_dom;
        $cliente->tipo_tenencia_trab = $request->tipo_tenencia_trab;
        $cliente->ingreso_prom_mensual = $request->ingreso_prom_mensual;
        $cliente->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
