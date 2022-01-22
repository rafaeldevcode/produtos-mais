<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{

    ////// EXIBIR FORMULÁRIO DE LOGIN ///////
    public function create()
    {
        $usuario = Auth::user() == null ? 'Deslogado' : Auth::user();
        
        if(Auth::user()){
            return redirect('/painel');
        }else{
            return view('painel/entrar/index', compact('usuario'));
        }
    }

    ////// LOGAR USUÁRIO
    public function store(Request $request)
    {
        $usuario = $request->only(['email', 'password']);
        if(!Auth::attempt($usuario)){
            return redirect()->back()->withErrors('Usuário e/ou senhas incorretos!');
        };

        $request->session()->regenerate();
        return redirect()->intended('/painel');
    }

    /////// DESLOGAR USUÁRIO //////
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/entrar');
    }
}
