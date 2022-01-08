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
    CoutdownController,
    ObrigadoController,
    PesquisarController,
    GaleriaController,
    ExibirPaginaController
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

Route::get('/produto/{id}', [ExibirPaginaController::class, 'index']);
Route::get('/', [ExibirPaginaController::class, 'listarMarcas']);
Route::get('/carregar/comentario/{marcaId}', [ExibirPaginaController::class, 'carregarMais']);

Route::get('/painel', [MarcaController::class, 'listarMarcas']);
Route::get('/adicionar/marca', [MarcaController::class, 'create']);
Route::post('/adicionar/marca', [MarcaController::class, 'store']);
Route::get('/marca/{marcaId}/listarDados', [MarcaController::class, 'listarDados']);
Route::post('/marca/{marcaId}/editar', [MarcaController::class, 'editarMarca']);
Route::post('/marca/{marcaId}/remover', [MarcaController::class, 'destroy']);

Route::get('/galeria', [GaleriaController::class, 'index']);
Route::post('/galeria/imagen/remover', [GaleriaController::class, 'destroy']);
Route::post('/galeria/imegen/adicionar', [GaleriaController::class, 'store']);

Route::get('/adicionar/produto', [ProdutoController::class, 'create']);
Route::post('/adicionar/produto', [ProdutoController::class, 'store']);
Route::get('/marca/{marcaId}/produtos', [ProdutoController::class, 'listarProdutos']);
Route::get('/produto/{produtoId}/listarDados', [ProdutoController::class, 'listarDados']);
Route::post('/produto/{produtoId}/editar', [ProdutoController::class, 'editarDados']);
Route::post('/produto/{produtoId}/remover', [ProdutoController::class, 'destroy']);
Route::get('/produto/{produtoId}/duplicar', [ProdutoController::class, 'duplicar']);
Route::post('/marca/{marcaId}/produtos/remover/todos', [ProdutoController::class, 'removerTodos']);

Route::get('/adicionar/comentario', [ComentarioController::class, 'create']);
Route::post('/adicionar/comentario', [ComentarioController::class, 'store']);
Route::get('/marca/{marcaId}/comentarios', [ComentarioController::class, 'listarComentarios']);
Route::get('/comentario/{comentarioId}/listarDados', [ComentarioController::class, 'listarDados']);
Route::post('/comentario/{comentarioId}/editar', [ComentarioController::class, 'editarDados']);
Route::post('/comentario/{comentarioId}/remover', [ComentarioController::class, 'destroy']);
Route::get('/comentario/{comentarioId}/duplicar', [ComentarioController::class, 'duplicar']);
Route::post('/marca/{marcaId}/comentarios/remover/todos', [ComentarioController::class, 'removerTodos']);

Route::get('/marca/{marcaId}/config', [ConfiguracaoController::class, 'index']);
Route::post('/config/{configId}/editar', [ConfiguracaoController::class, 'editarDados']);

Route::get('/marca/{marcaId}/modal/adicionar', [ModalController::class, 'create']);
Route::post('/marca/{marcaId}/modal/adicionar', [ModalController::class, 'store']);
Route::get('/marca/{marcaId}/modal/listarDados', [ModalController::class, 'listar']);
Route::post('/marca/{marcaId}/modal/editar', [ModalController::class, 'editar']);
Route::post('/modal/{modalId}/remover', [ModalController::class, 'destroy']);

Route::get('/entrar', [EntrarController::class, 'create']);
Route::post('/entrar', [EntrarController::class, 'store']);
Route::get('/sair', [EntrarController::class, 'logout']);

Route::get('/registrar', [RegistroController::class, 'create'])->middleware('autenticador');
Route::post('/registrar', [RegistroController::class, 'store']);
Route::get('/usuarios', [RegistroController::class, 'listar'])->middleware('autenticador');
Route::post('/usuario/{usuarioId}/remover', [RegistroController::class, 'destroy'])->middleware('autenticador');
Route::post('/editar/usuario/{usuarioId}', [RegistroController::class, 'editarUsuario'])->middleware('autenticador');

Route::get('/politicas/privacidade/{id}', [PoliticasController::class, 'privacidade']);
Route::get('/politicas/termos/{id}', [PoliticasController::class, 'termos']);

Route::post('/marca/{marcaId}/coutdown', [CoutdownController::class, 'store']);
Route::post('/marca/{marcaId}/coutdown/editar', [CoutdownController::class, 'editar']);

Route::get('/obrigado/{marcaId}', [ObrigadoController::class, 'obrigado']);
Route::get('/obrigado/upsell/{marcaId}', [ObrigadoController::class, 'upsell']);
Route::get('/obrigado/upsell/{marcaId}/adicionar', [ObrigadoController::class, 'upsellCreate'])->middleware('autenticador');
Route::post('/obrigado/upsell/{marcaId}/adicionar', [ObrigadoController::class, 'upsellStore'])->middleware('autenticador');
Route::get('/obrigado/upsell/{marcaId}/listar', [ObrigadoController::class, 'upsellListar'])->middleware('autenticador');
Route::post('/obrigado/upsell/{marcaId}/editar', [ObrigadoController::class, 'upsellEditar'])->middleware('autenticador');
Route::post('/obrigado/upsell/{marcaId}/remover', [ObrigadoController::class, 'destroyUpsell'])->middleware('autenticador');

Route::post('/marca/{marcaId}/pesquisar/comentario', [PesquisarController::class, 'pesquisarComentario']);
Route::post('/marca/{marcaId}/pesquisar/produto', [PesquisarController::class, 'pesquisarProduto']);
Route::post('/marca/painel/pesquisar', [PesquisarController::class, 'pesquisarPainelMarca']);

Route::post('/marca/pesquisar', [PesquisarController::class, 'pesquisarMarca']);

Route::get('/dashboard', [MarcaController::class, 'listarMarcas'])->middleware('autenticador')->name('dashboard');

Route::get('/login', [EntrarController::class, 'create'])->middleware('autenticador')->name('login');;
Route::post('/login', [EntrarController::class, 'store'])->middleware('autenticador');

Route::get('/register', [RegistroController::class, 'create'])->middleware('autenticador');
Route::post('/register', [RegistroController::class, 'store'])->middleware('autenticador');