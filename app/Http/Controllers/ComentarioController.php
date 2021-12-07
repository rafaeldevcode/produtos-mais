<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacaoComentario;
use Illuminate\Http\Request;
use App\Models\{Marca, Comentario};
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    public function create(Request $request)
    {
        $marcas = Marca::all();
        $mensagem = $request->session()->get('mensagem');
        $nome_marca = empty($marcas[0]->nome_marca) ? '' : $marcas[0]->nome_marca;

        return view('marca/comentario/create', compact('marcas', 'mensagem', 'nome_marca'));
    }

    public function store(ValidacaoComentario $request)
    {

        $marca = Marca::find($request->id);

        DB::transaction(function() use($request, $marca){
            $marca->comentarios()->create([
                'nome_cliente' => $request->nome_cliente, 
                'coment_desc' => $request->coment_desc, 
                'image_cliente' => $request->image_cliente, 
                'comentario' => $request->comentario
            ]);
        });

        $request->session()->flash("mensagem", "Comentário de {$request->nome_cliente} adicionado com sucesso!");

        return redirect('/adicionar/comentario');
    }

    public function listarDados(int $comentarioId)
    {

        $dados = Comentario::find($comentarioId);

        return view('/marca/comentario/listarDados', compact('dados', 'comentarioId'));
    }

    public function editarDados(Request $request, int $comentarioId)
    {

        $comentario = Comentario::find($comentarioId);

        DB::transaction(function() use($request, $comentario){
            $comentario->nome_cliente = $request->nome_cliente;
            $comentario->coment_desc = $request->coment_desc;
            $comentario->image_cliente = $request->image_cliente;
            $comentario->comentario = $request->comentario;
            $comentario->save();
        });

        $request->session()->flash("mensagem", "Comentário de {$request->nome_cliente} editado com sucesso!");

        return redirect("/marca/{$comentario->marca_id}/comentarios");
    }

    public function destroy(Request $request)
    {

        $nome_cliente = Comentario::find($request->comentarioId)->nome_cliente;
        $marca_id = Comentario::find($request->comentarioId)->marca_id;
        
        DB::transaction(function() use($request){
            Comentario::destroy($request->comentarioId);
        });

        $request->session()->flash("mensagem", "Comentário de {$nome_cliente} removido com sucesso!");

        return redirect("/marca/{$marca_id}/comentarios");

    }
}