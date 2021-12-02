<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

class ComentarioController extends Controller
{
    public function create()
    {
        $marcas = Marca::all();

        return view('marca/comentario/create', compact('marcas'));
    }
}