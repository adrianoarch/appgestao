<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\UsuarioController;


Route::get('/', [PrincipalController::class, 'principal'])
    ->name('site.index');

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'contato'])
    ->name('site.contato');
    
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login', function(){return 'Login';})->name('site.login');

Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){return 'Clientes';})
    ->name('app.clientes')
    ->middleware('autenticacao');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])
    ->name('app.fornecedores')
    ->middleware('autenticacao');
    Route::get('/produtos', function(){return 'produtos';})
    ->name('app.produtos')
    ->middleware('autenticacao');
});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('site.teste');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});