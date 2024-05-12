<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicoController;

Route::get('/', [LoginController::class, 'showLoginForm']);


Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Routes to works with services

    Route::resource('usuarios', UsuarioController::class);

    Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos.index');
    Route::get('/servicos/create',[ServicoController::class, 'create'])->name('servicos.create');
    Route::post('/servicos',[ServicoController::class,'store'])->name('servicos.store');
    Route::get('/servicos/{servico}/edit', [ServicoController::class, 'edit'])->name('servicos.edit');
    Route::put('/servicos/{servico}', [ServicoController::class, 'update'])->name('servicos.update');
});


