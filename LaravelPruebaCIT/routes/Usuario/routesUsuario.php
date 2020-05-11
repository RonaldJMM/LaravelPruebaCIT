<?php


Route::get('/usuario/inicio','UsuarioController@init')
    ->name('paginaPrincipalUsuario');

Route::get('/regresar/vista', function () {
    return redirect(route('paginaPrincipalUsuario'));
})->name('regresarInicio');

Route::get('/usuario/platos', 'PlatoController@listarPlatosUsuario')
    ->name('listarPlatosUsuario');

Route::get('/usuario/platos/generales', 'PlatoController@listarPlatosGenerales')
    ->name('listarPlatosGenerales');

Route::get('/usuario/platos/crear', 'PlatoController@crearPlatoUsuario')
    ->name('crearPlatoUsuario');

Route::put('/usuario/platos/aniadir', 'PlatoController@aniadirPlatoUsuario')
    ->name('aniadirPlatoUsuario');

Route::get('/usuario/platos/{id}/mostrar/general', 'PlatoController@mostrarPlatoGeneral')
    ->name('mostrarPlatoGeneral');

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

    //////
Route::get('/usuario/comentarios/{id}/mostrar', 'ComentarioController@listarComentariosPlato')
    ->name('mostrarComentarioGeneral');