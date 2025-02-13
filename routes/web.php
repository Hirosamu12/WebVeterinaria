<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Rutas de Login/Registro
Route::get('/', function(){
    return view('/login');
});

Route::post('/register', [RegisterController::class,'register']);

Route::post('/logout', [LoginController::class,'logout']);

Route::post('/login', [LoginController::class,'login']);

Auth::routes();

Route::get('/home', function(){
    return view('home');
})->name('home');


// Rutas de Administrador
Route::get('/administrarUsuarios', [AdminController::class,'mostrarVerUsuarios'])->name('seeUsers');

Route::get('/modificarUsuario/{id_Usuario}', [AdminController::class, 'mostrarModificarUsuario'])->name('modifyUsers');

Route::post('/confirmModifyUser/{id_usuario}', [AdminController::class, 'modificarUsuario'])->name('modificarUsuario');

Route::get('/eliminarUsuario/{id_Usuario}', [AdminController::class, 'mostrarEliminarUsuario'])->name('deleteUsers');

Route::delete('/deleteUser/{id_usuario}', [AdminController::class, 'eliminarUsuario'])->name('deleteUser');

Route::post('/buscarPersonaAdmin', [AdminController::class,'buscarPersona'])->name('searchPeopleAdmin');

// Rutas de Usuario
Route::get('/verMascotas', [UserController::class,'mostrarVerMascotas'])->name('seePets');


// Rutas de veterinario

// Mascotas
Route::get('/verVetMascotas', [VetController::class,'mostrarVerMascotasVet'])->name('seePetsVet');

Route::get('/modificarMascota/{id_Mascota}', [VetController::class, 'mostrarModificarMascota'])->name('modifyPets');

Route::post('/confirmModifyPet/{id_Mascota}', [VetController::class, 'modificarMascota'])->name('modificarMascota');

Route::get('/eliminarMascota/{id_Mascota}', [VetController::class, 'mostrarEliminarMascota'])->name('deletePets');

Route::delete('/deleteMascota/{id_Mascota}', [VetController::class, 'eliminarMascota'])->name('deletePet');

Route::get('/agregarMascota', [VetController::class, 'mostrarAgregarMascota'])->name('addPets');

Route::post('/addMascota', [VetController::class, 'agregarMascota'])->name('addPet');

// Donaciones
Route::get('/donaciones', [VetController::class, 'mostrarDonaciones'])->name('seeDonations');

Route::get('/addDonation', [VetController::class,'mostrarAgregarDonacion'])->name('addDonation');

Route::post('/confirmAddDonation', [VetController::class,'agregarDonacion'])->name('addDonations');

Route::get('/modificarDonacion/{id_Donacion}', [VetController::class,'mostrarModificarDonacion'])->name('seeModifyDonation');

Route::post('/confirmModifyDonation/{id_Donacion}', [VetController::class,'ModificarDonacion'])->name('modifyDonations');

Route::post('/buscarPersonaDonacion', [VetController::class,'buscarPersonaDonacion'])->name('searchPeopleDonation');


Route::get('/historial', [VetController::class, 'mostrarHistorial'])->name('seeHistorial');

Route::get('/addHistorial', [VetController::class,'mostrarAgregarHistorial'])->name('addHistorial');

Route::post('/confirmAddHistorial', [VetController::class,'agregarHistorial'])->name('addHistorials');

Route::get('/modificarHistorial/{id_Historial}', [VetController::class,'mostrarModificarHistorial'])->name('seeModifyHistorial');

Route::post('/confirmModifyHistorial/{id_Donacion}', [VetController::class,'ModificarHistorial'])->name('modifyHistorial');

Route::get('/donantes', [VetController::class,'mostrarDonantes'])->name('seeDonants');

Route::post('/buscarDonantes', [VetController::class,'buscarDonantes'])->name('searchDonant');

Route::post('/buscarPersona', [VetController::class,'buscarPersona'])->name('searchPeople');

// Usuarios
Route::get('/verVetUsuarios', [VetController::class,'mostrarVerUsuariosVet'])->name('seeUsersVet');

