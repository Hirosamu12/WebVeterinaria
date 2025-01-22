<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Donacion;
use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VetController extends Controller
{
    public function mostrarVerMascotasVet(){
        $pets = DB::table('mascota')->get();
    
        // Pasar las mascotas a la vista
        return view('vet.vetMascotas', compact('pets'));
    }


    public function mostrarModificarMascota($id_Mascota){
        $pet = DB::table("mascota")->where('id_Mascota', $id_Mascota)->first();
        //dd($user);
        return view("vet.modifyPets", compact("pet"));
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
        return view("vet.deletePet", compact("pet"));
    }

    public function eliminarMascota($id_Mascota){
        DB::table('mascota')
        ->where('id_Mascota', $id_Mascota)
        ->delete(); // Delete the row where id_mascota matches the provided $id

        return redirect()->route('seePetsVet');
    }


    public function agregarMascota(Request $request)
    {
        try {
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
    
            return redirect()->route('seePetsVet')->with('success', 'Mascota agregada correctamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        }
    }

    public function mostrarAgregarMascota(){
        return view("vet.addPet");
    }


    public function mostrarVerUsuariosVet(){
        $users = DB::table('usuario')->get();
        // Pasar las mascotas a la vista
        return view('vet.vetUsers', compact('users'));
    }


    public function mostrarDonaciones(){
        $donations = DB::table('donation')->get();
        // Pasar las mascotas a la vista
        return view('vet.donations', compact('donations'));
    }


    public function mostrarAgregarDonacion(){
        return view("vet.addDonation");
    }


    public function agregarDonacion(Request $request){
        try {
            $validatedData = $request->validate([
                'fecha_Donacion' => 'required|date',
                'cantidad_Donacion' => 'required|numeric', // Cambiado de 'float' a 'numeric'
                'lugar_Donacion' => 'required|string|max:255',
                'estado_Donacion' => 'required|integer|in:1,2', // Corregido nombre del campo
                'id_Mascota_Receptor' => 'required|integer|exists:mascota,id_Mascota', // Ajustada regla exists
                'id_Mascota_Donante' => 'required|integer|exists:mascota,id_Mascota',  // Ajustada regla exists
            ]);

            Donacion::create($validatedData);

            return redirect()->route('seeDonations')->with('success', 'Donación agregada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }

    public function mostrarModificarDonacion($id_Donacion){
        $donation = DB::table("donation")->where('id_Donacion', $id_Donacion)->first();
        return view("vet.modifyDonations", compact("donation"));
    }

    public function modificarDonacion(Request $request, $id_Donacion){
        try {
            $validatedData = $request->validate([
                'fecha_Donacion' => 'required|date',
                'cantidad_Donacion' => 'required|numeric', // Cambiado de 'float' a 'numeric'
                'lugar_Donacion' => 'required|string|max:255',
                'estado_Donacion' => 'required|integer|in:1,2', // Corregido nombre del campo
                'id_Mascota_Receptor' => 'required|integer|exists:mascota,id_Mascota', // Ajustada regla exists
                'id_Mascota_Donante' => 'required|integer|exists:mascota,id_Mascota',  // Ajustada regla exists
            ]);
            // Actualizar los datos del usuario
            DB::table('donation')
                ->where('id_Donacion', $id_Donacion)
                ->update([
                    'fecha_Donacion' => $validatedData['fecha_Donacion'],
                    'cantidad_Donacion' => $validatedData['cantidad_Donacion'],
                    'lugar_Donacion' => $validatedData['lugar_Donacion'],
                    'estado_Donacion' => $validatedData['estado_Donacion'],
                    'id_Mascota_Receptor' => $validatedData['id_Mascota_Receptor'],
                    'id_Mascota_Donante' => $validatedData['id_Mascota_Donante'],
                ]);
    
            // Redireccionar con mensaje de éxito
            return redirect()->route('seeDonations');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        }
    }

    public function mostrarHistorial(){
        $historiales = DB::table("historial")->get();
        return view("vet.historial", compact("historiales"));
    }

    public function mostrarAgregarHistorial(){
        $historiales = DB::table('historial')->get();
        return view('vet.addHistorial', compact('historiales'));
    }


    public function agregarHistorial(Request $request){
        try {
            $validatedData = $request->validate([
                'fecha_Historial' => 'required|date',
                'observaciones_Historial' => 'required|string',
                'id_Mascota' => 'required|integer|exists:mascota,id_Mascota',  // Ajustada regla exists
            ]);

            Historial::create($validatedData);

            return redirect()->route('seeHistorial')->with('success', 'Donación agregada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }

    public function mostrarModificarHistorial($id_Historial){
        $historial = DB::table("historial")->where('id_Historial', $id_Historial)->first();
        return view("vet.modifyHistorial", compact("historial"));
    }

    public function modificarHistorial(Request $request, $id_Historial){
        try {
            $validatedData = $request->validate([
                'fecha_Historial' => 'required|date',
                'observaciones_Historial' => 'required|string',
                'id_Mascota' => 'required|integer|exists:mascota,id_Mascota',  // Ajustada regla exists
            ]);
            // Actualizar los datos del usuario
            DB::table('historial')
                ->where('id_Historial', $id_Historial)
                ->update([
                    'fecha_Historial' => $validatedData['fecha_Historial'],
                    'observaciones_Historial' => $validatedData['observaciones_Historial'],
                    'id_Mascota' => $validatedData['id_Mascota'],
                ]);
    
            // Redireccionar con mensaje de éxito
            return redirect()->route('seeHistorial');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        }
    }


}
