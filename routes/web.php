<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FarmaciaController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'log'])->name('home2');

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/cliente')->name('cliente')->namespace('Cliente')->group(function(){
  Route::prefix('/criar')->name('.cadastrarCliente')->group(function () {
      Route::get('/', [ClienteController::class, 'cadastrarCliente']);
      Route::post('/salvar', [ClienteController::class, 'salvarCadastroCliente'])->name('.salvar');
  });

  Route::prefix('/editar')->name('.editarCliente')->group(function () {
      Route::get('/', [ClienteController::class, 'editarCliente'])->middleware('auth')->middleware('auth');
      Route::post('/salvar', [ClienteController::class, 'salvarEditarCliente'])->name('.salvar')->middleware('auth');
  });

  Route::prefix('/remover')->name('.removerCliente')->group(function () {
      Route::get('/', [ClienteController::class, 'removerCliente'])->middleware('auth');
      Route::get('/remover', [ClienteController::class, 'salvarRemoverCliente'])->name('.remover')->middleware('auth');
  });

  Route::prefix('/buscar')->name('.buscar')->group(function () {
      Route::get('/', [ClienteController::class, 'buscaNome'])->middleware('auth');
  });

  Route::prefix('/carrinho')->name('.carrinho')->group(function () {
      Route::get('/', [ClienteController::class, 'mostrarCarrinho'])->middleware('auth');
      Route::get('/novo/{produto_id}', [ClienteController::class, 'verProduto'])->name('.addprod')->middleware('auth');
      Route::post('/adicionar', [ClienteController::class, 'adicionarAoCarrinho'])->name('.adicionar')->middleware('auth');
      Route::post('/remover/{produto_id}', [ClienteController::class, 'removerDoCarrinho'])->name('.remover')->middleware('auth');
      Route::post('/finalizar', [ClienteController::class, 'finalizarPedido'])->name('.salvar')->middleware('auth');

  });

  Route::prefix('/pedidos')->name('.pedidos')->group(function () {
      Route::get('/cancelar/{id}', [ClienteController::class, 'cancelarPedido'])->name('.cancelar')->middleware('auth');
      Route::get('/', [ClienteController::class, 'historicoPedidos'])->middleware('auth');


  });



});

Route::prefix('/farmacia')->name('farmacia')->namespace('Farmacia')->group(function(){
    Route::prefix('/criar')->name('.cadastrarFarmacia')->group(function () {
        Route::get('/', [FarmaciaController::class, 'cadastrarFarmacia']);
        Route::post('/salvar', [FarmaciaController::class, 'salvarCadastroFarmacia'])->name('.salvar');
    });

    Route::prefix('/editar')->name('.editarFarmacia')->group(function () {
        Route::get('/', [FarmaciaController::class, 'editarFarmacia'])->middleware('auth');
        Route::post('/salvar', [FarmaciaController::class, 'salvarEditarFarmacia'])->name('.salvar')->middleware('auth');
    });

    Route::prefix('/produto')->name('.produto')->group(function () {
      Route::prefix('/criar')->name('.cadastrarProduto')->group(function () {
          Route::get('/', [FarmaciaController::class, 'cadastrarProduto'])->middleware('auth');
          Route::post('/salvar', [FarmaciaController::class, 'salvarCadastrarProduto'])->name('.salvar')->middleware('auth');
      });
      Route::prefix('/ver')->name('.listarProdutos')->group(function () {
          Route::get('/', [FarmaciaController::class, 'listarProdutos'])->middleware('auth');
      });
      Route::prefix('/editar')->name('.editarProduto')->group(function () {
        Route::get('/{id}', [FarmaciaController::class, 'editarProduto'])->middleware('auth');
        Route::post('/salvar', [FarmaciaController::class, 'salvarEditarProduto'])->name('.salvar')->middleware('auth');
        });
        Route::prefix('/mudar')->name('.editarDisponibilidadeProd')->group(function () {
            Route::get('/{id}', [FarmaciaController::class, 'editarDisponibilidadeProd'])->middleware('auth');
            });

        Route::prefix('/remover')->name('.removerProduto')->group(function () {
            Route::get('/{id}', [FarmaciaController::class, 'removerProduto'])->middleware('auth');
            Route::get('/remover/{id}', [FarmaciaController::class, 'salvarRemoverProduto'])->name('.remover')->middleware('auth');
        });
    });

    Route::prefix('/pedidos')->name('.pedidos')->group(function () {
        Route::get('/', [FarmaciaController::class, 'verPedidos'])->middleware('auth');
        Route::get('/{id}', [FarmaciaController::class, 'finalizarPedidoFarmacia'])->name('.salvar')->middleware('auth');
        Route::get('/deletar/{id}', [FarmaciaController::class, 'cancelarPedidoFarmacia'])->name('.cancelar')->middleware('auth');

    });
    Route::prefix('/cliente')->name('.cliente')->group(function () {
        Route::get('/{id}', [FarmaciaController::class, 'verCliente'])->middleware('auth');
        });

    Route::prefix('/remover')->name('.removerFarmacia')->group(function () {
        Route::get('/', [FarmaciaController::class, 'removerFarmacia'])->middleware('auth');
        Route::get('/remover', [FarmaciaController::class, 'salvarRemoverFarmacia'])->name('.remover')->middleware('auth');
    });
});
