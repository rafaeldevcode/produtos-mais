<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Marca, Produto};

class ProdutoController extends Controller
{ 
    public function create(Request $request)
    {
        $marcas = Marca::all();
        $mensagem = $request->session()->get('mensagem');

        return view('marca/produto/create', compact('mensagem', 'marcas'));
    }

    public function store(Request $request)
    {

        $marca = Marca::find($request->id);
        $marca->produtos()->create([
            'nome_produto'    => $request->nome_produto,
            'link_compra'     => $request->link_compra,
            'quant_produto'   => $request->quant_produto,
            'image_produto'   => $request->image_produto,
            'valor_unit'      => $request->valor_unit,
            'valor_cheio'     => $request->valor_cheio,
            'valor_parcelado' => $request->valor_parcelado,
            'parcelas'        => $request->parcelas,
            'exibir_produto'  => $request->exibir_produto
        ]);

        $request->session()->flash("mensagem", "Produto adicionado com sucesso à {$marca->nome_marca}!");

        return redirect('/adicionar/produto');

    }

    public function listarDados(int $produtoId)
    {
        $id = $produtoId - 1;
        $dados = Produto::find($produtoId)->all();
        return view('marca/produto/listarDados', compact('dados', 'id', 'produtoId'));
    }

    public function editarDados(Request $request, int $produtoId)
    {
        $produto = Produto::find($produtoId);
        $produto->nome_produto = $request->nome_produto;
        $produto->link_compra = $request->link_compra;
        $produto->quant_produto = $request->quant_produto;
        $produto->image_produto = $request->image_produto;
        $produto->valor_unit = $request->valor_unit;
        $produto->valor_cheio = $request->valor_cheio;
        $produto->valor_parcelado = $request->valor_parcelado;
        $produto->parcelas = $request->parcelas;
        $produto->exibir_produto = $request->exibir_produto;
        $produto->save();

        $request->session()->flash("mensagem", "{$request->nome_produto} alterado com sucesso!");

        return redirect("marca/{$produtoId}/produtos");
    }
}