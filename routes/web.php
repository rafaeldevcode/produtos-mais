<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    MarcaController, 
    ProdutoController, 
    ComentarioController, 
    ConfiguracaoController, 
    ModalController, 
    EntrarController, 
    PoliticasController, 
    RegistroController,
    CoutdownController
};

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
Route::get('/marcas', [MarcaController::class, 'listarMarcas'])->middleware('autenticador');
Route::get('/adicionar/marca', [MarcaController::class, 'create'])->middleware('autenticador');
Route::post('/adicionar/marca', [MarcaController::class, 'store'])->middleware('autenticador');
Route::get('/marca/{marcaId}/listarDados', [MarcaController::class, 'listarDados'])->middleware('autenticador');
Route::post('/marca/{marcaId}/editar', [MarcaController::class, 'editarMarca'])->middleware('autenticador');
Route::post('/marca/{marcaId}/remover', [MarcaController::class, 'destroy'])->middleware('autenticador');

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

Route::get('/entrar', [EntrarController::class, 'index']);
Route::post('/entrar', [EntrarController::class, 'entrar']);
Route::get('/sair', [EntrarController::class, 'logout']);

Route::get('/registrar', [RegistroController::class, 'index']);
Route::post('/registrar', [RegistroController::class, 'store']);
Route::get('/usuarios', [RegistroController::class, 'listar']);
Route::post('/usuario/{usuarioId}/remover', [RegistroController::class, 'destroy']);

Route::get('/politicas/privacidade/{id}', [PoliticasController::class, 'privacidade']);
Route::get('/politicas/termos/{id}', [PoliticasController::class, 'termos']);

Route::post('/marca/{marcaId}/coutdown', [CoutdownController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
