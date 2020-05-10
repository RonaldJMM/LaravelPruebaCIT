<?php


Route::get('/usuario/inicio','UsuarioController@init')->name('paginaPrincipalUsuario');

Route::get('/usuario/platos', 'PlatoController@listarPlatosUsuario')->name('listarPlatosUsuario');

Route::get('/usuario/platos/{id}/editar', 'PlatoController@editarPlatoUsuario')->name('editarPlatoUsuario');

Route::put('/usuario/platos/{id}/actualizar', 'PlatoController@actualizarPlatoUsuario')->name('actualizarPlatoUsuario');
