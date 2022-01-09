<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Comentario, Marca, User};
use App\Services\ExibirComentario;
use Illuminate\Support\Facades\Auth;

class ExibirPaginaController extends Controller
{
    private $aviso = 'Você ainda não tem nenhuma marca cadastrada!';
    
    ///// EXIBIR A PAGINA DA MARCA /////
    public function index(int $id, ExibirComentario $exibirComentario)
    {
        $politicas = false;
        $marca = Marca::find($id);
        $comentarios = $exibirComentario->retornarComentario($marca);
        $produtos = $marca->produtos()->get();
        $config = $marca->configuracoes()->get()[0];
        $modal = empty($marca->modals()->get()[0]) ? '' : $marca->modals()->get()[0];
        $coutdown = empty($marca->coutdown()->get()[0]) ? '' : $marca->coutdown()->get()[0];
        $pixels = explode(',', $marca->pixel);
        $usuario = Auth::user();

        return view('index', compact('marca', 'comentarios', 'produtos', 'config', 'modal', 'politicas', 'pixels', 'coutdown', 'usuario'));
    }

    ///// LISTAR LINKS COM AS MARCAS CADASTRADAS /////
    public function listarMarcas(Request $request)
    {
        $marcas = Marca::all();
        $nome_marca = empty($marcas[0]->nome_marca) ? '' : $marcas[0]->nome_marca;
        $usuario = Auth::user() == null ? 'Deslogado' : Auth::user();
        $usuarios = User::all();
        $mensagem = $request->session()->get('mensagem');
        $aviso = $this->aviso;

        return view('painel/marca/index', compact('marcas', 'nome_marca', 'usuario', 'usuarios', 'aviso', 'mensagem'));
    }

    /////// CARREGAR MAIS COMENTÁRIOS VIA AJAX ///////
    public function carregarMais(int $marcaId, ExibirComentario $exibirComentario)
    {
        $marca = Marca::find($marcaId);
        $comentarios = $exibirComentario->retornarComentario($marca);

        return $comentarios;
    }
}
