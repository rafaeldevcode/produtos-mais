<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class PoliticasController extends Controller
{
    public function privacidade(int $id)
    {
        $politicas = true;
        $marca = Marca::find($id);
        $config = $marca->configuracoes()->get();

        return view('marca/politicas/privacidade', compact('marca', 'config', 'politicas'));
    }

    public function termos(int $id)
    {
        $politicas = true;
        $marca = Marca::find($id);
        $config = $marca->configuracoes()->get();

        return view('marca/politicas/termos', compact('marca', 'config', 'politicas'));
    }
}
