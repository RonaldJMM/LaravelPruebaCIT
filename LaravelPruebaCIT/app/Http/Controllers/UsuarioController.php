<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\TBLUsuario;

use \Session;

class UsuarioController extends Controller
{
    public function init(){

        return view('content\usuario\paginaPrincipalUsuario');

    }

    public function editarUsuario(){
        
        $usuario = TBLUsuario::find(Session::get('Usuario_Id'));
        
        $datosVista=[

            'datosUsuario'=> $usuario,
        ];

        return view('content\usuario\editar\editarUsuario', $datosVista);
    }

    public function actualizarUsuario(){
        
        $datosUsuario = TBLUsuario::find(Session::get('Usuario_Id'));

        $validacionFormulario = request()->validate([
            'nombre' => 'required',
            'apellido' => ['required'],
        ],[
            'nombre.required' => 'Se debe llenar el campo Nombre',
            'apellido.required' => 'Se debe llenar la descripcion',
        ]);

        $datos = request();

        $datosUsuario->nombre = $datos['nombre'];
        $datosUsuario->apellido = $datos['apellido'];

        
        $datosUsuario->save();

        
        return redirect(route('editarUsuario'));

    }
        
}
