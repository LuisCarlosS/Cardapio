<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;

use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/', [HomeController::class, 'index'])->name("home");
Route::match(['get', 'post'], '/login', [HomeController::class, 'login'])->name("login");
Route::match(['get', 'post'], '/carregarLogin', [HomeController::class, 'carregarLogin'])->name("carregarLogin");
Route::get('/logout', [HomeController::class, 'logout'])->name("logout");

Route::middleware(['auth'])->prefix("admin")->name("admin.")->group(function(){

    Route::match(['get', 'post'],'/home', [AdminController::class, 'indexAdmin'])->name("home");

});

Route::prefix("produto")->name("produto.")->group(function(){

    Route::post('/salvar-categoria', [ProdutoController::class, 'salvarCategoria'])->name("salvar-categoria");
    Route::match(['get', 'post'], '/{id}/editar-categoria', [ProdutoController::class, 'editarCategoria'])->name("editar-categoria");
    Route::post('/salvar-produto', [ProdutoController::class, 'salvarProduto'])->name("salvar-produto");
    Route::match(['get', 'post'], '/{id}/editar-produto', [ProdutoController::class, 'editarProduto'])->name("editar-produto");
    Route::delete('/{id}/deletar-produto', [ProdutoController::class, 'deletarProduto'])->name("deletar-produto");
    Route::get('/{id}/mostrar-produtos', [ProdutoController::class, 'mostrarProdutos'])->name("mostrar-produtos");

});
