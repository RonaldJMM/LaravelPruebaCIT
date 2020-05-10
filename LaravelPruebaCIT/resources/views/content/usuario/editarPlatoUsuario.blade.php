@extends('content.usuario.contentUsuario')

@section('editarPlatoUsuario')

<h1>Editar Plato de Usuario</h1>

<form method="POST" action="{{route('actualizarPlatoUsuario', $datosPlatoUsuario->id)}}">

    {{ method_field('PUT') }}
    @csrf
    <table class="table table-sm table-striped table-bordered">
        <thead>
        </thead>
        <tbody>
            <tr>
                <td scope="col"><label for="nombre">Nombre:</label></td>
                <td scope="col"><input type="text" name="nombre" id="nombre" placeholder="example" value="{{ $datosPlatoUsuario->nombre}}"></td>
            </tr>
            <tr>
                <td scope="col"><label for="descripcion">Descripcion:</label></td>
                <td scope="col"><input type="text" name="descripcion" id="descripcion" value="{{ $datosPlatoUsuario->descripcion}}"></td>
            </tr>

            <tr><td colspan="2"><button type="submit" class="btn btn-info" name="B_Actualizar" value="{{ $datosPlatoUsuario->id }}">Actualizar</button></td></tr>
        </tbody>
        </table>  

        
</form>

@endsection