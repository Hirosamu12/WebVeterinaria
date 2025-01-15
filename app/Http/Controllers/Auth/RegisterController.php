<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $table="usuario";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre_Usuario' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuario'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nombre_Usuario' => $data['nombre_Usuario'],
            'apellido_Usuario' =>$data['apellido_Usuario'],
            'cedula'=>$data['cedula'],
            'direccion'=>$data['direccion'],
            'telefono'=>$data['telefono'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'id_Rol' => 3,
            'estado'=> 'Activo',
        ]);
    }

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
}
