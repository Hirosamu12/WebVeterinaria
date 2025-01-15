<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $table = "usuario";
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */


     public function login(Request $request): \Illuminate\Http\RedirectResponse
     {
         // Validate the user input
         $request->validate([
             'email' => 'required|email',
             'password' => 'required',
         ]);
 
         // Attempt login
         if (Auth::attempt($request->only('email', 'password'))) {
             $request->session()->regenerate();
             $user = Auth::user();
 
             // Redirect based on the user's role
             switch ($user->id_Rol) {
                 case 1: // Admin
                     return redirect()->route('admin');
                 case 2: // Veterinarian
                     return redirect()->route('vet');
                 case 3: // Regular User
                     return redirect()->route('user');
                 default: // Unknown role
                     Auth::logout();
                     return redirect()->route('login')->withErrors(['role' => 'Invalid role']);
             }
         }
 
         // Login failed
         return back()->withErrors([
             'email' => 'Invalid credentials.',
         ]);
     }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
