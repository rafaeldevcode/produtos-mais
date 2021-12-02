@extends('layouts/painel/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">
        @if (!empty($mensagem))
            @include('layouts/mensagem', [$mensagem])
        @endif
        <h2 class="border-bottom border-success border-2 pb-3">Marcas Cadastradas</h2>

        <section>
            <ul class="list-group">
                @foreach ($marcas as $marca)
                    <li class="list-group-item d-flex flex-wrap justify-content-evenly justify-content-sm-between align-items-center">
                        <h5>{{ $marca->nome_marca }}</h5>

                        <span>
                            <a href="#" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/marca/{{ $marca->id }}/produtos" class="btn btn-primary">
                                <i class="fas fa-external-link-square-alt"></i>
                            </a>
                            <a href="/marca/{{ $marca->id }}/listarDados" class="btn btn-success">
                                <i class="fas fa-clipboard-list"></i>
                            </a>
                            <a href="/marca/{{ $marca->id }}/comentarios" class="btn btn-secondary">
                                <i class="fas fa-comments"></i>
                            </a>
                            <a href="#" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="border-top border-success border-2 mt-5 d-flex flex-wrap justify-content-evenly justify-content-lg-between">
            <a href="/adicionar/marca" class="btn btn-primary mt-2 py-3 px-5 col-12 col-sm-7 col-md-5 col-lg-3">
                Nova Marca
                <i class="fas fa-plus-circle ms-2"></i>
            </a>

            <a href="/adicionar/produto" class="btn btn-success mt-2 py-3 px-5 col-12 col-sm-7 col-md-5 col-lg-3">
                Novo Produto
                <i class="fas fa-plus-circle ms-2"></i>
            </a>

            <a href="/adicionar/comentario" class="btn btn-info mt-2 py-3 px-5 col-12 col-sm-7 col-md-5 col-lg-3">
                Novo Comentário
                <i class="fas fa-plus-circle ms-2"></i>
            </a>
        </section>
    </main>

@endsection