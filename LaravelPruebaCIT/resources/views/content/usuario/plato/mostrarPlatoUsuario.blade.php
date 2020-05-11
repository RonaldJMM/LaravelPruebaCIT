@extends('content.usuario.contentUsuario')

@section('mostrarPlatoUsuario')

    <h1>Datos de plato de Usuario</h1>
          
    <br>
    <table class="table table-sm table-striped table-bordered" >
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
            <tr><td colspan="3"><a class="btn btn-warning" href="{{ route('regresarInicio') }}" role="button">Regresar al Inicio</a></td></tr>
        </tbody>
    </table>


    <h1>Comentarios</h1>
          
    
    <table class="table table-sm table-striped table-bordered" >
        <thead class="thead-dark">
            <tr><td colspan="3"><a class="btn btn-success" href="{{ route('crearPlatoUsuario') }}" role="button"><img style="filter: invert(1)" src="{{ url('images/icons/plus-circle-solid.svg') }}" height="30px" width="30px"> Crear Nuevo </a></td></tr>
            <tr><td colspan="3"><div class="card bg-secondary text-white">
                <div class="card-body">
                    {{ $comentarios->total() }} registros | pagina {{  $comentarios->currentPage() }} de {{ $comentarios->lastPage() }}
                </div>
            </div></td>
            </tr>
            <tr>
            <th scope="col">Descripcion</th>
            <th scope="col">Accion</th>                    
            </tr>
        </thead>
        <tbody>
            @forelse ($comentarios as $comentario)
            <tr>
             <td>{{$comentario->descripcion}}</td>
            <td>
                <center>
                @if ($comentario->usuario_id == $idUsuario)
                <a class="btn btn-primary" href="{{ route('editarcomentarioUsuario', $comentario->id) }}" role="button"><img style="filter: invert(1)" src="{{ url('images/icons/edit-solid.svg') }}" height="30px" width="30px"></a>
                
                <form method="POST" action="{{route('deshabilitarcomentarioUsuarioVista', $comentario->id)}}">

                    {{ method_field('PUT') }}
                    @csrf
                    @if ($comentario->estado_id == 1)
                        <button class="btn btn-success" type="submit"><img style="filter: invert(1)" src="{{ url('images/icons/eye-solid.svg') }}" height="30px" width="30px"></button>
                    @else
                        <button class="btn btn-danger" type="submit"><img style="filter: invert(1)" src="{{ url('images/icons/eye-slash-solid.svg') }}" height="30px" width="30px"></button>
                    @endif
                </form>
                @endif
                </center>
            </td>
        </tr>
            @empty
            <tr>
            <td colspan="3">{{$NDatosComentarios}}</td>
            </tr>
            @endforelse
        </tbody>
        </table>
        {!! $comentarios->render()!!}


@endsection