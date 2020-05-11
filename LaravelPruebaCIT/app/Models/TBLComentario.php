<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TBLComentario extends Model
{
    protected $table = 'TBL_Comentario';

    protected $fillable = [

        'descripcion',
        'plato_id',
        'usuario_id',
        'estado_id'

    ];
}
