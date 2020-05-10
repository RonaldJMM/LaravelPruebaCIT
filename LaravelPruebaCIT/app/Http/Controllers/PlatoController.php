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

    public function mostrarPlatoUsuario($idPlato){
        dd($idPlato);
    }

    public function editarPlatoUsuario($idPlato){

        
        $plato = TBLPlato::where(['id' => $idPlato,])->first();

        $datosVista=[
            'datosPlatoUsuario'=>$plato,
        ];

        return view('content\usuario\editarPlatoUsuario', $datosVista);

    }

    public function actualizarPlatoUsuario($idPlato){

        $validacionFormulario = request()->validate([
            'nombre' => 'required',
            'descripcion' => ['required'],
        ],[
            'nombre.required' => 'Se debe llenar el campo Nombre',
            'descripcion.required' => 'Se debe llenar la descripcion',
        ]);

        $datosPlato = request();

        $datosPlatoUsuario = TBLPlato::find($idPlato);

        $datosPlatoUsuario->nombre = $datosPlato['nombre'];
        $datosPlatoUsuario->descripcion = $datosPlato['descripcion'];
        $datosPlatoUsuario->save();

        return redirect(route('editarPlatoUsuario', $idPlato));
    }

    public function deshabilitarPlatoUsuario($idPlato){

        

        $datosPlatoUsuario = TBLPlato::find($idPlato);

        if($datosPlatoUsuario->estado_id == 1){
            $datosPlatoUsuario->estado_id = 2;
        }else{
            $datosPlatoUsuario->estado_id = 1;
        }

        $datosPlatoUsuario->save();

        return redirect(route('editarPlatoUsuario', $idPlato));
    }

    public function deshabilitarPlatoUsuarioVista($idPlato){

        

        $datosPlatoUsuario = TBLPlato::find($idPlato);

        if($datosPlatoUsuario->estado_id == 1){
            $datosPlatoUsuario->estado_id = 2;
        }else{
            $datosPlatoUsuario->estado_id = 1;
        }

        $datosPlatoUsuario->save();

        return redirect(route('listarPlatosUsuario'));
    }
}
