<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

class PainelController extends Controller
{
    public function index(Request $request)
    {
        $marcas = Marca::all();
        $mensagem = $request->session()->get('mensagem');

        return view('painel/index', compact('marcas', 'mensagem'));
    }
}
