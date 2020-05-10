<?php


Route::get('/usuario/inicio','UsuarioController@init')
    ->name('paginaPrincipalUsuario');

Route::get('/usuario/platos', 'PlatoController@listarPlatosUsuario')
    ->name('listarPlatosUsuario');

Route::get('/usuario/platos/{id}/mostrar', 'PlatoController@mostrarPlatoUsuario')
    ->name('mostrarPlatoUsuario');

Route::get('/usuario/platos/{id}/editar', 'PlatoController@editarPlatoUsuario')
    ->name('editarPlatoUsuario');

Route::put('/usuario/platos/{id}/actualizar', 'PlatoController@actualizarPlatoUsuario')
    ->name('actualizarPlatoUsuario');

Route::put('/usuario/platos/{id}/deshabilitar', 'PlatoController@deshabilitarPlatoUsuario')
    ->name('deshabilitarPlatoUsuario');

Route::put('/usuario/platos/{id}/deshabilitarvistar', 'PlatoController@deshabilitarPlatoUsuarioVista')
    ->name('deshabilitarPlatoUsuarioVista');