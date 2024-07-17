<?php

use App\Http\Controllers\RegistroController;

Route::get('/', [RegistroController::class, 'exibirFormulario'])->name('exibirFormulario');

Route::post('/registro', [RegistroController::class, 'registrar']);

Route::get('/usuarios', [RegistroController::class, 'mostrarUsuario'])->name('mostrarUsuario');

Route::delete('/usuario/{id}', [RegistroController::class, 'excluirUsuario'])->name('excluirUsuario');

Route::get('usuario/editar/{id}', [RegistroController::class, 'editarUsuario'])->name('editarUsuario');

Route::put('usuario/atualizar/{id}', [RegistroController::class, 'atualizarUsuario'])->name('atualizarUsuario');