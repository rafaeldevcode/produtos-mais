<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function create()
    {
        return view('marca/create');
    }

    public function store(Request $request)
    {
        print_r($request->nome_marca);
    }
}
