<?php

namespace App\Models;
 
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class TBLUsuario extends Authenticatable{
 
    use Notifiable;
 
    protected $table = 'TBL_Usuario';
    protected $fillable = [

        'nombre',
        'apellido',
        'email',
        'password',
        'estado_id'

    ];
}
