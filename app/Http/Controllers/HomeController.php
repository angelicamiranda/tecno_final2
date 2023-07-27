<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagina;
use App\Models\PagoServicio;
use App\Models\Personal;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $paginass=Pagina::all();
        $total=$paginass->sum('visitas');
        $pagoServicios=PagoServicio::all();


        
        $servicios = DB::table('pago_servicio')
                ->join('servicio', 'pago_servicio.servicio_id', '=', 'servicio.id')
                ->select('servicio.nombre', DB::raw('COUNT(servicio.nombre) as cantidad'))
                ->where('condicion', '=', 0)
                ->groupBy('servicio.nombre')
                ->get();
        return view('home',compact('paginass','total', 'pagoServicios', 'servicios'));
    }
}
