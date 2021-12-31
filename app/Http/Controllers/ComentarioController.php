<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacaoComentario;
use Illuminate\Http\Request;
use App\Models\{Marca, Comentario};
use App\Services\{Adicionar, Duplicar, Remover, Editar};
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('autenticador');
    }

    ///// LISTAR COMENTÁRIOS COM ÍCONES DE OPÇÕES /////
    public function create(Request $request)
    {
        $marcas = Marca::all();
        $mensagem = $request->session()->get('mensagem');
        $nome_marca = empty($marcas[0]->nome_marca) ? '' : $marcas[0]->nome_marca;
        $usuario = Auth::user()->name;

        return view('painel/comentario/create', compact('marcas', 'mensagem', 'nome_marca', 'usuario'));
    }

    ///// GUARDAR COMENTÁRIOS NO BANCO /////
    public function store(ValidacaoComentario $request, Adicionar $adicionar)
    {
        $adicionar->adicionarComentario($request);

        $request->session()->flash("mensagem", "Comentário de {$request->nome_cliente} adicionado com sucesso!");

        return redirect('/adicionar/comentario');
    }

    ///// LISTAR TODOS OS COMENTÁRIOS DA MARCA /////
    public function listarComentarios(Request $request, int $comentarioId)
    {
        $marca = Marca::find($comentarioId);
        $nome_marca = $marca->nome_marca;
        $comentarios = $marca->comentarios()->get();
        $mensagem = $request->session()->get('mensagem');
        $usuario = Auth::user()->name;

        return view('/painel/comentario/listarComent', compact('comentarios', 'nome_marca', 'mensagem', 'usuario'));
    }

    ///// LISTAR COMENTÁRIOS PARA EDIÇÃO /////
    public function listarDados(int $comentarioId)
    {
        $dados = Comentario::find($comentarioId);
        $usuario = Auth::user()->name;

        return view('/painel/comentario/listarDados', compact('dados', 'comentarioId', 'usuario'));
    }

    ///// GUARDAR COMENTÁRIOS EDITADO /////
    public function editarDados(Request $request, int $comentarioId, Editar $editar)
    {
        $comentario = Comentario::find($comentarioId);
        $editar->editarComentario($request, $comentario);
        $request->session()->flash("mensagem", "Comentário de {$request->nome_cliente} editado com sucesso!");

        return redirect("/marca/{$comentario->marca_id}/comentarios");
    }

    ///// REMOVER COMENTÁRIO //////
    public function destroy(Request $request, Remover $remover)
    {
        $nome_cliente = Comentario::find($request->comentarioId)->nome_cliente;
        $marca_id = Comentario::find($request->comentarioId)->marca_id;
        $remover->removerComentario($request);
        $request->session()->flash("mensagem", "Comentário de {$nome_cliente} removido com sucesso!");

        return redirect("/marca/{$marca_id}/comentarios");
    }

    ///// DUPLICAR COMENTÁRIO /////
    public function duplicar(int $comentarioId, Request $request, Duplicar $duplicar)
    {
        $comentario = Comentario::find($comentarioId);
        $duplicar->duplicarComentario($comentario);
        $request->session()->flash("mensagem", "Comentário de {$comentario->nome_cliente} clonado com sucesso!");

        return redirect("/marca/{$comentario->marca_id}/comentarios");
    }
}