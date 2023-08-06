<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;
    protected $table = 'transaccion'; //usa el nombre de la base de datos
    protected $fillable = [ //atributos de la tabla
        'monto',
        'fecha',
        'tipo_transaccion',
        'condicion',
        'cuenta_ahorro_id'
    ];
    public $timestamps = false;
    protected $guarded = ['updated_at', 'created_at'];

    public function cuenta_ahorro(){
        return $this->belongsTo('App\Models\CuentaAhorro','cuenta_ahorro_id','id');
    }

}
