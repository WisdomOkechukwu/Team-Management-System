<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Worker\WorkerController;
use Illuminate\Support\Facades\Route;



//?index page
Route::get('/',[LoginController::class,'index']);

//?login page
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'verify']);

//?Register page
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

//?logout
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

//?User Registration Page
Route::get('/register/{slug}', [RegisterController::class,'workerindex'])->name('worker');
Route::post('/worker', [RegisterController::class,'workerstore'])->name('workers');

//?Admin Routes

//?Dashboard
Route::get('/Admin',[AdminController::class,'index'])->name('AdminDashboard');

//?Add Team
Route::post('/Admin',[AdminController::class,'addTeam']);

//?Add Team Member
Route::post('/add-team',[AdminController::class,'add_team_members'])->name('AddTeamMember');

//?Add Team Lead
Route::get('/team-lead/{team}',[AdminController::class,'show_team_lead'])->name('AddTeamLead');

//?post request for Add tem lead
Route::post('/team-lead',[AdminController::class,'add_team_lead'])->name('TeamLead');

//?Employee
Route::get('/employee',[AdminController::class,'employee'])->name('Employee');

//?:Team Management Module
Route::get('/teams',[AdminController::class,'team_management'])->name('TeamManagement');

//?Edit Team members
Route::post('/teams',[AdminController::class,'edit_team'])->name('EditMember');

//?Delete Team Memeber
Route::post('/edit',[AdminController::class,'delete_team_data'])->name('DeleteMemeber');

//?Add Memeber to Team
Route::get('/Members/{name}',[AdminController::class,'new_member'])->name('Members');
Route::post('/Members',[AdminController::class,'new_member_post'])->name('MembersPost');

//?Assigning teamlead to Team
Route::get('/Lead/{name}',[AdminController::class,'new_lead'])->name('Lead');
Route::post('/Lead',[AdminController::class,'new_lead_post'])->name('LeadPost');

//?Worker Route
Route::get('/Worker',[WorkerController::class,'index'])->name('WorkerDashboard');

//? Personal Task Route
Route::post('/personal',[WorkerController::class,'personal_task'])->name('personal');

Route::post('/personals',[WorkerController::class,'personal_task_done'])->name('personalDone');


