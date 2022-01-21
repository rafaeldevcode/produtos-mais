@extends('painel/layouts/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">

        <section>
            <div class="border-bottom border-success border-2 d-flex justify-content-between">
                <h2>Editar <span class="text-primary">{{ $dados->nome_marca }}</span></h2>
                <a title="Voltar" href="/painel" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            @include('painel/layouts/componentes/errors', [$errors])

            <form action="/marca/{{ $marcaId }}/editar" method="POST" enctype="multipart/form-data">
                @csrf

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Informações Principais</h5>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="nome_marca" type="text" value="{{ $dados->nome_marca }}">


                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Nome:</b>{{ $dados->nome_marca }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="slug_marca" type="text" value="{{ $dados->slug_marca }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Slug:</b>{{ $dados->slug_marca }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="cor_principal" type="color" value="{{ $dados->cor_principal }}">

                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Cor principal da página:</b>{{ $dados->cor_principal }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="cor_titulo" type="color" value="{{ $dados->cor_titulo }}">

                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Cor principal dos títulos do rodapé:</b>{{ $dados->cor_titulo }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="cor_texto" type="color" value="{{ $dados->cor_texto }}">

                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Cor principal dos textos do rodapé:</b>{{ $dados->cor_texto }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>


                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" maxlength="18" id="cnpj" name="cnpj" type="text" value="{{ $dados->cnpj }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Cnpj:</b>{{ $dados->cnpj }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="cidade" type="text" value="{{ $dados->cidade }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Cidade:</b>{{ $dados->cidade }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="rua" type="text" value="{{ $dados->rua }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Rua:</b>{{ $dados->rua }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <textarea hidden class="form-control w-75 inputEditar" name="disclaimer">{{ $dados->disclaimer }}</textarea>

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Disclaimer:</b>{{ $dados->disclaimer }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>
                </ul>

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Contato e Redes Sociais</h5>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" maxlength="16" id="telefone" name="telefone" type="text" value="{{ $dados->telefone }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Telefone:</b>{{ $dados->telefone }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="email" type="text" value="{{ $dados->email }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">E-mail:</b>{{ $dados->email }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="facebook" type="text" value="{{ $dados->facebook }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Facebook:</b>{{ $dados->facebook }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="instagram" type="text" value="{{ $dados->instagram }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Instagram:</b>{{ $dados->instagram }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="twitter" type="text" value="{{ $dados->twitter }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Twitter:</b>{{ $dados->twitter }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>
                </ul>

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Itens da Lista de Descrição</h5>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="titulo_desc" type="text" value="{{ $dados->titulo_desc }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Título da descrição:</b>{{ $dados->titulo_desc }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    @include('painel/layouts/componentes/itensLista', [$dados])
                </ul>

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Tagmanager e Pixel</h5>

                <ul class="list-group">

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="tagmanager" type="text" value="{{ $dados->tagmanager }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Tagmanager:</b>{{ $dados->tagmanager }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <textarea hidden class="form-control w-75 inputEditar" name="pixel">{{ $dados->pixel }}</textarea>

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Pixel:</b>{{ $dados->pixel }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="evento" type="text" value="{{ $dados->evento }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Marcar evento:</b>{{ $dados->evento }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>
                </ul>

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Benners e Imagens</h5>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-75 inputEditar" name="logomarca" type="file">
                        
                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Logo:</b> <br>
                            <img class="mt-4" width="100px" height="auto" src="{{ $dados->imagem_logomarca }}">
                        </span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-75 inputEditar" name="favicon" type="file">
                        
                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Favicon:</b><br>
                            <img class="mt-4" width="100px" height="auto" src="{{ $dados->imagem_favicon }}">
                        </span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>
                    
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-75 inputEditar" name="banner_1" type="file">

                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Banner 1:</b><br>
                            <img class="mt-4" width="100px" height="auto" src="{{ $dados->imagem_banner_one }}" alt="Banner 1">
                        </span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-75 inputEditar" name="banner_2" type="file">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Banner 2:</b><br>
                            <img class="mt-4" width="100px" height="auto" src="{{ $dados->imagem_banner_two }}" alt="Banner 2">
                        </span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-75 inputEditar" name="banner_3" type="file">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Banner 3:</b><br>
                            <img class="mt-4" width="100px" height="auto" src="{{ $dados->imagem_banner_tree }}" alt="Banner 3">
                        </span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-75 inputEditar" name="image_desc" type="file">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Imagen da descrição:</b><br>
                            <img class="mt-4" width="100px" height="auto" src="{{ $dados->imagem_desc }}" alt="Descrição">
                        </span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>
                </ul>

                @if ($usuario->autorizacao !== 'Leitor')
                    <div class="border-top border-success border-2 mt-5 d-flex flex-wrap justify-content-between">
                        <a title="Nova Marca" href="/adicionar/marca" class="btn btn-primary mt-2 py-3 px-5 col-12 col-sm-3">
                            Nova Marca
                            <i class="fas fa-plus-circle ms-2"></i>
                        </a>

                        <button title="Salvar" type="submit" class="btn btn-success mt-2 py-3 px-5 col-12 col-sm-3">
                            Salvar
                            <i class="fas fa-save ms-2"></i>
                        </button>
                    </div>
                @endif
            </form>
        </section>
    </main>

    <script type="text/javascript">
        abilitarInputEditar();
        mascaraTelefone();
        mascaraCnpj();
    </script>

@endsection