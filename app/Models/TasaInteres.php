<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasaInteres extends Model
{
    use HasFactory;
    protected $table = 'tasa_interes'; //usa el nombre de la base de datos
    protected $fillable = [ //atributos de la tabla
        'tipo',
        'descripcion',
        'porcentaje',
        'condicion'
    ];
}
