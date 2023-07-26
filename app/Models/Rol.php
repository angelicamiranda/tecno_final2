<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table="rol";
    protected $guarded=['id'];
    protected $fillable = [ //atributos de la tabla
        'nombre'
    ];
}
