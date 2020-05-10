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
            <td><img src="../images/anuncios/anuncio1.jpg" class="rounded mx-auto d-block" height="50px" width="50px"></td>
            <td>{{$plato->nombre}}</td>
            <td>{{$plato->descripcion }}</td>
            </tr>
            <tr><td colspan="3"><a class="btn btn-warning text-white" href="{{ route('regresarInicio') }}" role="button">Regresar al Inicio</a></td></tr>
        </tbody>
    </table>

@endsection