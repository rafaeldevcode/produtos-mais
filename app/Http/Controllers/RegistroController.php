<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Models\User;
use App\Services\Remover;
use App\Http\Requests\ValidacaoUsuario;

class RegistroController extends Controller
{
    public function index()
    {
        $usuario = Auth::user() == null ? 'Deslogado' : Auth::user()->name;

        return view('registrar/index', compact('usuario'));
    }

    public function store(ValidacaoUsuario $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        Auth::login($user);

        return redirect('/marcas');
    }

    public function listar(Request $request)
    {
        $dados = User::all();
        $usuario = Auth::user()->name;
        $mensagem = $request->session()->get('mensagem');

        return view('registrar/listar', compact('usuario', 'dados', 'mensagem'));
    }

    public function destroy(int $usuarioId, Request $request, Remover $remover)
    {
        $usuario = User::find($usuarioId)->name;
        $remover->removerUsuario($request);
        $request->session()->flash('mensagem', "{$usuario} rmovido com sucesso!");

        return redirect('/usuarios');
    }
}
