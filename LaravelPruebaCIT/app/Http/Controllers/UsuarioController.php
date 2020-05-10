<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Session;

class UsuarioController extends Controller
{
    public function init(){

        Session::put('Usuario_Id',1);

        return view('content\usuario\paginaPrincipalUsuario');
    }
}
