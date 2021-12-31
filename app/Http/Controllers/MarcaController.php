<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacaoMarca;
use App\Models\User;
use App\Services\{Adicionar, Remover, Editar};
use Illuminate\Support\Facades\Auth;

class MarcaController extends Controller
{

    ///// LISTAR LINKS COM AS MARCAS CADASTRADAS /////
    public function index()
    {
        $marcas = Marca::all();
        $nome_marca = empty($marcas[0]->nome_marca) ? '' : $marcas[0]->nome_marca;
        $usuario = Auth::user() == null ? 'Deslogado' : Auth::user()->name;
        $usuarios = User::all();

        return view('painel/marca/index', compact('marcas', 'nome_marca', 'usuario', 'usuarios'));
    }

    ///// LISTAR MARCAS COM ÍCONES DE OPÇÕES ///// 
    public function listarMarcas(Request $request)
    {
        $marcas = Marca::all();
        $nome_marca = empty($marcas[0]->nome_marca) ? '' : $marcas[0]->nome_marca;
        $mensagem = $request->session()->get('mensagem');
        $usuario = Auth::user()->name;
        $aviso = 'Desculpe, não foi encontrado nada relacionado a sua pesquisa!';

        return view('painel/marca/listarMarcas', compact('marcas', 'mensagem', 'nome_marca', 'usuario', 'aviso'));
    }

    ///// CHARMAR ARQUIVO PARA ADICIONAR MARCA AO BONCO /////
    public function create()
    {
        $usuario = Auth::user()->name;

        return view('painel/marca/create', compact('usuario'));
    }

    ///// GUARDAR DADOS NO BANCO /////
    public function store(ValidacaoMarca $request, Adicionar $adicionar)
    {
        $adicionar->adicionarMarca($request);
        $marca = $request->nome_marca;
        $request->session()->flash("mensagem", "{$marca} adicionado ao banco com sucesso!");

        return redirect('/adicionar/produto');
    }

    ///// LISTAR DADOS DA MARCA PARA EDIÇÃO /////
    public function listarDados(int $marcaId)
    {
        $dados = Marca::find($marcaId);
        $usuario = Auth::user()->name;

        return view('painel/marca/listarDados' , compact('dados', 'marcaId', 'usuario'));
    }

    ///// ENVIAR DADOS EDITADO /////
    public function editarMarca(Request $request, int $marcaId, Editar $editar)
    {
        $editar->editarMarca($request, $marcaId);
        $request->session()->flash("mensagem", "Marca {$request->nome_marca} atualizado com sucesso!");

        return redirect('/painel');
    }

    ///// REMOVER A TABELA MARCA /////
    public function destroy(int $marcaId, Request $request, Remover $remover)
    {
        $nome_marca = Marca::find($marcaId)->nome_marca;
        $remover->removerMarca($marcaId);
        $request->session()->flash("mensagem", "{$nome_marca} removida com sucesso!");

        return redirect('/painel');
    }

    ///// EXIBIR A PAGINA DA MARCA /////
    public function produto(int $id)
    {
        $politicas = false;
        $marca = Marca::find($id);
        $comentarios = $marca->comentarios()->get();
        $produtos = $marca->produtos()->get();
        $config = $marca->configuracoes()->get()[0];
        $modal = empty($marca->modals()->get()[0]) ? '' : $marca->modals()->get()[0];
        $coutdown = empty($marca->coutdown()->get()[0]) ? '' : $marca->coutdown()->get()[0];
        $pixels = explode(',', $marca->pixel);

        return view('index', compact('marca', 'comentarios', 'produtos', 'config', 'modal', 'politicas', 'pixels', 'coutdown'));
    }
}
