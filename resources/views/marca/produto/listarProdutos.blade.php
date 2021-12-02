@extends('layouts/painel/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">
        <div class="border-bottom border-success border-2 mt-5 d-flex justify-content-between">
            <h2>Produtos Cadastrados</h2>
            <a href="/painel/admin" class="btn btn-info d-flex align-items-center mb-3 py-2">
                <i class="fas fa-reply"></i>
            </a>
        </div>

        <section>
            <ul class="list-group">
                @foreach ($produtos as $produto)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $produto->nome_produto }}

                        <span>
                            <a href="#" class="btn btn-info">
                                <i class="fas fa-external-link-square-alt"></i>
                            </a>
        
                            <a href="#" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </li>
                @endforeach
            </ul>
        </section>
    </main>

@endsection