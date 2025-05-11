<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AudienceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\SpecialitieController;
use App\Http\Controllers\VoitureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// audiences
Route::get('all_audiences',[AudienceController::class,'index'])->name("all_audiences");
Route::get('new_audience',[AudienceController::class,'create'])->name("new_audience");
Route::get('edit_audience/{id}',[AudienceController::class,'edit'])->name("edit_audience");
Route::get('destroy_audience/{id}',[AudienceController::class,'destroy'])->name("destroy_audience");
Route::post('update_audience/{id}',[AudienceController::class,'update'])->name("update_audience");
Route::post('store_audience',[AudienceController::class,'store'])->name("store_audience");

// patients
Route::get('all_patients',[ClientController::class,'index'])->name("all_patients");
Route::get('new_patient',[ClientController::class,'create'])->name("new_patient");
Route::get('edit_patient/{id}',[ClientController::class,'edit'])->name("edit_patient");
Route::get('destroy_patient/{id}',[ClientController::class,'destroy'])->name("destroy_patient");
Route::post('update_patients/{id}',[ClientController::class,'update'])->name("update_patient");
Route::post('store_patients',[ClientController::class,'store'])->name("store_patient");

// medecins
Route::get('all_medecins',[MedecinController::class,'index'])->name("all_medecins");
Route::get('new_medecin',[MedecinController::class,'create'])->name("new_medecin");
Route::get('edit_medecin/{id}',[MedecinController::class,'edit'])->name("edit_medecin");
Route::get('destroy_medecin/{id}',[MedecinController::class,'destroy'])->name("destroy_medecin");
Route::post('update_medecin/{id}',[MedecinController::class,'update'])->name("update_medecin");
Route::post('store_medecin',[MedecinController::class,'store'])->name("store_medecin");

// specialite
Route::get('all_specialites',[SpecialitieController::class,'index'])->name("all_specialites");
Route::get('new_specialite',[SpecialitieController::class,'create'])->name("new_specialite");
Route::get('edit_specialite/{id}',[SpecialitieController::class,'edit'])->name("edit_specialite");
Route::get('destroy_specialite/{id}',[SpecialitieController::class,'destroy'])->name("destroy_specialite");
Route::post('update_specialite/{id}',[SpecialitieController::class,'update'])->name("update_specialite");
Route::post('store_specialite',[SpecialitieController::class,'store'])->name("store_specialite");

// agenda
Route::get('all_agendas',[AgendaController::class,'index'])->name("all_agendas");
Route::get('new_agenda',[AgendaController::class,'create'])->name("new_agenda");
Route::get('edit_agenda/{id}',[AgendaController::class,'edit'])->name("edit_agenda");
Route::get('destroy_agenda/{id}',[AgendaController::class,'destroy'])->name("destroy_agenda");
Route::post('update_agenda/{id}',[AgendaController::class,'update'])->name("update_agenda");
Route::post('store_agenda',[AgendaController::class,'store'])->name("store_agenda");

Route::get('layout',function() {
    return view('layouts.base');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
