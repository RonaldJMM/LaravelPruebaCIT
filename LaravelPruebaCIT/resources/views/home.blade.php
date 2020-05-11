@extends('layouts.app')

@section('homecontent')

<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif  
</div>
@yield('homePrincipal')
@endsection
