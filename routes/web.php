<?php


use App\Http\Controllers\ParticipanteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ParticipanteController::class, 'mostrar_participantes']);
Route::post('/', [ParticipanteController::class, 'registro'])->name('participante.registro');
