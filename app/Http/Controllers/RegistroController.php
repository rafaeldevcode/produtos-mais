<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\{Remover, Adicionar, Editar};
use App\Http\Requests\ValidacaoUsuario;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{

    ///// ADICIONAR USUÁRIO /////
    public function create(Request $request)
    {
        $usuario = Auth::user() == null ? 'Deslogado' : Auth::user();
        $mensagem = $request->session()->get('mensagem');

        if(Auth::user()->autorizacao == 'Admin'){
            return view('painel/registrar/index', compact('usuario', 'mensagem'));
        }else{
            return redirect('/painel');
        }
    }

    /////// GUARDAR USUÁRIOS CADASTRADO //////
    public function store(ValidacaoUsuario $request, Adicionar $adicionar)
    {
        $adicionar->adicionarUsuario($request);

        if(User::count() == 1){
            return redirect('/painel');
        }else{
            return redirect('/usuarios');
        }
    }

    ///// LISTAR TODOS OS USUÁRIOS ///////
    public function listar(Request $request)
    {
        $usuarios = User::all();
        $usuario = Auth::user();
        $email = Auth::user()->email;
        $autorizacao = Auth::user()->autorizacao;
        $mensagem = $request->session()->get('mensagem');
        $aviso = '';

        return view('painel/registrar/listar', compact('usuario', 'usuarios', 'mensagem', 'email', 'aviso', 'autorizacao'));
    }

    ///// GUARDAR USUÁRIOS EDITADO //////
    public function editarUsuario(int $usuarioId, Request $request, Editar $editar)
    {
        $editar->editarUsuario($usuarioId, $request);
        $request->session()->flash("mensagem", "Usuário {$request->name} atualizado com sucesso!");
        !empty($request->password) ? Auth::logout() : '';

        return redirect(!empty($request->password) ? '/entrar' : '/usuarios');
    }

    ///// REMOVER USUÁRIO //////////
    public function destroy(int $usuarioId, Request $request, Remover $remover)
    {
        $usuario = User::find($usuarioId)->name;
        $remover->removerUsuario($request);
        $request->session()->flash('mensagem', "{$usuario} removido com sucesso!");

        return redirect('/usuarios');
    }

    ///////// REMOVER IMAGEM DO USUÁRIO /////////
    public function removerImagem(int $ID, Request $request, Remover $remover)
    {
        $remover->removerImagenUsuario($ID, $request);
    }

    //////// REDEFINIR PERMICÇOES DO USUÁRIO //////////
    public function redefinirPermicoes(int $ID, Request $request, Editar $editar)
    {
        $usuario = User::find($ID)->name;
        $editar->redefinirPermicoes($ID, $request);
        $request->session()->flash("mensagem", "Permições do usuário {$usuario}, atualizadas com sucesso!");

        return redirect('/usuarios');
    }
}
