@extends('content.usuario.contentUsuario')

@section('editarPlatoUsuario')

<h1>Edicion de comentario del plato {{ $datosPlato->nombre }}</h1>

<table class="table table-sm table-striped table-bordered">
    <thead>
    </thead>
    <tbody>

<form method="POST" action="{{route('actualizarComentarioPlato', ['idPlato' => $datosPlato->id, 'idComentario' => $datosComentarioPlato->id])}}">

    {{ method_field('PUT') }}
    @csrf
    
    <tr>
        <td scope="col" colspan="1"><label for="descripcion">Descripcion:</label></td>
       
        <td scope="col" colspan="2"><textarea class="form-control" name="descripcionComentario" aria-label="With textarea" rows="3" style="resize: none">{{ $datosComentarioPlato->descripcion }}</textarea></td>
    </tr>

    <tr><td colspan="1"><button type="submit" class="btn btn-info">Actualizar</button></td>
        
</form>

<form method="POST" action="{{route('deshabilitarComentarioPlato', ['idPlato' => $datosPlato->id, 'idComentario' => $datosComentarioPlato->id])}}">

    {{ method_field('PUT') }}
    @csrf
    
    @if ($datosComentarioPlato->estado_id == 1)
    <td colspan="1"><button type="submit" class="btn btn-danger">Deshabilitar</button></td>
    @else
    <td colspan="1"><button type="submit" class="btn btn-success">Habilitar</button></td>
    @endif
    
</form>
<td colspan="1"><a class="btn btn-danger" href="{{ route('eliminarComentarioPlato', ['idPlato' => $datosPlato->id, 'idComentario' => $datosComentarioPlato->id]) }}" role="button">Eliminar</a></td>
</tr>
</tbody>
</table>  

<a class="btn btn-warning" href="{{ route('mostrarPlatoUsuario',$datosPlato->id) }}" role="button">Regresar</a>

@endsection