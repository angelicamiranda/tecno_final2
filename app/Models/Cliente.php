<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente'; //usa el nombre de la base de datos
    protected $fillable = [ //atributos de la tabla
        'correo',
        'ci',
        'nombre',
        'lugar_nac',
        'fecha_nac',
        'estado_civil',
        'hijos',
        'nacionalidad',
        'nivel_educacion',
        'direccion_domicilio',
        'direccion_trabajo',
        'tipo_tenencia_dom',
        'tipo_tenecial_trab',
        'ingreso_prom_mensual',
        'condicion',
        'usuario_id',
    ];


    public function cuenta_ahorro()
    {
        return $this->hasMany('App\Models\CuentaAhorro','cliente_id','id');
    }
    public function credito()
    {
        return $this->hasMany('App\Models\Credito','cliente_id','id');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario','usuario_id','id');
    }
}
