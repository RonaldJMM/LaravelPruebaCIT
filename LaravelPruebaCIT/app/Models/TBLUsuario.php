<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TBLUsuario extends Model
{
    protected $table = 'TBL_Usuario';

    protected $fillable = [

        'nombre',
        'apellido_p',
        'apellido_m',
        'correo_electronico',
        'contrasenia',
        'estado_id'

    ];
}
