<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('marca/produto/index');
    }
 
    public function create(Request $request)
    {
        $marcas = Marca::all();
        $mensagem = $request->session()->get('mensagem');

        return view('marca/produto/create', compact('mensagem', 'marcas'));
    }

    public function listarProdutos(Request $request)
    {

        return view('marca/produto/listarProdutos');
    }
}