<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class CoutdownController extends Controller
{
    public function store(int $marcaId, Request $request)
    {
        $marca = Marca::find($marcaId);
        $coutdown = $request->except('_token');
        $marca->coutdown()->create($coutdown);
    }
}
