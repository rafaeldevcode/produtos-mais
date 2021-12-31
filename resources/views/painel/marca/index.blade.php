@extends('painel/layouts/painel/layout')

@section('conteudo')

    @if (empty($usuarios[0]))
        <main class=" col-12 col-lg-6 m-auto my-5 pt-1 bg-white rounded">
            <section class="container p-5">
                <div class="d-flex justify-content-center border border-2 rouded py-2">
                    <i class="fas fa-user-plus display-1"></i>
                </div>

                @include('painel/layouts/componentes/errors', [$errors])

                <form method="POST" action="/registrar">
                    <small class="fs-6 text-secondary">* Compos obrigatório</small>
                    @csrf
                    <div class="mt-5">
                        <label for="name" class="form-label">Nome <span class="fs-5 text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Nome" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label for="email" class="form-label">E-mail <span class="fs-5 text-danger">*</span></label>
                        <input type="email" name="email" id="email" placeholder="E-mail" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label for="password" class="form-label">Senha <span class="fs-5 text-danger">*</span></label>
                        <input type="password" name="password" id="password" placeholder="Senha" class="form-control">
                    </div>

                    <div class="d-flex flex-wrap justify-content-end mt-2">
                        <button title="Registrar" type="submit" class="py-2 px-5 btn btn-primary col-12 col-sm-4">
                            Registrar
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </div>
                </form>
            </section>
        </main>

        <script type="text/javascript">
            removerErroVerificacao();
        </script>
    @else
        <main class="container bg-white my-5 rounded p-3">
            <div class="border-bottom border-success border-2 d-flex flex-column-reverse flex-md-row justify-content-md-between align-items-center">
                <h2>Marcas Cadastradas</h2>

                <span class="d-flex mb-3">
                    <form action="?" class="d-flex ms-1">
                        <input type="search" class="form-control rounded-0 rounded-start" disabled placeholder="Pesquisar marca">
                        <button title="Pesquisar" type="submit" class="btn btn-primary rounded-0 rounded-end" disabled>
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                    @auth
                        <a title="Sair" href="/sair" title="Deslogar" class="btn btn-danger d-flex align-items-center ms-2 py-2">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    @endauth

                    @guest
                        <a title="Entrar" href="/entrar" title="Logar" class="btn btn-info d-flex align-items-center ms-2 py-2">
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                    @endguest
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
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="image-list">
                                <a title="Ver Página" href="/produto/{{ $marca->id }}">
                                    @if (!empty($marca->logomarca))
                                        <img src="{{ asset("storage/$marca->logomarca") }}" alt="{{ $marca->nome_marca }}">
                                    @else
                                        <img src="{{ asset('images/logo.png') }}" alt="Produtos +">
                                    @endif
                                </a>
                            </div>

                            @if (!empty($marca->configuracoes()->get()[0]->coutdown))
                                <p class="m-0 p-2 badge bg-danger">Promoção</p>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </section>
        </main>
    @endif
    
@endsection