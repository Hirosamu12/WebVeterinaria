<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VetController extends Controller
{
    public function mostrarVerMascotasVet(){
        $pets = DB::table('mascota')->get();
    
        // Pasar las mascotas a la vista
        return view('vetMascotas', compact('pets'));
    }


    public function mostrarModificarMascota($id_Mascota){
        $pet = DB::table("mascota")->where('id_Mascota', $id_Mascota)->first();
        //dd($user);
        return view("modifyPets", compact("pet"));
    }


    public function modificarMascota(Request $request, $id_Mascota){
        $validatedData = $request->validate([
            'nombre_Mascota' => 'required|string|max:255',
            'foto_Mascota' => 'required',
            'fecha_Nacimiento' => 'required|date',
            'genero' => 'required|string|in:Macho,Hembra', // To limit valid values
            'raza_Mascota' => 'required|string|max:255',
            'id_Sangre_Mascota' => 'required|integer',
            'id_Usuario' => 'required|integer|exists:usuario,id_Usuario', // Check if user exists
        ]);
        // Actualizar los datos del usuario
        DB::table('mascota')
            ->where('id_Mascota', $id_Mascota)
            ->update([
                'nombre_Mascota' => $validatedData['nombre_Mascota'],
                'foto_Mascota' => $validatedData['foto_Mascota'],
                'fecha_Nacimiento' => $validatedData['fecha_Nacimiento'],
                'genero' => $validatedData['genero'],
                'raza_Mascota' => $validatedData['raza_Mascota'],
                'id_Sangre_Mascota' => $validatedData['id_Sangre_Mascota'],
                'id_Usuario' => $validatedData['id_Usuario'],
            ]);

        // Redireccionar con mensaje de éxito
        return redirect()->route('seePetsVet');
    }


    public function mostrarEliminarMascota($id_Mascota){
        $pet = DB::table("mascota")->where('id_Mascota', $id_Mascota)->first();
        //dd($pet);
        return view("deletePet", compact("pet"));
    }

    public function eliminarMascota($id_Mascota){
        DB::table('mascota')
        ->where('id_Mascota', $id_Mascota)
        ->delete(); // Delete the row where id_mascota matches the provided $id

        return redirect()->route('seePetsVet');
    }


    public function agregarMascota(Request $request)
    {

        $validatedData = $request->validate([
            'nombre_Mascota' => 'required|string|max:255',
            'foto_Mascota' => 'required|string|max:255',
            'fecha_Nacimiento' => 'required|date',
            'genero' => 'required|string|in:Macho,Hembra',
            'raza_Mascota' => 'required|string|max:255',
            'id_Sangre_Mascota' => 'required|integer',
            'id_Usuario' => 'required|integer|exists:usuario,id_Usuario',
        ]);

        Mascota::create($validatedData);

        return redirect()->route('seePetsVet');
    }

    public function mostrarAgregarMascota(){
        return view("addPet");
    }
}
