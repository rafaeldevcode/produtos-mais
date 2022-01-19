<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class PoliticasController extends Controller
{

    ////// EXIBIR PÁGINA DE PRIVACIDADE ///////
    public function privacidade(int $id)
    {
        $politicas = true;
        $marca = Marca::find($id);
        $config = $marca->configuracoes()->get();

        return view('politicas/privacidade', compact('marca', 'config', 'politicas'));
    }

    ////// EXIBIR PÁGINA DE TERMOS DE USO ///////
    public function termos(int $id)
    {
        $politicas = true;
        $marca = Marca::find($id);
        $config = $marca->configuracoes()->get();

        return view('politicas/termos', compact('marca', 'config', 'politicas'));
    }
}
