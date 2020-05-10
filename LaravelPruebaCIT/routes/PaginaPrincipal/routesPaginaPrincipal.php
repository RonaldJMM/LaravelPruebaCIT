<?php

Route::get('/inicio',function () {
    return view('content\paginaPrincipal\paginaInicio');
})->name('inicio');