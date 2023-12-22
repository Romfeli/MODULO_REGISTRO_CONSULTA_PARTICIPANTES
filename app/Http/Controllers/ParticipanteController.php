<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipanteRequest;


use App\Models\Participante;

class ParticipanteController extends Controller
{
    public function show()
    {
        $participantes = Participante::all();

        return view('welcome', compact('participantes'));
    }



    public function store(ParticipanteRequest $request)
    {
       
            // Validar los datos usando la solicitud de participante
            $validatedData = $request->validated();
    
            // Verificar si ya existe un participante con la misma DNI
                      $participanteExistente = Participante::where('dni', $validatedData['dni'])->first();
    
            if ($participanteExistente) {
                // Si existe, redirigir de nuevo al formulario con los datos del participante existente
                return redirect()->back()->withInput()->withErrors(['dni' => 'El dni ya está registrado.']);
            }
    
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
    
            // Enviar una respuesta JSON de éxito (opcional)
            return redirect('/')->with('success', ['mensaje' => 'Usuario registrado exitosamente']);
    

        }
       public function obtenerInformacionPorDNI($dni)
{
    $participante = Participante::where('dni', $dni)->first();

    if ($participante) {
        return response()->json($participante);
    } else {
        // DNI no encontrado, puedes enviar una respuesta con un mensaje de error
        return response()->json(['error' => 'Participante no encontrado'], 404);
    }
}


 
    }










