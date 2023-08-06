<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaAhorro extends Model
{
    use HasFactory;
    protected $table = 'cuenta_ahorro'; //usa el nombre de la base de datos
    protected $fillable = [ //atributos de la tabla
        'numero_cuenta',
        'fecha_apertura',
        'tipo_moneda',
        'monto',
        'interes',
        'condicion',
        'cliente_id'
    ];

    public $timestamps = false;
    protected $guarded = ['updated_at', 'created_at'];

    public function transaccion()
    {
        return $this->hasMany('App\Models\Transaccion','cuenta_ahorro_id','id');
    }


    public function cliente(){
        return $this->belongsTo('App\Models\Cliente','cliente_id','id');
    }
}
