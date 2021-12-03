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
        $nome_marca = empty($marcas[0]->nome_marca) ? '' : $marcas[0]->nome_marca;

        return view('marca/produto/create', compact('marcas', 'mensagem', 'nome_marca'));
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

        $dados = Produto::find($produtoId);
        
        return view('marca/produto/listarDados', compact('dados', 'produtoId'));
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

        return redirect("/marca/{$produto->marca_id}/produtos");
    }

    public function destroy(int $produtoId, Request $request)
    {
        $produto = Produto::find($produtoId)->nome_produto;
        $marca_id = Produto::find($produtoId)->marca_id;
        Produto::destroy($produtoId);

        $request->session()->flash("mensagem", "{$produto} removido com sucesso!");
        
        return redirect("/marca/{$marca_id}/produtos");
    }
}