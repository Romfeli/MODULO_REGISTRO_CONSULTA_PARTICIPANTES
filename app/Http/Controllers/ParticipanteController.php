<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipanteRequest;


use App\Models\Participante;

class ParticipanteController extends Controller
{
    public function mostrar_participantes()
    {
        $participantes = Participante::all();

        return view('welcome', compact('participantes'));
    }

    public function registro(ParticipanteRequest $request)
        {
            // Validar los datos usando la solicitud de participante
            $validatedData = $request->validated();

            // Crear un nuevo participante en la base de datos
            $participante = new Participante([
                'dni' => $validatedData['dni'],
                'nombre_y_apellido' => $validatedData['nombre_y_apellido'],
                'email' => $validatedData['email'],
                'telefono' => $validatedData['telefono'],
                'inputPersonalizado' => $validatedData['inputPersonalizado'],
                'selectPersonalizado' => $validatedData['selectPersonalizado'],
                'checkbox1' => $validatedData['checkbox1'],
                'checkbox2' => $validatedData['checkbox2'],
            ]);

            $participante->save();

            // Redireccionar o responder según tus necesidades
            return redirect()->back()->with('mensaje', 'Participante agregado satisfactoriamente');
        }
}