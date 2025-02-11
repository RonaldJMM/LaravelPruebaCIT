@extends('content.content')

@section('contentPaginaPrincipal')

@if ($errors->any())
<div class="alert alert-danger" role="alert">
<h4>Se han presentado los siguientes errores:</h4>
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
</div>
@endif
    @yield('paginaInicio')
    
@endsection