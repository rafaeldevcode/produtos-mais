<?php

namespace App\Http\Controllers;

use App\Models\{Marca, Modal};
use App\Services\{Adicionar, Editar, Remover};
use Illuminate\Http\Request;

class ModalController extends Controller
{

    public function __construct()
    {
        $this->middleware('autenticador');
    }
    
    ///// ROTA PARA EDITAR MODAL /////
    public function create(int $marcaId)
    {
        return view('marca/modal/create', compact('marcaId'));
    }

    ///// GUARDAR DADOS DO MODAL NO BANCO /////
    public function store(Request $request, int $marcaId, Adicionar $adicionar)
    {
        $adicionar->adicionarModal($request, $marcaId);
        $request->session()->flash('mensagem', 'Modal adicionado com sucesso!');
 
        return redirect("/marca/{$marcaId}/config");
    }

    ////// LISTAR DADOS PARA EDIÇÃO DO MODAL /////
    public function listar(int $marcaId)
    {
        $marca = Marca::find($marcaId);
        $dados = $marca->modals()->get();

        return view('marca/modal/listarDados', compact('marcaId', 'dados'));
    }

    ////// GUARDADR DADOS EDITADO /////
    public function editar(Request $request, int $marcaId, Editar $editar)
    {
        $editar->editarModal($request, $marcaId);
        $request->session()->flash('mensagem', 'Modal Editado com sucesso!');

        return redirect("/marca/{$marcaId}/config");
    }

    ///// REMOVER MODAL /////
    public function destroy(Request $request, int $modalId, Remover $remover)
    {
        $marca_id = Modal::find($modalId)->marca_id;
        $remover->removerModal($request);
        $request->session()->flash('mensagem', 'Modal removido com sucesso!');

        return redirect ("/marca/{$marca_id}/config");
    }
}
