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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/cliente')->name('cliente')->namespace('Cliente')->group(function(){
  Route::prefix('/criar')->name('.cadastrarCliente')->group(function () {
      Route::get('/', [ClienteController::class, 'cadastrarCliente']);
      Route::post('/salvar', [ClienteController::class, 'salvarCadastroCliente'])->name('.salvar');
  });

  Route::prefix('/editar')->name('.editarCliente')->group(function () {
      Route::get('/', [ClienteController::class, 'editarCliente']);
      Route::post('/salvar', [ClienteController::class, 'salvarEditarCliente'])->name('.salvar');
  });

  Route::prefix('/remover')->name('.removerCliente')->group(function () {
      Route::get('/', [ClienteController::class, 'removerCliente']);
      Route::get('/remover', [ClienteController::class, 'salvarRemoverCliente'])->name('.remover');
  });

});

Route::prefix('/farmacia')->name('farmacia')->namespace('Farmacia')->group(function(){
    Route::prefix('/criar')->name('.cadastrarFarmacia')->group(function () {
        Route::get('/', [FarmaciaController::class, 'cadastrarFarmacia']);
        Route::post('/salvar', [FarmaciaController::class, 'salvarCadastroFarmacia'])->name('.salvar');
    });

    Route::prefix('/editar')->name('.editarFarmacia')->group(function () {
        Route::get('/', [FarmaciaController::class, 'editarFarmacia']);
        Route::post('/salvar', [FarmaciaController::class, 'salvarEditarFarmacia'])->name('.salvar');
    });

    Route::prefix('/produto')->name('.produto')->group(function () {
      Route::prefix('/criar')->name('.cadastrarProduto')->group(function () {
          Route::get('/', [FarmaciaController::class, 'cadastrarProduto']);
          Route::post('/salvar', [FarmaciaController::class, 'salvarCadastrarProduto'])->name('.salvar');
      });
      Route::prefix('/ver')->name('.listarProdutos')->group(function () {
          Route::get('/', [FarmaciaController::class, 'listarProdutos']);
      });
    });
});
