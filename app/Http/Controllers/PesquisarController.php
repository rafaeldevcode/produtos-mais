<?php

namespace App\Http\Controllers;

use App\Models\{Marca, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesquisarController extends Controller
{
    private $mensagem = 'Resultados de pesquisa para ';
    private $aviso = 'Desculpe, não foi encontrado nada relacionado a sua pesquisa!';

    public function __construct()
    {
        $this->middleware('autenticador');
    }

    ///// PESQUISAR POR COMENTARIOS //////
    public function pesquisarComentario(Request $request, int $marcaId)
    {
        $marca = Marca::find($marcaId);
        $comentarios = $marca->comentarios()->where('nome_cliente', 'LIKE', "%{$request->pesquisa}%")->get();
        $resultadoPesquisa = $request->pesquisa;
        $usuario = Auth::user();
        $mensagem = $this->mensagem . $request->pesquisa;
        $aviso = $this->aviso;

        return view('/painel/comentario/listarComent', compact('comentarios', 'resultadoPesquisa', 'usuario', 'mensagem', 'marca', 'aviso'));
    }

    ///// PESQUISAR POR PRODUTOS //////
    public function pesquisarProduto(Request $request, int $marcaId)
    {
        $marca = Marca::find($marcaId);
        $produtos = $marca->produtos()->where('nome_produto', 'LIKE', "%{$request->pesquisa}%")->get();
        $resultadoPesquisa = $request->pesquisa;
        $usuario = Auth::user();
        $mensagem = $this->mensagem . $request->pesquisa;
        $aviso = $this->aviso;

        return view('/painel/produto/listarProdutos', compact('produtos', 'resultadoPesquisa', 'usuario', 'mensagem', 'marca', 'aviso'));
    }

    ///// PESQUISAR POR MARCAS NO PAINEL DE ADMIN //////
    public function pesquisarPainelMarca(Request $request)
    {
        $marcas = Marca::where('nome_marca', 'LIKE', "%{$request->pesquisa}%")->get();
        $resultadoPesquisa = $request->pesquisa;
        $usuario = Auth::user();
        $mensagem = $this->mensagem . $request->pesquisa;
        $aviso = $this->aviso;

        return view('/painel/marca/listarMarcas', compact('marcas', 'resultadoPesquisa', 'usuario', 'mensagem', 'aviso'));
    }

    ///// PESQUISAR POR MARCAS NA EXIBIÇÃO FINAL //////
    public function pesquisarMarca(Request $request)
    {
        $marcas = Marca::where('nome_marca', 'LIKE', "%{$request->pesquisa}%")->get();
        $resultadoPesquisa = $request->pesquisa;
        $usuario = Auth::user();
        $usuarios = User::all();
        $mensagem = $this->mensagem . $request->pesquisa;
        $aviso = $this->aviso;

        return view('/painel/marca/index', compact('marcas', 'resultadoPesquisa', 'usuario', 'mensagem', 'aviso', 'usuarios'));
    }
}
