<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Session;
use App\Models\TBLPlato;

class PlatoController extends Controller
{
    public function listarPlatosUsuario(){

        $idUsuario = Session::get('Usuario_Id');
        $platos = TBLPlato::where(['usuario_id' => $idUsuario,])->paginate();

        $NDatosPlatos = "No se han registrado platos";

        $datosVista=[
            'datosPlatosUsuario'=>$platos,
            'NDatosPlatos' => $NDatosPlatos,
        ];

        return view('content.usuario.listarPlatosUsuario', $datosVista);
    }

    public function editarPlatoUsuario($idPlato){

        
        $plato = TBLPlato::where(['id' => $idPlato,])->first();

        $datosVista=[
            'datosPlatoUsuario'=>$plato,
        ];

        return view('content\usuario\editarPlatoUsuario', $datosVista);

    }

    public function actualizarPlatoUsuario(){

    }
}
