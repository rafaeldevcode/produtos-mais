<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacaoImagen;
use App\Models\Imagen;
use App\Models\Marca;
use App\Services\Adicionar;
use App\Services\Remover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleriaController extends Controller
{
    function __construct()
    {
        $this->middleware('autenticador');
    }

    ///// EXIBIR GALERIA DE IMAGENS //////
    public function index(Request $request)
    {
        $usuario = Auth::user();
        $mensagem = $request->session()->get('mensagem');

        return view('painel/galeria/index', compact('usuario', 'mensagem'));
    }

    /////// ADICIONAR UMA NOVA IMAGEN ////////
    public function store(ValidacaoImagen $request, Adicionar $adicionar)
    {
        $adicionar->adicionarImagen($request);
        $request->session()->flash('mensagem', 'Upload realizado com sucesso!');

        return redirect('/galeria');
    }

    ////// REMOVER IMAGEN //////
    public function destroy(Request $request, Remover $remover)
    {

        $remover->removerImagen($request);
        $request->session()->flash('mensagem', 'Imagen removida com sucesso!');

        return redirect('/galeria');
    }
}
