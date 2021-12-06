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
        $nome_marca = empty($marcas[0]->nome_marca) ? '' : $marcas[0]->nome_marca;
        $mensagem = $request->session()->get('mensagem');

        return view('marca/index', compact('marcas', 'mensagem', 'nome_marca'));
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

        $dados = Marca::find($marcaId);

        return view('marca/listarDados' , compact('dados', 'marcaId'));
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
        $marca->item_1 = $request->item_1;
        $marca->item_2 = $request->item_2;
        $marca->item_3 = $request->item_3;
        $marca->item_4 = $request->item_4;
        $marca->item_5 = $request->item_5;
        $marca->tag_head = $request->tag_head;
        $marca->tag_body = $request->tag_body;
        $marca->pixel_head = $request->pixel_head;
        $marca->pixel_body = $request->pixel_body;
        $marca->cnpj = $request->cnpj;
        $marca->cidade = $request->cidade;
        $marca->rua = $request->rua;
        $marca->telefone = $request->telefone;
        $marca->email = $request->email;
        $marca->facebook = $request->facebook;
        $marca->instagram = $request->instagram;
        $marca->twitter = $request->twitter;
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

    public function produto(int $id)
    {
        $marca = Marca::find($id);
        $comentarios = $marca->comentarios()->get();
        $produtos = $marca->produtos()->get();

        return view('index', compact('marca', 'comentarios', 'produtos'));
    }
}
