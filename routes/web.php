<?php

use App\Http\Controllers\RegistroController;

Route::get('/registro', [RegistroController::class, 'exibirFormulario']);

Route::post('/registro', [RegistroController::class, 'registrar']);

Route::get('/usuarios', [RegistroController::class, 'mostrarUsuario']);

Route::delete('/usuario/{id}', [RegistroController::class, 'excluirUsuario'])->name('excluirUsuario');