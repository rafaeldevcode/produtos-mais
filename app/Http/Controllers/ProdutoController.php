<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacaoProduto;
use Illuminate\Http\Request;
use App\Models\{Marca, Produto};
use App\Services\{Adicionar, Remover, Editar, Duplicar};
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{ 
    private $aviso = 'Não exite nenhum produto cadastrado para essa marca!';

    public function __construct()
    {
        $this->middleware('autenticador');
    }
    
    ///// LISTAR PRODUTOS COM ÍCONE DE OPÇÕES /////
    public function create(Request $request)
    {
        $marcas = Marca::all();
        $mensagem = $request->session()->get('mensagem');
        $nome_marca = empty($marcas[0]->nome_marca) ? '' : $marcas[0]->nome_marca;
        $usuario = Auth::user();

        return view('painel/produto/create', compact('marcas', 'mensagem', 'nome_marca', 'usuario'));
    }

    ///// GIARDAR PRODUTOS NO BANCO /////
    public function store(ValidacaoProduto $request, Adicionar $adicionar)
    {

        $marca = Marca::find($request->id);
        $adicionar->adicionarProduto($request, $marca);
        $request->session()->flash("mensagem", "{$request->nome_produto} adicionado com sucesso à {$marca->nome_marca}!");

        return redirect('/adicionar/produto');

    }

    ///// LISTAR TODOS OS PRODUTOS DA MARCA /////
    public function listarProdutos(Request $request, int $marcaId)
    {
        $marca = Marca::find($marcaId);
        $produtos = $marca->produtos()->get();
        $mensagem = $request->session()->get('mensagem');
        $usuario = Auth::user();
        $aviso = $this->aviso;

        return view('/painel/produto/listarProdutos', compact('produtos', 'marca', 'mensagem', 'usuario', 'aviso'));
    }

        ///// LISTAR PRODUTOS PARA EDIÇÃO /////
    public function listarDados(int $produtoId)
    {
        $dados = Produto::find($produtoId);
        $usuario = Auth::user();
        
        return view('painel/produto/listarDados', compact('dados', 'produtoId', 'usuario'));
    }

    ///// GUARDAR PRODUTOS EDITADOS /////
    public function editarDados(Request $request, int $produtoId, Editar $editar)
    {
        $produto = Produto::find($produtoId);
        $editar->editarProduto($request, $produto);
        $request->session()->flash("mensagem", "{$request->nome_produto} alterado com sucesso!");

        return redirect("/marca/{$produto->marca_id}/produtos");
    }

    ///// REMOVER PRODUTO /////
    public function destroy(int $produtoId, Request $request, Remover $remover)
    {
        $produto = Produto::find($produtoId)->nome_produto;
        $marca_id = Produto::find($produtoId)->marca_id;
        $remover->removerProduto($produtoId, $produto);
        $request->session()->flash("mensagem", "{$produto} removido com sucesso!");
        
        return redirect("/marca/{$marca_id}/produtos");
    }

    ///// REMOVER TODOS OS PRODUTOS //////
    public function removerTodos(int $marcaId, Remover $remover, Request $request)
    {
        $remover->removerTodosProdutos($marcaId);
        $request->session()->flash('mensagem', 'Todos os produtos removidos com sucesso!');

        return redirect("/marca/{$marcaId}/produtos");
    }

    ////// DUPLICAR PRODUTO /////
    public function duplicar(int $produtoId, Request $request, Duplicar $duplicar)
    {
        $produto = Produto::find($produtoId);
        $duplicar->duplicarProduto($produto);
        $request->session()->flash("mensagem", "{$produto->nome_produto} clonado com sucesso!");

        return redirect("/marca/{$produto->marca_id}/produtos");
    }
}