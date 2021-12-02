@extends('layouts/painel/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">
        @if (!empty($mensagem))
            @include('layouts/mensagem', [$mensagem])
        @endif

        <div class="border-bottom border-success border-2 d-flex justify-content-between">
            <h2>Produtos {{ $nome_marca }}</h2>
            <a href="/marcas" class="btn btn-info d-flex align-items-center mb-3 py-2">
                <i class="fas fa-reply"></i>
            </a>
        </div>

        <section>
            <ul class="list-group mt-5">
                @foreach ($produtos as $produto)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $produto->nome_produto }}

                        <span>
                            <a href="/produto/{{ $produto->id }}/listarDados" class="btn btn-success">
                                <i class="fas fa-clipboard-list"></i>
                            </a>
        
                            <a href="#" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="border-top border-success border-2 mt-5 d-flex justify-content-between">
            <a href="/adicionar/produto" class="btn btn-primary mt-2 py-3 px-5 col-12 col-sm-3">
                Novo Produto
                <i class="fas fa-plus-circle ms-2"></i>
            </a>
        </section>
    </main>

@endsection