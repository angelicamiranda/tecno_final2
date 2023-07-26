<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoServicio extends Model
{
    use HasFactory;
    protected $table = 'pago_servicio'; //usa el nombre de la base de datos
    protected $fillable = [ //atributos de la tabla
        'codigo_cliente',
        'monto',
        'fecha',
        'condicion',
        'usuario_id',
        'servicio_id'
    ];
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario','usuario_id','id');
    }
    public function servicio(){
        return $this->belongsTo('App\Models\Servicio','servicio_id','id');
    }
}
