<?php

<<<<<<< HEAD
use App\Http\Controllers\FormularioController;
=======

>>>>>>> fc751f8d465a06f06031e2cf7123d54b25f33b7f
use App\Http\Controllers\ParticipanteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ParticipanteController::class, 'show']);
Route::post('/', [ParticipanteController::class, 'store'])->name('participante.store');

Route::get('/{dni}', [ParticipanteController::class, 'obtenerInformacionPorDNI']);
