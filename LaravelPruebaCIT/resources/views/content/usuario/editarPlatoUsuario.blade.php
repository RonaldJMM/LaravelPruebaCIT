@extends('content.usuario.contentUsuario')

@section('editarPlatoUsuario')

<h1>Editar Plato de Usuario</h1>

<table class="table table-sm table-striped table-bordered">
    <thead>
    </thead>
    <tbody>

<form method="POST" action="{{route('actualizarPlatoUsuario', $datosPlatoUsuario->id)}}">

    {{ method_field('PUT') }}
    @csrf
    
    <tr>
        <td scope="col"><label for="nombre">Nombre:</label></td>
        <td scope="col"><input type="text" name="nombre" id="nombre" placeholder="example" value="{{ $datosPlatoUsuario->nombre}}"></td>
    </tr>
    <tr>
        <td scope="col"><label for="descripcion">Descripcion:</label></td>
        <td scope="col"><input type="text" name="descripcion" id="descripcion" value="{{ $datosPlatoUsuario->descripcion}}"></td>
    </tr>

    <tr><td colspan="1"><button type="submit" class="btn btn-info">Actualizar</button></td>
        
</form>

<form method="POST" action="{{route('deshabilitarPlatoUsuario', $datosPlatoUsuario->id)}}">

    {{ method_field('PUT') }}
    @csrf
    
    @if ($datosPlatoUsuario->estado_id == 1)
    <td colspan="2"><button type="submit" class="btn btn-danger">Deshabilitar</button></td>
    @else
    <td colspan="2"><button type="submit" class="btn btn-success">Habilitar</button></td>
    @endif
    </tr>
</form>

</tbody>
</table>  

<a class="btn btn-warning" href="{{ route('listarPlatosUsuario') }}" role="button">Regresar</a>

@endsection