<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;



//index page
Route::get('/',[LoginController::class,'index']);

//login page
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'verify']);

//Register page
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

Route::get('/register/{slug}', [RegisterController::class,'workerindex'])->name('worker');
Route::post('/worker', [RegisterController::class,'workerstore'])->name('workers');

//Admin Routes
Route::get('/Admin',[AdminController::class,'index'])->name('AdminDashboard');

Route::get('/employee',[AdminController::class,'employee'])->name('Employee');

Route::get('/teams',[AdminController::class,'team_management'])->name('TeamManagement');

Route::get('/edit',[AdminController::class,'edit_team'])->name('EditTeam');

Route::get('/edit',[AdminController::class,'add_team_lead'])->name('TeamLead');

Route::get('/edit',[AdminController::class,'add_team_members'])->name('Members');

