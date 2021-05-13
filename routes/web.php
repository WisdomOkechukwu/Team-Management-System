<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;



//index page


//login page
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'verify']);

//Register page
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);


