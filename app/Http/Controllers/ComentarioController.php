<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function create()
    {
        return view('marca/comentario/create');
    }
}