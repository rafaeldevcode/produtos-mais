<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{MarcaController, ProdutoController, ComentarioController, ConfiguracaoController, ModalController};

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

Route::get('/produto/{id}', [MarcaController::class, 'produto']);

Route::get('/', [MarcaController::class, 'index']);
Route::get('/marcas', [MarcaController::class, 'listarMarcas']);
Route::get('/adicionar/marca', [MarcaController::class, 'create']);
Route::post('/adicionar/marca', [MarcaController::class, 'store']);
Route::get('/marca/{marcaId}/listarDados', [MarcaController::class, 'listarDados']);
Route::post('/marca/{marcaId}/editar', [MarcaController::class, 'editarMarca']);
Route::post('/marca/{marcaId}/remover', [MarcaController::class, 'destroy']);

Route::get('/adicionar/produto', [ProdutoController::class, 'create']);
Route::post('/adicionar/produto', [ProdutoController::class, 'store']);
Route::get('/marca/{marcaId}/produtos', [ProdutoController::class, 'listarProdutos']);
Route::get('/produto/{produtoId}/listarDados', [ProdutoController::class, 'listarDados']);
Route::post('/produto/{produtoId}/editar', [ProdutoController::class, 'editarDados']);
Route::post('/produto/{produtoId}/remover', [ProdutoController::class, 'destroy']);
Route::get('/produto/{produtoId}/duplicar', [ProdutoController::class, 'duplicar']);

Route::get('/adicionar/comentario', [ComentarioController::class, 'create']);
Route::post('/adicionar/comentario', [ComentarioController::class, 'store']);
Route::get('/marca/{marcaId}/comentarios', [ComentarioController::class, 'listarComentarios']);
Route::get('/comentario/{comentarioId}/listarDados', [ComentarioController::class, 'listarDados']);
Route::post('/comentario/{comentarioId}/editar', [ComentarioController::class, 'editarDados']);
Route::post('/comentario/{comentarioId}/remover', [ComentarioController::class, 'destroy']);
Route::get('/comentario/{comentarioId}/duplicar', [ComentarioController::class, 'duplicar']);

Route::get('/marca/{marcaId}/config', [ConfiguracaoController::class, 'index']);
Route::post('/config/{configId}/editar', [ConfiguracaoController::class, 'editarDados']);

Route::get('/marca/{marcaId}/modal/adicionar', [ModalController::class, 'create']);
Route::post('/marca/{marcaId}/modal/adicionar', [ModalController::class, 'store']);
Route::get('/marca/{marcaId}/modal/listarDados', [ModalController::class, 'listar']);
Route::post('/marca/{marcaId}/modal/editar', [ModalController::class, 'editar']);
Route::post('/modal/{modalId}/remover', [ModalController::class, 'destroy']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
