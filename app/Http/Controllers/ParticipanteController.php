<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipanteRequest;
use Illuminate\Http\Request;

use App\Models\Participante;

class ParticipanteController extends Controller
{
    public function show()
    {
        $participantes = Participante::all();

        return view('welcome', compact('participantes'));
    }



    public function store(Request $request)
{
    // Validar los datos usando la solicitud de participante
    $validatedData = $request->all();
    // Obtener la firma en base64 desde el formulario
    $firmaBase64 = $request->input('firmaBase64');

    // Puedes convertir la cadena base64 a una imagen si es necesario
    $imagenFirma = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $firmaBase64));

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
        'firmaBase64' => $firmaBase64,
    ]);


    $participante->save();

    // Enviar una respuesta JSON de éxito (opcional)
    return response()->json(['success' => true, 'message' => 'Participante agregado exitosamente']);
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










