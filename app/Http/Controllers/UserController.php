<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mostrarVerMascotas(){
        // Obtener el ID del usuario autenticado
        $id_Usuario = Auth::user()->id_Usuario;
    
        // Obtener las mascotas asociadas a ese ID de usuario
        $pets = DB::table('mascota')->where('id_Usuario', $id_Usuario)->get();
    
        // Pasar las mascotas a la vista
        return view('userMascotas', compact('pets'));
    }


}
