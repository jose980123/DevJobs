<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');

Route::controller(VacanteController::class)->group(function(){
    Route::get('/dashboard', 'index')->middleware(['auth', 'verified', 'rol.reclutador'])->name('vacantes.index');
    Route::get('/vacantes/create', 'create')->middleware(['auth', 'verified'])->name('vacantes.create');
    Route::get('/vacantes/{vacante}/edit', 'edit')->middleware(['auth', 'verified'])->name('vacantes.edit');
    Route::get('/vacantes/{vacante}', 'show')->name('vacantes.show');
});

Route::controller(CandidatoController::class)->group(function(){
    Route::get('/candidatos/{vacante}', 'index')->name('candidatos.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'verified', 'rol.reclutador'])->name('notificaciones');

require __DIR__.'/auth.php';
