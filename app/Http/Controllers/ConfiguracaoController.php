<?php

namespace App\Http\Controllers;

use App\Models\{Marca, Configuracao};
use Illuminate\Http\Request;
use App\Services\Editar;
use Illuminate\Support\Facades\Auth;

class ConfiguracaoController extends Controller
{

    public function __construct()
    {
        $this->middleware('autenticador');
    }

    ///// LISTAR CONFIGURAÇÕES /////
    public function index(int $marcaId, Request $request)
    {
        $marca  = Marca::find($marcaId);
        $config = $marca->configuracoes()->get()[0];
        $modal = empty($marca->modals()->get()[0]) ? '' : $marca->modals()->get()[0];
        $coutdown = empty($marca->coutdown()->get()[0]) ? '' : $marca->coutdown()->get()[0];
        $upsell = empty($marca->upsell()->get()[0]) ? '' : $marca->upsell()->get()[0];
        $mensagem = $request->session()->get('mensagem');
        $usuario = Auth::user();

        return view('painel/configuracao/index', compact('marca', 'config', 'modal', 'mensagem', 'usuario', 'coutdown', 'upsell'));
    }

    ///// EDITAR CONFIGURAÇÕES //////
    public function editarDados(int $configId, Request $request, Editar $editar)
    {
        $marcaId = $request->marca_id;
        $nome_marca = $request->nome_marca;
        $editar->editarConfiguracao($configId, $request);
        $request->session()->flash("mensagem", "Configurações de {$nome_marca} atualizadas com sucesso!");

        return redirect("/marca/{$marcaId}/config");
    }
}
