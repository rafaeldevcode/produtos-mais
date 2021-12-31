<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacaoUpsell;
use App\Models\Marca;
use App\Services\Adicionar;
use App\Services\Editar;
use App\Services\Remover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObrigadoController extends Controller
{
    public function obrigado(int $marcaId)
    {
        $marca = Marca::find($marcaId);
        $config = $marca->configuracoes()->get();

        return view('painel/obrigado/obrigado', compact('marca', 'config'));
    }

    public function upsell(int $marcaId)
    {
        $marca = Marca::find($marcaId);
        $config = $marca->configuracoes()->get();
        $upsell = empty($marca->upsell()->get()[0]) ? '' : $marca->upsell()->get()[0];

        return view('painel/obrigado/upsell', compact('marca', 'config', 'upsell'));
    }

    public function upsellCreate(int $marcaId)
    {
        $marca = Marca::find($marcaId);
        $usuario = Auth::user()->name;

        return view('painel/obrigado/upsell-create', compact('marca', 'usuario'));
    }

    public function upsellStore(int $marcaId, ValidacaoUpsell $request, Adicionar $adicionar)
    {
        $marca = Marca::find($marcaId);
        $adicionar->adicionarUpsell($marca, $request);
        $request->session()->flash("mensagem", "Upsell adicionada a marca {$marca->nome_marca}");

        return redirect("/marca/{$marcaId}/config");
    }

    public function upsellListar(int $marcaId)
    {
        $usuario = Auth::user()->name;
        $marca = Marca::find($marcaId);
        $dados = $marca->upsell()->get()[0];

        return view('painel/obrigado/upsellListar', compact('marca', 'dados', 'usuario'));
    }

    public function upsellEditar(Request $request, Editar $editar, int $marcaId)
    {
        $marca = Marca::find($marcaId);
        $editar->editarUpsell($marca, $request);
        $request->session()->flash("mensagem", "Upsel da marca {$marca->nome_marca} atualizado cim sucesso!");

        return redirect("/marca/{$marca->id}/config");
    }

    public function destroyUpsell(int $marcaId, Remover $remover, Request $request)
    {
        $remover->removerUpsell($marcaId);
        $request->session()->flash("mensagem", "Upsell removido com sucesso!");

        return redirect("/marca/{$marcaId}/config");
    }
}
