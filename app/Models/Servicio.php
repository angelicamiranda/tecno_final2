<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table = 'servicio'; //usa el nombre de la base de datos
    protected $fillable = [ //atributos de la tabla
        'nombre'
    ];
}
