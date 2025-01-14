<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function(){
    return view('/login');
});

Route::post('/register', [UserController::class,'register']);

Route::post('/logout', [UserController::class,'logout']);

Route::post('/login', [UserController::class,'login']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('home/admin', function(){
    return view('admin');
});
Route::get('home/vet', function(){
    return view('vet');
});
Route::get('home/user', function(){
    return view('user');
});

