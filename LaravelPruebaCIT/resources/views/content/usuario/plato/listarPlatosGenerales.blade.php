@extends('content.usuario.contentUsuario')

@section('listarPlatosGenerales')

    <h1>Lista de platos Generales</h1>
    
    <div class="alert alert-secondary" role="alert">
    <div class="card bg-secondary text-white">
        <div class="card-body">
            {{ $datosPlatosGenerales->total() }} registros | pagina {{  $datosPlatosGenerales->currentPage() }} de {{ $datosPlatosGenerales->lastPage() }}
        </div>
        </div>
        <br>
    <table class="table table-sm table-striped table-bordered table-light" >
        <thead class="thead-dark">
            <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Nombre</th>
            <th scope="col">Información</th>                    
            </tr>
        </thead>
        <tbody>
            @forelse ($datosPlatosGenerales as $plato)
            @if ($plato->estado_id == 1)
                
            
                <tr>
                <td><img src="{{ $plato->url_imagen }}" class="img-thumbnail border-dark rounded mx-auto d-block" height="50px" width="50px"></td>
                <td>{{$plato->nombre}}</td>
                <td>
                    <center>
                    <a class="btn btn-warning" href="{{ route('mostrarPlatoUsuario', $plato->id) }}" role="button"><img style="filter: invert(1)" src="{{ url('images/icons/info-circle-solid.svg') }}" height="30px" width="30px"></a>
                    
                    </center>
                </td>
                </tr>
            @endif
            @empty
            <tr>
            <td colspan="3">{{$NDatosPlatos}}</td>
            </tr>
            @endforelse
        </tbody>
        </table>
        {!! $datosPlatosGenerales->render()!!}
    </div>
@endsection

