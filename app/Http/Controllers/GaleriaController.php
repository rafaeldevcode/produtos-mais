<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GaleriaController extends Controller
{
    function __construct()
    {
        $this->middleware('autenticador');
    }

    ///// EXIBIR GALERIA DE IMAGENS //////
    public function index(Request $request)
    {
        $usuario = Auth::user()->name;
        $mensagem = $request->session()->get('mensagem');

        return view('painel/galeria/index', compact('usuario', 'mensagem'));
    }

    ////// REMOVER IMAGEN //////
    public function destroy(Request $request)
    {
        $diretorio = 'storage/galeria/';
        unlink($diretorio.$request->id);
        $request->session()->flash('mensagem', 'Imagen removida com sucesso!');

        return redirect('/galeria');
    }
}
