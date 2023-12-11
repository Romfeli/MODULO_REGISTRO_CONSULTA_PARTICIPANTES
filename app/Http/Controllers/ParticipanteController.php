<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
class ParticipanteController extends Controller
{
    public function mostrar_participantes()
    {
        $participantes = Participante::all();
        $cantidadParticipantes = Participante::count();

        return view('welcome', compact('participantes', 'cantidadParticipantes'));
    }

    public function registro(Request $request)
    {
        // Validación de datos comunes
        $rules = [
            'nombre_y_apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:participantes|max:255',
            'telefono' => 'required|string|max:20',
        ];

        // Verificar si el formulario tiene el campo 'dni'
        if ($request->has('dni')) {
            // Si tiene 'dni', agregar reglas para el DNI
            $rules['dni'] = 'required|string|max:255|unique:participantes';
        }

        $request->validate($rules);

        // Crear un nuevo participante en la base de datos
        Participante::create($request->all());

        // Redireccionar o responder según tus necesidades
        return redirect()->back()->with('mensaje', 'Participante agregado satisfactoriamente');
    }
}