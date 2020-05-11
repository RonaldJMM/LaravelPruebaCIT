<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Session;

use App\Models\TBLPlato;
use App\Models\TBLComentario;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 


class PlatoController extends Controller
{
    public function listarPlatosGenerales(){

        $platos = TBLPlato::orderBy('id','desc')->paginate();

        $NDatosPlatos = "No se han registrado platos";

        $datosVista=[
            'datosPlatosGenerales'=>$platos,
            'NDatosPlatos' => $NDatosPlatos,
        ];

        return view('content.usuario.plato.listarPlatosGenerales', $datosVista);
    }

    public function listarPlatosUsuario(){

        $idUsuario = Session::get('Usuario_Id');

        $platos = TBLPlato::where(['usuario_id' => $idUsuario,])->orderBy('id','desc')->paginate();

        $NDatosPlatos = "No se han registrado platos";

        $datosVista=[
            'datosPlatosUsuario'=>$platos,
            'NDatosPlatos' => $NDatosPlatos,
        ];

        return view('content.usuario.plato.listarPlatosUsuario', $datosVista);
    }

    public function crearPlatoUsuario(){

        return view('content\usuario\plato\crearPlatoUsuario');

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

        if(request()->file('imagen')){
            $path = Storage::disk('public')->put('images\usuario\plato',request()->file('imagen'));
            //muestra la url para almacenarla en BD
        }else{
            return redirect(route('listarPlatosUsuario')); 
        } 

        $datosPlato = request();
        
        TBLPlato::create([

            'nombre' => $datosPlato->nombre,
            'descripcion' => $datosPlato->descripcion,
            'usuario_id' => $idUsuario,
            'url_imagen' => asset($path),
            'estado_id' => 1,
        ]);

        return redirect(route('listarPlatosUsuario'));
    }

    public function mostrarPlatoUsuario($idPlato){
        $plato = TBLPlato::find($idPlato);

        $comentarios = TBLComentario::where(['plato_id' => $idPlato,])->orderBy('id','desc')->paginate();

        $NDatosComentarios = "No se han registrado comentarios";

        $idUsuario = Session::get('Usuario_Id');

        $datosVista=[
            'plato'=>$plato,
            'comentarios' => $comentarios,
            'NDatosComentarios' => $NDatosComentarios,
            'idUsuario' => $idUsuario,
        ];

        return view('content.usuario.plato.mostrarPlatoUsuario', $datosVista);
    }

    public function editarPlatoUsuario($idPlato){
        
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
