<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    use HasFactory;
    protected $table = 'cuota'; //usa el nombre de la base de datos
    protected $fillable = [ //atributos de la tabla
        'monto',
        'fecha',
        'cargo_adicional',
        'total_cuota',
        'condicion',
        'credito_id'
    ];
    public $timestamps = false;

    public function credito(){
        return $this->belongsTo('App\Models\Credito','credito_id','id');
    }
}
