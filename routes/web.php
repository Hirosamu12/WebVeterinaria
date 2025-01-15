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

Route::post('/logout', [UserController::class,'logout']);

Route::post('/login', [LoginController::class,'login']);

Auth::routes();


Route::get('/admin', function(){
    return view('admin');
})->name('admin');

Route::get('/vet', function(){
    return view('vet') ;
})->name('vet');

Route::get('/user', function(){
    return view('user') ;
})->name('user');


