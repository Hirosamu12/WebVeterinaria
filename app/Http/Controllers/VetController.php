<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Donacion;
use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VetController extends Controller
{
    public function mostrarVerMascotasVet() {
        $pets = DB::table('mascota')
            ->join('usuario as dueño', 'mascota.id_Usuario', '=', 'dueño.id_Usuario')
            ->select(
                'mascota.*',
                'dueño.nombre_Usuario as nombre_Usuario', 
            )
            ->get();
        
        // Pasar las mascotas a la vista
        return view('vet.vetMascotas', compact('pets'));
    }
    


    public function mostrarModificarMascota($id_Mascota){
        $pet = DB::table("mascota")->where('id_Mascota', $id_Mascota)->first();
        //dd($user);
        return view("vet.modifyPets", compact("pet"));
    }


    public function modificarMascota(Request $request, $id_Mascota)
    {
        try {
            $validatedData = $request->validate([
                'nombre_Mascota' => 'required|string|max:255',
                'fecha_Nacimiento' => 'required|date',
                'genero' => 'required|string|in:Macho,Hembra', // To limit valid values
                'raza_Mascota' => 'required|string|max:255',
                'id_Sangre_Mascota' => 'required|integer',
                'id_Usuario' => 'required|integer|exists:usuario,id_Usuario', // Check if user exists
            ]);

            // Process the uploaded file if provided
            if ($request->hasFile('foto_Mascota') && $request->file('foto_Mascota')->isValid()) {
                $filePath = $request->file('foto_Mascota')->store('uploads/pets', 'public'); // Save to storage/app/public/uploads/pets
                $validatedData['foto_Mascota'] = $filePath; // Add the path to validated data
            }

            // Build the update array dynamically
            $updateData = [
                'nombre_Mascota' => $validatedData['nombre_Mascota'],
                'fecha_Nacimiento' => $validatedData['fecha_Nacimiento'],
                'genero' => $validatedData['genero'],
                'raza_Mascota' => $validatedData['raza_Mascota'],
                'id_Sangre_Mascota' => $validatedData['id_Sangre_Mascota'],
                'id_Usuario' => $validatedData['id_Usuario'],
            ];

            // Include foto_Mascota only if it's set
            if (isset($validatedData['foto_Mascota'])) {
                $updateData['foto_Mascota'] = $validatedData['foto_Mascota'];
            }

            // Update the database record
            DB::table('mascota')
                ->where('id_Mascota', $id_Mascota)
                ->update($updateData);

            // Redirect with success message
            return redirect()->route('seePetsVet')->with('success', 'Mascota actualizada correctamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        }
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

            // Validar datos del formulario
            $validatedData = $request->validate([
                'nombre_Mascota' => 'required|string|max:255',
                'foto_Mascota' => 'required|file|image|mimes:jpg,png,jpeg|max:2048', // Validación para archivos e imágenes
                'fecha_Nacimiento' => 'required|date',
                'genero' => 'required|string|in:Macho,Hembra',
                'raza_Mascota' => 'required|string|max:255',
                'id_Sangre_Mascota' => 'required|integer',
                'cedula' => 'required|integer|exists:usuario,cedula',
            ]);

            $usuario = DB::table('usuario')->where('cedula', $validatedData['cedula'])->first();
    
            // Procesar el archivo subido
            if ($request->hasFile('foto_Mascota') && $request->file('foto_Mascota')->isValid()) {
                $filePath = $request->file('foto_Mascota')->store('uploads/pets', 'public'); // Guardar en storage/app/public/uploads/pets
                $validatedData['foto_Mascota'] = $filePath; // Agregar la ruta al array validado
            }
    
            // Crear registro en la base de datos
            Mascota::create([
                'nombre_Mascota' => $validatedData['nombre_Mascota'],
                'foto_Mascota' => $validatedData['foto_Mascota'], // Asegúrate de validar la imagen antes de guardar
                'fecha_Nacimiento' => $validatedData['fecha_Nacimiento'],
                'genero' => $validatedData['genero'],
                'raza_Mascota' => $validatedData['raza_Mascota'],
                'id_Sangre_Mascota' => $validatedData['id_Sangre_Mascota'],
                'id_Usuario' => $usuario->id_Usuario,
            ]);
    
            return redirect()->route('seePetsVet')->with('success', 'Mascota agregada correctamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Manejar errores de validación
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            // Manejar cualquier otro error
            return redirect()->back()
                ->with('error', 'Ocurrió un error inesperado. Por favor, intenta de nuevo.')
                ->withInput();
        }
    }

    public function mostrarAgregarMascota(){
        $users = DB::table("usuario")->get();
        return view("vet.addPet", compact('users'));
    }


    public function mostrarVerUsuariosVet(){
        $users = DB::table('usuario')->get();
        // Pasar las mascotas a la vista
        return view('vet.vetUsers', compact('users'));
    }


    public function mostrarDonaciones(){
        $donations = DB::table('donation')
        ->join('mascota as receptor', 'donation.id_Mascota_Receptor', '=', 'receptor.id_Mascota')
        ->join('mascota as donante', 'donation.id_Mascota_Donante', '=', 'donante.id_Mascota')
        ->select(
            'donation.*',
            'receptor.nombre_Mascota as nombre_Mascota_Receptor',
            'donante.nombre_Mascota as nombre_Mascota_Donante'
        )
        ->get();
        return view('vet.donations', compact('donations'));
        // Pasar las mascotas a la vista
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
            // Actualizar los datos del historial
            $historial = DB::table("historial")->where('id_Historial',$id_Historial)->first();
            $newObervaciones = $historial->observaciones_Historial . " | " . $validatedData['observaciones_Historial'];
            DB::table('historial')
                ->where('id_Historial', $id_Historial)
                ->update([
                    'fecha_Historial' => $validatedData['fecha_Historial'],
                    'observaciones_Historial' => $newObervaciones,
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

    public function mostrarDonantes(){
        $donantes = DB::table('mascota')->get();
        return view('vet.donantes', compact('donantes'));
    }

    public function buscarDonantes(Request $request){
        $id_Sangre = $request->id_Sangre_Mascota;
        switch ($id_Sangre) {
            case($id_Sangre == 1):
                $ids_Sangre =[1, 2];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;

            case($id_Sangre == 2):
                $ids_Sangre =[2];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
            
            case($id_Sangre == 3):
                $ids_Sangre =[3, 4];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;

            case($id_Sangre == 4):
                $ids_Sangre =[4];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
                
            case($id_Sangre == 5):
                $ids_Sangre =[5, 6];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
            
            case($id_Sangre == 6):
                $ids_Sangre =[6];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
            
            case($id_Sangre == 7):
                $ids_Sangre =[7,8];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;

            case($id_Sangre == 8):
                $ids_Sangre =[8];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;

            case($id_Sangre == 9):
                $ids_Sangre =[9, 10];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;

            case($id_Sangre == 10):
                $ids_Sangre =[10];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
    
            case($id_Sangre == 11):
                $ids_Sangre =[11, 12];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
                
            case($id_Sangre == 12):
                $ids_Sangre =[12];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
    
            case($id_Sangre == 13):
                $ids_Sangre =[13, 14];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
                    
            case($id_Sangre == 14):
                $ids_Sangre =[14];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
                
            case($id_Sangre == 15):
                $ids_Sangre =[15, 16];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
                
            case($id_Sangre == 16):
                $ids_Sangre =[16];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
    
            case($id_Sangre == 17):
                $ids_Sangre =[17, 18];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
    
            case($id_Sangre == 18):
                $ids_Sangre =[18];
                // Buscar donantes con los tipos de sangre que coincidan
                $donantes = DB::table('mascota')
                                ->whereIn('id_Sangre_Mascota', $ids_Sangre)
                                ->get();
                break;
        }
        return view('vet.donantes', compact('donantes'));

    }
    
    public function buscarPersona(Request $request){
        $search = $request->input('search');
        $users = DB::table('usuario')
        ->where('nombre_Usuario', 'like', "%{$search}%") // Buscar por nombre
        ->orWhere('apellido_Usuario', 'like', "%{$search}%") // Buscar por apellido
        ->orWhere('email', 'like', "%{$search}%") // Buscar por email
        ->orWhere('telefono', 'like', "%{$search}%") // Buscar por teléfono (si existe)
        ->orWhere('cedula', 'like', "%{$search}%") // Buscar por Cedula
        ->get();
        return view('vet.vetUsers', compact('users'));
    }

    public function buscarPersonaDonacion(Request $request)
    {
        $search = $request->input('search');
        
        $users = DB::table('usuario')
            ->where('nombre_Usuario', 'like', "%{$search}%")
            ->orWhere('apellido_Usuario', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('telefono', 'like', "%{$search}%")
            ->orWhere('cedula', 'like', "%{$search}%")
            ->get();
    
        return view('vet.addPet', compact('users'));
    }
    
}
