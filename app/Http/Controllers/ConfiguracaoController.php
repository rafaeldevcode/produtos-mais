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
        $config = $marca->configuracoes()->get();
        $modal = $marca->modals()->get();
        $coutdown = $marca->coutdown()->get();
        $mensagem = $request->session()->get('mensagem');
        $usuario = Auth::user()->name;

        return view('marca/configuracao/index', compact('marca', 'config', 'modal', 'mensagem', 'usuario', 'coutdown'));
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
