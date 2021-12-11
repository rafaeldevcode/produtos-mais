@extends('layouts/painel/layout')

@section('conteudo')
    <main class="container bg-white my-5 rounded p-3">
        <div class="border-bottom border-success border-2 d-flex flex-column-reverse flex-md-row justify-content-md-between align-items-center">
            <h2>Marcas Cadastradas</h2>

            <span class="d-flex mb-3">
                <form action="?" class="d-flex ms-1">
                    <input type="search" class="form-control rounded-0 rounded-start" disabled placeholder="Pesquisar marca">
                    <button type="submit" class="btn btn-primary rounded-0 rounded-end" disabled>
                        <i class="fas fa-search"></i>
                    </button>
                </form>
    
                <a href="/login" class="btn btn-info d-flex align-items-center ms-2 py-2">
                    <i class="fas fa-sign-in-alt"></i>
                </a>
            </span>
        </div>

        @if (empty($nome_marca))

            <section class="alert alert-danger mt-5">
                <h2 class="fs-4 text-center">Você ainda não tem nenhuma marca cadastrada!</h2>
            </section>
            
        @endif

        <section>
            <ul class="list-group mt-5">
                @foreach ($marcas as $marca)
                    <li class="list-group-item d-flex flex-wrap justify-content-evenly justify-content-sm-between align-items-center">
                        <div class="image-list">
                            <a href="/produto/{{ $marca->id }}">
                                @if (!empty($marca->logomarca))
                                    <img src="{{ asset("images/$marca->logomarca") }}" alt="{{ $marca->nome_marca }}">
                                @else
                                    <img src="{{ asset('images/logo.png') }}" alt="Produtos +">
                                @endif
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
    </main>
@endsection