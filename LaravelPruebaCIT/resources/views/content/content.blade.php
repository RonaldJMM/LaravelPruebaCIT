@extends('index')

@section('content')

    <div class="row">
        <div class="col-lg-8">@yield('contentPaginaPrincipal')</div>
        <div class="col-lg-8">@yield('contentUsuario')</div>
        <div class="col-lg-4" style="align-content: center"><img src="../images/anuncios/anuncio1.jpg" style="display:block; " height="95%" width="100%"></div>
    </div>

    
    

@endsection


