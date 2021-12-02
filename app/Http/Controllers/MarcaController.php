<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
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

    public function index(int $marcaId)
    {

        $id = $marcaId - 1;

        $dados = Marca::find($marcaId)->all();

        return view('marca/index' , compact('dados', 'id', 'marcaId'));
    }

    public function editarDados(Request $request, int $marcaId)
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

        return redirect('/painel/admin');

    }
}
