<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;
    var $table = 'participantes'; // Nombre de la tabla en la base de datos

    var $fillable = [
        'dni',
        'nombre_y_apellido',
        'email',
        'telefono',
    ];

}
