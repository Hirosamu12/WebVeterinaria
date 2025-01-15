<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){

        $incomingfields = $request->validate([
            'nombre_Usuario' => 'required',
            'apellido_Usuario' => 'required',
            'cedula' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => ['required', 'email', Rule::unique('usuario', 'email')],
            'password' => ['required','min:8','max:200'],
        ]);
        $incomingfields['id_Rol'] = 3;
        $incomingfields['estado'] = "activo";
        $incomingfields['password'] = bcrypt($incomingfields['password']);
        $user = User::create($incomingfields);
        auth()->login($user);
        return redirect('/user');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }
}
