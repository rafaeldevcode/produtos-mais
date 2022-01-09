<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacaoMarca;
use App\Services\{Adicionar, Remover, Editar};
use Illuminate\Support\Facades\Auth;

class MarcaController extends Controller
{
    private $aviso = 'Você ainda não tem nenhuma marca cadastrada!';

    public function __construct()
    {
        $this->middleware('autenticador');
    }

    ///// LISTAR MARCAS COM ÍCONES DE OPÇÕES ///// 
    public function listarMarcas(Request $request)
    {
        $marcas = Marca::all();
        $nome_marca = empty($marcas[0]->nome_marca) ? '' : $marcas[0]->nome_marca;
        $mensagem = $request->session()->get('mensagem');
        $usuario = Auth::user();
        $aviso = $this->aviso;

        return view('painel/marca/listarMarcas', compact('marcas', 'mensagem', 'nome_marca', 'usuario', 'aviso'));
    }

    ///// CHARMAR ARQUIVO PARA ADICIONAR MARCA AO BONCO /////
    public function create()
    {
        $usuario = Auth::user();

        return view('painel/marca/create', compact('usuario'));
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
        $usuario = Auth::user();

        return view('painel/marca/listarDados' , compact('dados', 'marcaId', 'usuario'));
    }

    ///// ENVIAR DADOS EDITADO /////
    public function editarMarca(Request $request, int $marcaId, Editar $editar)
    {
        $editar->editarMarca($request, $marcaId);
        $request->session()->flash("mensagem", "Marca {$request->nome_marca} atualizado com sucesso!");

        return redirect('/painel');
    }

    ///// REMOVER A TABELA MARCA /////
    public function destroy(int $marcaId, Request $request, Remover $remover)
    {
        $nome_marca = Marca::find($marcaId)->nome_marca;
        $remover->removerMarca($marcaId);
        $request->session()->flash("mensagem", "{$nome_marca} removida com sucesso!");

        return redirect('/painel');
    }
}
