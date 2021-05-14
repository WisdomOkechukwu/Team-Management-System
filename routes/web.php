<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;



//index page


//login page
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'verify']);

//Register page
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

Route::get('/register/{slug}', [RegisterController::class,'workerindex'])->name('worker');
Route::post('/registers', [RegisterController::class,'workerstore'])->name('workers');

