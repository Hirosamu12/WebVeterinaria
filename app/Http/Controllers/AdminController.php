<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function mostrarVerUsuarios(){
        $users = DB::table("usuario")->get();
        return view("adminUsers",compact("users"));
    }

    public function mostrarModificarUsuario($id_Usuario){
        $user = DB::table("usuario")->where('id_usuario', $id_Usuario)->first();
        //dd($user);
        return view("modifyUsers", compact("user"));
    }


    public function modificarUsuario(Request $request, $id_Usuario){
        // Validar los datos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|integer',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'estado' => 'required|in:Activo,Inactivo',
            'id_rol' => 'required|integer|in:1,2,3',
        ]);

        // Actualizar los datos del usuario
        DB::table('usuario')
            ->where('id_usuario', $id_Usuario)
            ->update([
                'nombre_Usuario' => $validatedData['nombre'],
                'apellido_Usuario' => $validatedData['apellido'],
                'cedula' => $validatedData['cedula'],
                'telefono' => $validatedData['telefono'],
                'email' => $validatedData['email'],
                'estado' => $validatedData['estado'],
                'id_Rol' => $validatedData['id_rol'],
            ]);

        // Redireccionar con mensaje de éxito
        return redirect()->route('seeUsers');
    }

    public function mostrarEliminarUsuario($id_Usuario){
        $user = DB::table("usuario")->where('id_usuario', $id_Usuario)->first();
        //dd($user);
        return view("deleteUser", compact("user"));
    }

    public function eliminarUsuario($id_Usuario){
        DB::table('usuario')
        ->where('id_usuario', $id_Usuario)
        ->delete(); // Delete the row where id_usuario matches the provided $id

        return redirect()->route('seeUsers');
    }

}
