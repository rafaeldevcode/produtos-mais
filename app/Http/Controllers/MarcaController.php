<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\{Marca, Comentario, Produto};
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index(Request $request)
    {
        $marcas = Marca::all();
        $mensagem = $request->session()->get('mensagem');

        return view('marca/index', compact('marcas', 'mensagem'));
    }

    public function create()
    {
        return view('marca/create');
    }

    public function store(Request $request)
    {
        $marca = Marca::create($request->all());
        $request->session()->flash("mensagem", "{$marca->nome_marca} adicionado ao banco com sucesso!");

        return redirect('/adicionar/produto');
    }

    public function listarDados(int $marcaId)
    {

        $id = $marcaId - 1;
        $dados = Marca::find($marcaId)->all();

        return view('marca/listarDados' , compact('dados', 'id', 'marcaId'));
    }

    public function editarMarca(Request $request, int $marcaId)
    {

        $marca = Marca::find($marcaId);
        $marca->nome_marca = $request->nome_marca;
        $marca->slug_marca = $request->slug_marca;
        $marca->logomarca = $request->logomarca;
        $marca->favicon = $request->favicon;
        $marca->cor_principal = $request->cor_principal;
        $marca->banner_1 = $request->banner_1;
        $marca->banner_2 = $request->banner_2;
        $marca->banner_3 = $request->banner_3;
        $marca->image_desc = $request->image_desc;
        $marca->titulo_desc = $request->titulo_desc;
        $marca->pixel_1 = $request->pixel_1;
        $marca->tagmanager = $request->tagmanager;
        $marca->save();

        $request->session()->flash("mensagem", "Marca {$request->nome_marca} atualizado com sucesso!");

        return redirect('/marcas');

    }

    public function listarProdutos(Request $request, int $marcaId)
    {

        $marca = Marca::find($marcaId);
        $nome_marca = $marca->nome_marca;
        $produtos = $marca->produtos()->get();

        $mensagem = $request->session()->get('mensagem');

        return view('/marca/listarProdutos', compact('produtos', 'nome_marca', 'mensagem'));
    }

    public function listarComentarios(Request $request, int $comentarioId)
    {

        $marca = Marca::find($comentarioId);
        $nome_marca = $marca->nome_marca;
        $comentarios = $marca->comentarios()->get();

        $mensagem = $request->session()->get('mensagem');

        return view('/marca/listarComent', compact('comentarios', 'nome_marca', 'mensagem'));
    }

    public function destroy(int $marcaId, Request $request)
    {

        $nome_marca = Marca::find($marcaId)->nome_marca;
        $marca = Marca::find($marcaId);
        
        $marca->comentarios->each(function(Comentario $comentario, $marca){
            $comentario->delete();
        });

        $marca->produtos->each(function(Produto $produto){
            $produto->delete();
        });

        $marca->delete();

        $request->session()->flash("mensagem", "{$nome_marca} removida com sucesso!");

        return redirect('/marcas');
    }
}
