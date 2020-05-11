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

        return redirect(route('mostrarPlatoUsuario',$idPlato));
    }

    public function editarComentarioPlato($idPlato){
        
        $plato = TBLPlato::where(['id' => $idPlato,])->first();

        if($plato->usuario_id == Session::get('Usuario_Id')){

            $datosVista=[
                'datosPlatoUsuario'=>$plato,
            ];

            return view('content\usuario\plato\editarPlatoUsuario', $datosVista);
        }else{
            return view('errors\404');
        }

    }

    public function actualizarComentarioPlato($idPlato){
        
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

            if(request()->file('imagen')){
                //falta eliminar imagen
                File::delete($datosPlatoUsuario->url_imagen);
                $path = Storage::disk('public')->put('images\usuario\plato',request()->file('imagen'));
                $datosPlatoUsuario->url_imagen = asset($path);
            }

            $datosPlatoUsuario->save();

            return redirect(route('editarPlatoUsuario', $idPlato));
        }else{
            return view('errors\404');
        }
    }

    public function deshabilitarComentarioPlato($idPlato){

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
}
