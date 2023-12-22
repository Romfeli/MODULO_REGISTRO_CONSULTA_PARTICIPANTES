<?php

use App\Http\Controllers\FormularioController;
use App\Http\Controllers\ParticipanteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ParticipanteController::class, 'show']);
Route::post('/', [ParticipanteController::class, 'store'])->name('participante.store');

Route::get('/{dni}', [ParticipanteController::class, 'obtenerInformacionPorDNI']);
