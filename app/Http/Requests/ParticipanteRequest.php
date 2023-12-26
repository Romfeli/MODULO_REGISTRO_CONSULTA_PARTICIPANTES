<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipanteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'dni' => '',
            'nombre_y_apellido' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required|numeric',
            'inputPersonalizado' => 'nullable|string',
            'selectPersonalizado' => 'required|in:opcion1,opcion2,opcion3',
            'checkbox1' => 'required|accepted',
            'checkbox2' => 'required|accepted',
        ];
    }
}
