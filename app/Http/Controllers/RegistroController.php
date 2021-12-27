<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\{Remover, Adicionar, Editar};
use App\Http\Requests\ValidacaoUsuario;

class RegistroController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user() == null ? 'Deslogado' : Auth::user()->name;
        $mensagem = $request->session()->get('mensagem');

        return view('registrar/index', compact('usuario', 'mensagem'));
    }

    public function store(ValidacaoUsuario $request, Adicionar $adicionar)
    {
        $adicionar->adicionarUsuario($request);

        return redirect('/marcas');
    }

    public function listar(Request $request)
    {
        $dados = User::all();
        $usuario = Auth::user()->name;
        $email = Auth::user()->email;
        $mensagem = $request->session()->get('mensagem');

        return view('registrar/listar', compact('usuario', 'dados', 'mensagem', 'email'));
    }

    public function editarUsuario(int $usuarioId, Request $request, Editar $editar)
    {
        $editar->editarUsuario($usuarioId, $request);
        $request->session()->flash("mensagem", "Usuário {$request->name} atualizado com sucesso!");

        return redirect(!empty($request->password) ? '/entrar' : '/usuarios');
    }

    public function destroy(int $usuarioId, Request $request, Remover $remover)
    {
        $usuario = User::find($usuarioId)->name;
        $remover->removerUsuario($request);
        $request->session()->flash('mensagem', "{$usuario} removido com sucesso!");

        return redirect('/usuarios');
    }
}
