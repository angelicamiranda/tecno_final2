<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
//use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {   //               ('can:materias.index') aprobando permiso, ->only('index') solo para el metodo index
        // $this->middleware('can:users.index')->only('index');
        // $this->middleware('can:users.create')->only('create', 'store');
        // $this->middleware('can:users.edit')->only('edit', 'update');
        // $this->middleware('can:publico')->only('show2', 'update2');
        // $this->middleware('can:users.destroy')->only('destroy');
    }
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {

        return view('users.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:4',
            'roles' => 'required',
        ]);
        $users=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

         $users->save();


        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function show2()
    {
        $user=User::find(auth()->user()->id);
        return view('user.edit',compact('user'));
    }
    public function update2(Request $request)
    {
        date_default_timezone_set("America/La_Paz");

        $user=User::find(auth()->user()->id);
       if($user->name <> $request->name){
            $user->name = $request->name;
        }
        if($user->email <> $request->email){
            $request->validate([
                'email'=>'required|string|max:255|email|unique:users',
            ]);
            $user->email = $request->email;
        }
        if($request->password <> ''){
            $user->password =password_hash($request->password,PASSWORD_DEFAULT);
        }

        $user->save();
        return redirect()->route('user.show')->with('info', 'Se actualizo correctamente');
    }


    public function edit(User $user)
    {

        return view('users.edit',compact('user') );
    }

    public function update(Request $request, User $user)
    {
        if($user->nombre <> $request->nombre){
            $user->nombre = $request->nombre;
        }

        $request->validate([
            'ci' => 'required|string|max:20|ci|unique:users',
        ]);

        if($user->ci <> $request->ci){
            $user->ci = $request->ci;
        }
        if($user->cargo <> $request->cargo){
            $user->cargo = $request->cargo;
        }
        if($user->email <> $request->email){
            $request->validate([
                'email'=>'required|string|max:255|email|unique:users',
            ]);
            $user->email = $request->email;
        }
        if($request->password <> ''){
            $user->password = bcrypt($request->password);
        }
        
        // if($request->roles > 0 ){
        //     $user->roles()->sync($request->roles);
        // }
        $user->save();
        return redirect()->route('users.edit', $user)->with('info', 'se actualizo el usuario correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
