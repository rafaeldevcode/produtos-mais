<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PainelController, MarcaController, ProdutoController, ComentarioController};

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

Route::get('/painel/admin', [PainelController::class, 'index']);

Route::get('/adicionar/marca', [MarcaController::class, 'create']);
Route::post('/adicionar/marca', [MarcaController::class, 'store']);

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/adicionar/produto', [ProdutoController::class, 'create']);

Route::get('/adicionar/comentario', [ComentarioController::class, 'create']);
