@extends('content.usuario.contentUsuario')

@section('editarUsuario')

    <h1>Editar Usuario</h1>
    <div class="alert alert-secondary" role="alert">
    <table class="table table-sm table-striped table-bordered table-light">
        <thead>
        </thead>
        <tbody>

    <form method="POST" action="{{route('actualizarUsuario', $datosUsuario->id)}}">

        {{ method_field('PUT') }}
        @csrf
        
        <tr>
            <td scope="col"><label for="nombre">Nombre:</label></td>
            <td scope="col"><input type="text" name="nombre" id="nombre" placeholder="example" value="{{ $datosUsuario->nombre}}"></td>
        </tr>
        
        <tr>
            <td scope="col"><label for="apellido">Apellido:</label></td>
            <td scope="col"><input type="text" name="apellido" id="apellido" value="{{ $datosUsuario->apellido}}"></td>
        </tr>
        
        <tr>
            <td scope="col"><label for="descripcion">Correo:</label></td>
            <td scope="col"><input type="text" name="email" id="email" value="{{ $datosUsuario->email}}" disabled ></td>
        </tr>
        <tr><td colspan="1"><button type="submit" class="btn btn-info">Actualizar</button></td>
    </form>


    </tbody>
    </table>
</div>
    
@endsection
