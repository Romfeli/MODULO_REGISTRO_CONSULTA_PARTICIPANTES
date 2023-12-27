<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;


class Participante extends Model
{
    use HasFactory, EncryptedAttribute;
    public $incrementing = false; // No utilizar la columna 'id'
    //protected $primaryKey = 'tu_columna_primaria'; // Define tu clave primaria personalizada
    protected $table = 'participantes';
    protected $fillable = ['dni', 'nombre_y_apellido', 'email', 'telefono','firmaBase64'];
    protected $encryptable =  [
        'nombre_y_apellido',
        'telefono',
        'email',
    ];
}
