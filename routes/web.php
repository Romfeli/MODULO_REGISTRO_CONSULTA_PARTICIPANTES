<?php


use App\Http\Controllers\ParticipanteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ParticipanteController::class, 'mostrar_participantes']);


