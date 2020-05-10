<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TBLPlato extends Model
{
    protected $table = 'TBL_Plato';

    protected $fillable = [

        'nombre',
        'descripcion',
        'usuario_id'

    ];
}
