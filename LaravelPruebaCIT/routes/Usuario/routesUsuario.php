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

Route::put('/usuario/platos/{id}/deshabilitarvista', 'PlatoController@deshabilitarPlatoUsuarioVista')
    ->name('deshabilitarPlatoUsuarioVista');

    //////
Route::put('/usuario/comentarios/{idPlato}/aniadir', 'ComentarioController@aniadirComentarioPlato')
    ->name('aniadirComentarioPlato');

Route::get('/usuario/comentarios/{idPlato}/{idComentario}/editar', 'ComentarioController@editarComentarioPlato')
    ->name('editarComentarioPlato');

Route::put('/usuario/comentarios/{idPlato}/{idComentario}/actualizar', 'ComentarioController@actualizarComentarioPlato')
    ->name('actualizarComentarioPlato');

Route::put('/usuario/comentarios/{idPlato}/{idComentario}/deshabilitar', 'ComentarioController@deshabilitarComentarioPlato')
    ->name('deshabilitarComentarioPlato');

Route::put('/usuario/comentarios/{idPlato}/{idComentario}/deshabilitarvista', 'ComentarioController@deshabilitarComentarioPlatoVista')
    ->name('deshabilitarComentarioPlatoVista');

Route::get('/usuario/comentarios/{idPlato}/{idComentario}/eliminar', 'ComentarioController@eliminarComentarioPlato')
    ->name('eliminarComentarioPlato');

Route::get('/usuario/editar', 'UsuarioController@editarUsuario')
    ->name('editarUsuario');

Route::put('/usuario/editar', 'UsuarioController@actualizarUsuario')
    ->name('actualizarUsuario');
