<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Marca, User};
use App\Services\Retornar;
use Illuminate\Support\Facades\Auth;
use App\Services\RecuperaParametro;

class ExibirPaginaController extends Controller
{
    private $aviso = 'Você ainda não tem nenhuma marca cadastrada!';
    
    ///// EXIBIR A PAGINA DA MARCA /////
    public function index(int $id, Retornar $retornar, Request $request)
    {
        $politicas = false;
        $marca = Marca::find($id);
        $comentarios = $retornar->retornarComentario($marca);
        $produtos = $retornar->retornarProdutos($marca);
        $config = $marca->configuracoes()->get()[0];
        $modal = empty($marca->modals()->get()[0]) ? '' : $marca->modals()->get()[0];
        $coutdown = empty($marca->coutdown()->get()[0]) ? '' : $marca->coutdown()->get()[0];
        $pixels = explode(',', $marca->pixel);
        $usuario = Auth::user();
        $parametros = $retornar->retornarParametro($request);

        return view('index', compact('marca', 'comentarios', 'produtos', 'config', 'modal', 'politicas', 'pixels', 'coutdown', 'usuario', 'parametros'));
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
    public function carregarMais(int $marcaId, Retornar $retornar)
    {
        $marca = Marca::find($marcaId);
        $comentarios = $retornar->retornarComentario($marca);

        return $comentarios;
    }
}
