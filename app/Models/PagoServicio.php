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

    public $timestamps = false;
    protected $guarded = ['updated_at', 'created_at'];
    public function usuario(){
        return $this->belongsTo('App\Models\User','usuario_id','id');
    }
    public function servicio(){
        return $this->belongsTo('App\Models\Servicio','servicio_id','id');
    }
}
