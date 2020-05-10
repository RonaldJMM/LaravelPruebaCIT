@extends('content.usuario.contentUsuario')

@section('crearPlatoUsuario')

<h1>Crear Plato de Usuario</h1>

<table class="table table-sm table-striped table-bordered">
    <thead>
    </thead>
    <tbody>

<form method="POST" action="{{route('aniadirPlatoUsuario')}}">

    {{ method_field('PUT') }}
    @csrf
    
    <tr>
        <td scope="col"><label for="nombre">Nombre:</label></td>
        <td scope="col"><input type="text" name="nombre" id="nombre" placeholder="example" value="{{ old('nombre')}}"></td>
    </tr>
    <tr>
        <td scope="col"><label for="descripcion">Descripcion:</label></td>
        <td scope="col"><input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion')}}"></td>
    </tr>

    <tr><td colspan="1"><button type="submit" class="btn btn-success"><img style="filter: invert(1)" src="../../images/icons/plus-circle-solid.svg" height="30px" width="30px"> Crear</button></td>
        
</form>
</tbody>
</table>  

<a class="btn btn-warning" href="{{ route('listarPlatosUsuario') }}" role="button">Regresar</a>

@endsection