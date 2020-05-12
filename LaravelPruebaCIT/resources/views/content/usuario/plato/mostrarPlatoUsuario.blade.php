@extends('content.usuario.contentUsuario')

@section('mostrarPlatoUsuario')

    <h1>Usuario: {{ $usuario['nombre']." ".$usuario['apellido'] }}</h1>
          
    <div class="alert alert-secondary" role="alert">
    <table class="table table-sm table-striped table-bordered table-light" >
        <thead class="thead-dark">
            <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>                    
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><img src="{{ $plato->url_imagen }}" class="img-thumbnail border-dark rounded mx-auto d-block" height="50px" width="50px"></td>
            <td>{{$plato->nombre}}</td>
            <td>{{$plato->descripcion }}</td>
            </tr>
        </tbody>
    </table>
    </div>


    <h1>Comentarios</h1>
    <div class="alert alert-secondary" role="alert">  
    <table class="table table-sm table-striped table-bordered table-dark" >
        <thead class="thead-dark">
        </thead>
        <tbody>  
    <tr>
                
        <form method="POST" action="{{ route('aniadirComentarioPlato', $plato->id) }}">

            {{ method_field('PUT') }}
            @csrf
            <td colspan="2">
                <textarea class="form-control" name="descripcionComentario" aria-label="With textarea" rows="3" style="resize: none"></textarea>
            </td>
            <td colspan="1">
                <br>
                <button class="btn btn-success" type="submit"><img style="filter: invert(1)" src="{{ url('images/icons/plus-circle-solid.svg') }}" height="30px" width="30px"> Añadir Comentario</button>
            </td>
        </form>
    
</tr>
</tbody>
</table>
<div class="card bg-secondary text-white">
    <div class="card-body">
        {{ $comentarios->total() }} registros | pagina {{  $comentarios->currentPage() }} de {{ $comentarios->lastPage() }}
    </div>
</div>
<br>
    
    <table class="table table-sm table-striped table-bordered table-light" >
        <thead class="thead-dark">
            
            <tr>
            <th scope="col">Usuario</th>
            <th scope="col" colspan="2">Descripcion</th>
            <th scope="col" colspan="1">Editar</th> 
            <th scope="col" colspan="1">Estado</th> 
            <th scope="col" colspan="1">Eliminar</th>                    
            </tr>
        </thead>
        <tbody>
            @forelse ($comentarios as $comentario)
            @if ($comentario->estado_id == 1 || $comentario->usuario_id == $idUsuario)
            <tr>
            <td colspan="1">{{ $comentario->nombre." ".$comentario->apellido }}</td>
             <td colspan="2">{{$comentario->descripcion}}</td>
            
                @if ($comentario->usuario_id == $idUsuario)
                <td colspan="1">
                    <center>
                <a class="btn btn-primary" href="{{ route('editarComentarioPlato', ['idPlato' => $plato->id, 'idComentario' => $comentario->id]) }}" role="button"><img style="filter: invert(1)" src="{{ url('images/icons/edit-solid.svg') }}" height="30px" width="30px"></a>
                    </center>
                </td>
                <td colspan="1">
                    <center>
                <form method="POST" action="{{ route('deshabilitarComentarioPlatoVista', ['idPlato' => $plato->id, 'idComentario' => $comentario->id]) }}">

                    {{ method_field('PUT') }}
                    @csrf
                    @if ($comentario->estado_id == 1)
                        <button class="btn btn-success" type="submit"><img style="filter: invert(1)" src="{{ url('images/icons/eye-solid.svg') }}" height="30px" width="30px"></button>
                    @else
                        <button class="btn btn-danger" type="submit"><img style="filter: invert(1)" src="{{ url('images/icons/eye-slash-solid.svg') }}" height="30px" width="30px"></button>
                    @endif
                </form>
                    </center>
                </td>
                <td colspan="1">
                    <center>
                <a class="btn btn-danger" href="{{ route('eliminarComentarioPlato', ['idPlato' => $plato->id, 'idComentario' => $comentario->id]) }}" role="button"><img style="filter: invert(1)" src="{{ url('images/icons/trash-alt-solid.svg') }}" height="30px" width="30px"></a>
                    </center>
                </td>
                @endif
                
                
            </tr>

            @endif
            @empty
            <tr>
            <td colspan="3">{{$NDatosComentarios}}</td>
            </tr>
            @endforelse
        </tbody>
        </table>
        {!! $comentarios->render()!!}
    </div>
    <a class="btn btn-warning" href="{{ route('regresarInicio') }}" role="button">Regresar al Inicio</a>

@endsection