<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;

class ParticipanteController extends Controller
{
    public function mostrar_participantes()
    {
        // Obtener todos los participantes desde la base de datos
        $participantes = Participante::all();

        // Pasar los participantes a la vista
        return view('welcome', ['participantes' => $participantes]);
    }
}
