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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/produto/{id}', [MarcaController::class, 'produto']);

Route::get('/marcas', [MarcaController::class, 'index']);

Route::get('/adicionar/marca', [MarcaController::class, 'create']);
Route::post('/adicionar/marca', [MarcaController::class, 'store']);
Route::get('/marca/{marcaId}/listarDados', [MarcaController::class, 'listarDados']);
Route::post('/marca/{marcaId}/editar', [MarcaController::class, 'editarMarca']);
Route::get('/marca/{marcaId}/produtos', [MarcaController::class, 'listarProdutos']);
Route::get('/marca/{marcaId}/comentarios', [MarcaController::class, 'listarComentarios']);
Route::post('/marca/{marcaId}/remover', [MarcaController::class, 'destroy']);

Route::get('/adicionar/produto', [ProdutoController::class, 'create']);
Route::post('/adicionar/produto', [ProdutoController::class, 'store']);
Route::get('/produto/{produtoId}/listarDados', [ProdutoController::class, 'listarDados']);
Route::post('/produto/{produtoId}/editar', [ProdutoController::class, 'editarDados']);
Route::post('/produto/{produtoId}/remover', [ProdutoController::class, 'destroy']);

Route::get('/adicionar/comentario', [ComentarioController::class, 'create']);
Route::post('/adicionar/comentario', [ComentarioController::class, 'store']);
Route::get('/comentario/{comentarioId}/listarDados', [ComentarioController::class, 'listarDados']);
Route::post('/comentario/{comentarioId}/editar', [ComentarioController::class, 'editarDados']);
Route::post('/comentario/{comentarioId}/remover', [ComentarioController::class, 'destroy']);