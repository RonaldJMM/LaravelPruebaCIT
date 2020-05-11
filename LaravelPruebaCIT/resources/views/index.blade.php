@extends('home')

@section('homePrincipal')
    
    @yield('navbar')
    <br>
    <div class="container-fluid">    
        @yield('contentIndex')
    </div>

@endsection