@extends('layouts.app')

@section('homecontent')

<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif  
</div>
<br>
<div class="container-fluid"> 
@if (Session::has('Usuario_Id'))
    @yield('homePrincipal')
@else
    @include('errors.404')
@endif
</div>
@endsection
