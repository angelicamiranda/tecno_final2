<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
//use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'usuario'; //usa el nombre de la base de datos
    protected $fillable = [
        'ci',
        'nombre',
        'cargo',
        'condicion',
        'rol_id',
        'email',
        'password',
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function rol_name() {
    //     if (sizeof($this->getRoleNames())>0){
    //         return $this->getRoleNames()[0];
    //     }
    //     return "SIN ROL";
    // }

    public function rol_id() {
        $rol = DB::table('p2_roles')
        ->join('p2_model_has_roles', 'role_id', '=', 'p2_roles.id')
        ->join('users', 'users.id', '=', 'p2_model_has_roles.model_id')
        ->where('users.id', '=', $this->id)
        ->select('p2_roles.id')
        ->get()
        ->first();
        return $rol->id;
    }

    public function rol(){
        return $this->belongsTo('App\Models\Rol','rol_id','id');
    }

    public function cliente()
    {
        return $this->hasMany('App\Models\Cliente','usuario_id','id');
    }
    public function pagoServicio()
    {
        return $this->hasMany('App\Models\PagoServicio','usuario_id','id');
    }

}
