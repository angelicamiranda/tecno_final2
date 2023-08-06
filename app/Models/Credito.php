<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;
    protected $table = 'credito'; //usa el nombre de la base de datos
    protected $fillable = [ //atributos de la tabla
        'monto',
        'motivo',
        'plazo',
        'dia_desembolso',
        'periodo_gracia',
        'cargo_adicional',
        'montomensual',
        'totalmontomensual',
        'montofinal',
        'estado',
        'tasa_interes_id',
        'cliente_id'
    ];

    public $timestamps = false;

    public function cuota()
    {
        return $this->hasMany('App\Models\Credito','credito_id','id');
    }

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente','cliente_id','id');
    }
}
