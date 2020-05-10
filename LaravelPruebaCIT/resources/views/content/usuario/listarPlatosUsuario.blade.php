@extends('content.usuario.contentUsuario')

@section('listarPlatosUsuario')

    <h1>Lista de platos de Usuario</h1>
          
    <div class="card bg-secondary text-white">
        <div class="card-body">
            {{ $datosPlatosUsuario->total() }} registros | pagina {{  $datosPlatosUsuario->currentPage() }} de {{ $datosPlatosUsuario->lastPage() }}
        </div>
        </div>
        <br>
    <table class="table table-sm table-striped table-bordered" >
        <thead class="thead-dark">
            <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Nombre</th>
            <th scope="col">Accion</th>                    
            </tr>
        </thead>
        <tbody>
            @forelse ($datosPlatosUsuario as $plato)
            <tr>
            <td><img src="../images/anuncios/anuncio1.jpg" class="rounded mx-auto d-block" height="50px" width="50px"></td>
            <td>{{$plato->nombre}}</td>
            <td><center><a class="btn btn-primary" href="{{ route('editarPlatoUsuario', $plato->id) }}" role="button"><img style="filter: invert(1)" src="../images/icons/edit-solid.svg" height="30px" width="30px"></a></center></td>
        </tr>
            @empty
            <tr>
            <td>{{$NDatosPlatos}}</td>
            </tr>
            @endforelse
        </tbody>
        </table>
        {!! $datosPlatosUsuario->render()!!}

@endsection

