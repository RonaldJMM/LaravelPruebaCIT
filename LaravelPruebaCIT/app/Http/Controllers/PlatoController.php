<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Session;
use App\Models\TBLPlato;

class PlatoController extends Controller
{
    public function listarPlatosGenerales(){

        $platos = TBLPlato::paginate();

        $NDatosPlatos = "No se han registrado platos";

        $datosVista=[
            'datosPlatosGenerales'=>$platos,
            'NDatosPlatos' => $NDatosPlatos,
        ];

        return view('content.usuario.listarPlatosGenerales', $datosVista);
    }

    public function listarPlatosUsuario(){

        $idUsuario = Session::get('Usuario_Id');

        $platos = TBLPlato::where(['usuario_id' => $idUsuario,])->orderBy('id','desc')->paginate();

        $NDatosPlatos = "No se han registrado platos";

        $datosVista=[
            'datosPlatosUsuario'=>$platos,
            'NDatosPlatos' => $NDatosPlatos,
        ];

        return view('content.usuario.listarPlatosUsuario', $datosVista);
    }

    public function crearPlatoUsuario(){

        return view('content\usuario\crearPlatoUsuario');

    }

    public function aniadirPlatoUsuario(){

        $idUsuario = Session::get('Usuario_Id');

        $validacionFormulario = request()->validate([
            'nombre' => 'required',
            'descripcion' => ['required'],
        ],[
            'nombre.required' => 'Se debe llenar el campo Nombre',
            'descripcion.required' => 'Se debe llenar la descripcion',
        ]);

        $datosPlato = request();
        
        TBLPlato::create([

            'nombre' => $datosPlato->nombre,
            'descripcion' => $datosPlato->descripcion,
            'usuario_id' => $idUsuario,
            'estado_id' => 1,
        ]);

        return redirect(route('listarPlatosUsuario'));
    }

    public function mostrarPlatoUsuario($idPlato){
        $plato = TBLPlato::find($idPlato);

        $datosVista=[
            'plato'=>$plato,
        ];

        return view('content.usuario.mostrarPlatoUsuario', $datosVista);
    }

    public function editarPlatoUsuario($idPlato){
        
        $plato = TBLPlato::where(['id' => $idPlato,])->first();

        if($plato->usuario_id == Session::get('Usuario_Id')){

            $datosVista=[
                'datosPlatoUsuario'=>$plato,
            ];

            return view('content\usuario\editarPlatoUsuario', $datosVista);
        }else{
            return view('errors\404');
        }

    }

    public function actualizarPlatoUsuario($idPlato){
        
        $datosPlatoUsuario = TBLPlato::find($idPlato);

        if($datosPlatoUsuario->usuario_id == Session::get('Usuario_Id')){

            $validacionFormulario = request()->validate([
                'nombre' => 'required',
                'descripcion' => ['required'],
            ],[
                'nombre.required' => 'Se debe llenar el campo Nombre',
                'descripcion.required' => 'Se debe llenar la descripcion',
            ]);

            $datosPlato = request();

            $datosPlatoUsuario->nombre = $datosPlato['nombre'];
            $datosPlatoUsuario->descripcion = $datosPlato['descripcion'];
            $datosPlatoUsuario->save();

            return redirect(route('editarPlatoUsuario', $idPlato));
        }else{
            return view('errors\404');
        }
    }

    public function deshabilitarPlatoUsuario($idPlato){

        $datosPlatoUsuario = TBLPlato::find($idPlato);

        if($datosPlatoUsuario->usuario_id == Session::get('Usuario_Id')){
                
            if($datosPlatoUsuario->estado_id == 1){
                $datosPlatoUsuario->estado_id = 2;
            }else{
                $datosPlatoUsuario->estado_id = 1;
            }

            $datosPlatoUsuario->save();

            return redirect(route('editarPlatoUsuario', $idPlato));
        }else{
            return view('errors\404');
        }
    }

    public function deshabilitarPlatoUsuarioVista($idPlato){

        $datosPlatoUsuario = TBLPlato::find($idPlato);

        if($datosPlatoUsuario->usuario_id == Session::get('Usuario_Id')){
            
            if($datosPlatoUsuario->estado_id == 1){
                $datosPlatoUsuario->estado_id = 2;
            }else{
                $datosPlatoUsuario->estado_id = 1;
            }

            $datosPlatoUsuario->save();

            return redirect(route('listarPlatosUsuario'));

        }else{
            return view('errors\404');
        }
    }
}
