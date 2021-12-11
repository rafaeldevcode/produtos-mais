<?php

namespace App\Http\Controllers;

use App\Models\{Marca, Configuracao};
use Illuminate\Http\Request;
use App\Services\Editar;

class ConfiguracaoController extends Controller
{
    public function index(int $marcaId, Request $request)
    {
        $marca  = Marca::find($marcaId);
        $config = $marca->configuracoes()->get();
        $modal = $marca->modals()->get();
        $mensagem = $request->session()->get('mensagem');

        return view('marca/configuracao/index', compact('marca', 'config', 'modal', 'mensagem'));
    }

    public function editarDados(int $configId, Request $request, Editar $editar)
    {
        $marcaId = $request->marca_id;
        $nome_marca = $request->nome_marca;
        $editar->editarConfiguracao($configId, $request);
        $request->session()->flash("mensagem", "Configurações de {$nome_marca} atualizadas com sucesso!");

        return redirect("/marca/{$marcaId}/config");
    }
}
