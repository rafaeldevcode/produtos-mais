<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('marca/produto/index');
    }

    public function create()
    {
        return view('marca/produto/create');
    }
}