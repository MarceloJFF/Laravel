<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

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


Route::get('/', [ProdutoController::class, 'listar'])->name('listagem');
Route::get('/produtos/mostra/{id}', [ProdutoController::class, 'mostra'])->name("detalhes")->where(["id" => "[0-9]+"]); //informa pro laravel que id deve ser numero

Route::get("/produtos/novo", [ProdutoController::class, 'novo'])->name('novo');

Route::post('/produtos/adiciona', [ProdutoController::class, 'adiciona'])->name("adiciona");

Route::get('/produtos/remove/{id}', [ProdutoController::class, 'remove'])->name("remover");
