<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
        return view('user');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }

    public function login(Request $request, $user){
        $incomingfields = $request->validate([
            'loginname'=> 'required',
            'loginpassword'=> 'required',
        ]);

        if(auth()->attempt(['name' => $incomingfields['loginname'],'password'=> $incomingfields['loginpassword']])){
            $user = Auth::user();
            /*
                id_Rol  Rol
                1       Admin
                2       Veterinario
                3       Usuario comun
            */
            // si es admin muestra esto
            if ($user->id_Rol == 1) {
                return view('admin');
            } 
            // si es veterinario muestra esto
            else if($user->id_Rol == 2){
                return view('vet');
            } 
            // si es usuario comun muestra esto
            else{
                return view('user');
            }
        }
        
        // Authentication failed
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }
}
