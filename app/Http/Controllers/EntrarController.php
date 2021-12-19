<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index()
    {
        $usuario = Auth::user() == null ? 'Deslogado' : Auth::user()->name;
        
        return view('entrar/index', compact('usuario'));
    }

    public function entrar(Request $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))){
            return redirect()->back()->withErrors('Usuário e/ou senhas incorretos!');
        };

        return redirect('/marcas');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/entrar');
    }
}
