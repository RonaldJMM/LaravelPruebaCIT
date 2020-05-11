@extends('index')

@section('contentIndex')

    <div class="row">
        <div class="col-lg-8">@yield('contentPaginaPrincipal')</div>
        @if (Session::has('Usuario_Id'))
            
            <div class="col-lg-8">@yield('contentUsuario')</div>

        @endif
        <div class="col-lg-4" style="align-content: center"><img src="{{ url('images/aplication/iconoProject.png') }}" style="display:block; " height="95%" width="100%"></div>
    </div>

    
    

@endsection


