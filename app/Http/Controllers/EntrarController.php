<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{

    ////// EXIBIR FORMULÁRIO DE LOGIN ///////
    public function create()
    {
        $usuario = Auth::user() == null ? 'Deslogado' : Auth::user()->name;
        
        if(Auth::user()){
            return redirect('/painel');
        }else{
            return view('entrar/index', compact('usuario'));
        }
    }

    ////// LOGAR USUÁRIO
    public function store(Request $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))){
            return redirect()->back()->withErrors('Usuário e/ou senhas incorretos!');
        };

        return redirect('/painel');
    }

    /////// DESLOGAR USUÁRIO //////
    public function logout()
    {
        Auth::logout();

        return redirect('/entrar');
    }
}
