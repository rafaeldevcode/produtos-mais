<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Services\{Adicionar, Editar};

class CoutdownController extends Controller
{

    public function __construct()
    {
        $this->middleware('autenticador');
    }
    
    ////// ADICIONAR COUTDOWN //////
    public function store(int $marcaId, Request $request, Adicionar $adicionar)
    {
        $adicionar->adicionarCoutdown($marcaId, $request);
    }

    ////// EDITAR COUTDOWN ///////
    public function editar(int $marcaId, Request $request, Editar $editar)
    {
        $editar->editarCoutdown($marcaId, $request);
    }
}