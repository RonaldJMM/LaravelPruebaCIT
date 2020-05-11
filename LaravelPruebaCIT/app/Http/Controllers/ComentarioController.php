<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Session;

use App\Models\TBLPlato;
use App\Models\TBLComentario;

class ComentarioController extends Controller
{
    public function aniadirComentarioPlato($idPlato){

        $idUsuario = Session::get('Usuario_Id');

        $validacionFormulario = request()->validate([
            'descripcionComentario' => ['required'],
        ],[
            'descripcionComentario.required' => 'Se debe llenar la descripcion del comentario',
        ]);

        $datosPlato = TBLPlato::where(['id' => $idPlato,])->first();

        if($datosPlato->estado_id == 1){

            $datosComentario = request();
            
            TBLComentario::create([
                'descripcion' => $datosComentario->descripcionComentario,
                'plato_id' => $idPlato,
                'usuario_id' => $idUsuario,
                'estado_id' => 1,
            ]);
        }

        return redirect(route('mostrarPlatoUsuario',$idPlato))
        ->with('idUsuario');
    }

    public function editarComentarioPlato($idPlato,$idComentario){
        
        $idUsuario = Session::get('Usuario_Id');
        $comentario = TBLComentario::where(['id' => $idComentario,])->first();
        $plato = TBLPlato::where(['id' => $idPlato,])->first();

        if($comentario->usuario_id == Session::get('Usuario_Id')){

            $datosVista=[
                'datosComentarioPlato'=>$comentario,
                'datosPlato'=>$plato,
            ];

            return view('content\usuario\comentario\editarComentarioPlato', $datosVista)
            ->with('idUsuario');
        }else{
            return view('errors\404');
        }

    }

    public function actualizarComentarioPlato($idPlato,$idComentario){
        
        $idUsuario = Session::get('Usuario_Id');
        $datosComentario = TBLComentario::find($idComentario);

        if($datosComentario->usuario_id == Session::get('Usuario_Id')){

            $validacionFormulario = request()->validate([
                'descripcionComentario' => ['required'],
            ],[
                'descripcionComentario.required' => 'Se debe llenar la descripcion',
            ]);

            $datosComentarioPlato = request();

            $datosComentario->descripcion = $datosComentarioPlato['descripcionComentario'];

            $datosComentario->save();

            return redirect(route('editarComentarioPlato', ['idPlato' => $idPlato, 'idComentario' => $idComentario]))
            ->with('idUsuario');
        }else{
            return view('errors\404');
        }
    }

    public function deshabilitarComentarioPlato($idPlato,$idComentario){

        $idUsuario = Session::get('Usuario_Id');
        $datosComentarioPlato = TBLComentario::find($idComentario);

        if($datosComentarioPlato->usuario_id == Session::get('Usuario_Id')){
                
            if($datosComentarioPlato->estado_id == 1){
                $datosComentarioPlato->estado_id = 2;
            }else{
                $datosComentarioPlato->estado_id = 1;
            }

            $datosComentarioPlato->save();

            return redirect(route('editarComentarioPlato', ['idPlato' => $idPlato, 'idComentario' => $idComentario]))
            ->with('idUsuario');
        }else{
            return view('errors\404');
        }
    }

    public function deshabilitarComentarioPlatoVista($idPlato,$idComentario){

        $idUsuario = Session::get('Usuario_Id');
        $datosComentarioPlato = TBLComentario::find($idComentario);

        if($datosComentarioPlato->usuario_id == Session::get('Usuario_Id')){
                
            if($datosComentarioPlato->estado_id == 1){
                $datosComentarioPlato->estado_id = 2;
            }else{
                $datosComentarioPlato->estado_id = 1;
            }

            $datosComentarioPlato->save();

            return redirect(route('mostrarPlatoUsuario',$idPlato))
            ->with('idUsuario');
        }else{
            return view('errors\404');
        }
    }

    public function eliminarComentarioPlato($idPlato,$idComentario){

        $idUsuario = Session::get('Usuario_Id');
        $datosComentarioPlato = TBLComentario::find($idComentario);

        if($datosComentarioPlato->usuario_id == Session::get('Usuario_Id')){
                
            $datosComentarioPlato->delete();

            return redirect(route('mostrarPlatoUsuario',$idPlato))
            ->with('idUsuario');
        }else{
            return view('errors\404');
        }
    }
}
