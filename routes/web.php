<?php

use PhpParser\Node\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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


Route::get('/administrarUsuarios', function(){
    return view('adminUsers') ;
})->name('adminUsers');
