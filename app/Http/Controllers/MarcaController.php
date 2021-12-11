<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacaoMarca;
use App\Services\{Adicionar, Remover, Editar};

class MarcaController extends Controller
{

    ///// LISTAR LINKS COM AS MARCAS CADASTRADAS /////
    public function index()
    {
        $marcas = Marca::all();
        $nome_marca = empty($marcas[0]->nome_marca) ? '' : $marcas[0]->nome_marca;

        return view('marca/index', compact('marcas', 'nome_marca'));
    }

    ///// LISTAR MARCAS COM ÍCONES DE OPÇÕES ///// 
    public function listarMarcas(Request $request)
    {
        $marcas = Marca::all();
        $nome_marca = empty($marcas[0]->nome_marca) ? '' : $marcas[0]->nome_marca;
        $mensagem = $request->session()->get('mensagem');

        return view('marca/listarMarcas', compact('marcas', 'mensagem', 'nome_marca'));
    }

    ///// CHARMAR ARQUIVO PARA ADICIONAR MARCA AO BONCO /////
    public function create()
    {
        return view('marca/create');
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

        return view('marca/listarDados' , compact('dados', 'marcaId'));
    }

    ///// ENVIAR DADOS EDITADO /////
    public function editarMarca(Request $request, int $marcaId, Editar $editar)
    {
        $editar->editarMarca($request, $marcaId);
        $request->session()->flash("mensagem", "Marca {$request->nome_marca} atualizado com sucesso!");

        return redirect('/marcas');
    }

    ///// REMOVER A TABELA MARCA /////
    public function destroy(int $marcaId, Request $request, Remover $remover)
    {
        $nome_marca = Marca::find($marcaId)->nome_marca;
        $nome_marca = $remover->removerMarca($marcaId);
        $request->session()->flash("mensagem", "{$nome_marca} removida com sucesso!");

        return redirect('/marcas');
    }

    ///// EXIBIR A PAGINA DA MARCA /////
    public function produto(int $id)
    {
        $marca = Marca::find($id);
        $comentarios = $marca->comentarios()->get();
        $produtos = $marca->produtos()->get();
        $config = $marca->configuracoes()->get();
        $modal = $marca->modals()->get();

        return view('index', compact('marca', 'comentarios', 'produtos', 'config', 'modal'));
    }
}
