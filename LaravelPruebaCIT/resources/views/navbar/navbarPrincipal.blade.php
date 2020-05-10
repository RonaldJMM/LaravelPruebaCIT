@extends('navbar.navbar')

@section('navbarPrincipal')
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <a class="navbar-brand" href="#">
            <img src="images/aplication/iconoProject.png" width="40" height="40" class="d-inline-block align-top" alt="">
            Restaurante CIT
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="">Registro <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="{{ route('paginaPrincipalUsuario') }}">Inicio de Sesión <span class="sr-only">(current)</span></a>
              </li>
          </ul>
        </div>
      </nav>
@endsection