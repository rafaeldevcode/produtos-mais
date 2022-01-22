@extends('painel/layouts/layout')

@section('conteudo')

    <main class="container bg-white my-5 rounded p-3">
        <div id="mensagem"></div>
        @include('painel/layouts/componentes/mensagem', [$mensagem])
        <div class="border-bottom border-success border-2 d-flex flex-column-reverse flex-md-row justify-content-md-between align-items-center">
            <h2>{{ $usuario->name }} <span class="fs-6 text-secondary"> - {{ $usuario->autorizacao }}</span></h2>

            <span class="d-flex mb-3">
                <form action="/usuario/pesquisar" method="POST" class="d-flex ms-1">
                    @csrf
                    <input type="search" class="form-control rounded-0 rounded-start" name="pesquisa" placeholder="Pesquisar usuário">
                    <button title="Pesquisar" type="submit" class="btn btn-primary rounded-0 rounded-end">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

                <a title="Voltar" href="/painel" class="btn btn-info d-flex align-items-center ms-2 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </span>
        </div>

        <section>
            <div class="container-fluid border border-info mt-3 rounded">
                <ul class="list-group my-3">
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between flex-column">
                            <div class="row">
                                <div class="d-flex flex-column flex-md-row">
                                    <div class="imagen-usuario col-2 d-flex m-auto">
                                        <img id="imagem-usuario" class="img-thumbnail rounded-circle" src="{{ $usuario->imagem_usuario }}" alt="{{ $usuario->name }}">
                                    </div>

                                    <div class="col-10 mx-auto">
                                        <h1 class="text-center m-0">{{ $usuario->name }}</h1>
                                        <p class="fs-5 text-secondary text-center">{{ $usuario->autorizacao }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <span class="w-100 d-flex justify-content-end">
                                    <a id="editar" title="Editar usuário" class="btn btn-success" >
                                        <i class="fas fa-key"></i>
                                    </a>
                                </span>
                            </div>
                        </div>

                        <form action="/editar/usuario/{{ $usuario->id }}" method="POST" id="formulario" enctype="multipart/form-data" hidden>
                            @csrf
                            <input type="hidden" id="id-usuario" value="{{ $usuario->id }}">
                            <span class="d-flex flex-wrap justify-content-between mt-5">
                                <div class="col-12 col-md-3 mt-3 mt-md-0">
                                    <label for="name" class="form-label">Nome</label>
                                    <input type="text" name="name" value="{{ $usuario->name }}" class="form-control" placeholder="Editar usuário">
                                </div>

                                <div class="col-12 col-md-3 mt-3 mt-md-0">
                                    <label for="password" class="form-label">Nova Senha</label>
                                    <input type="password" name="password" class="form-control" placeholder="Nova senha" value="">
                                </div>

                                <div class="col-12 col-md-3 mt-3 mt-md-0">
                                    <label for="image_usuario" class="form-label">Imagem de usuario</label>
                                    <input type="file" name="image_usuario" class="form-control">
                                </div>
                            </span>

                            <span class="d-flex justify-content-end">
                                <a title="Remover Imagem" id="remover-imagem" href="#" type="submit" class="{{ strpos($usuario->imagem_usuario, 'avatar') ?  'disabled' : '' }} btn btn-secondary mt-3">
                                    Remover imagem
                                    <i class="fas fa-minus-circle"></i>
                                </a>

                                <button title="Salvar" type="submit" class="btn btn-success ms-3 mt-3">
                                    Salvar
                                    <i class="fas fa-save"></i>
                                </button>
                            </span>
                        </form>
                    </li>
                </ul>
            </div>

            <ul class="list-group mt-5">
                @if (empty($usuarios[0]))
                    <li class="alert alert-danger text-center">{{ $aviso }}</li>
                @else
                    @foreach ($usuarios as $usuario)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="item d-flex">
                                    <h5>{{ $usuario->name }} <span class="text-secondary fs-6">{{ $usuario->autorizacao }}</span></h5>
        
                                    @if ($email == $usuario->email)
                                        <h6 class="ms-2 badge bg-success">Logado</h6>
                                    @endif
                                </span>
        
                                <span class="d-flex align-items-end">
                                    @if (($email !== $usuario->email) && ($autorizacao == 'Admin'))
                                        <form action="/usuario/{{ $usuario->id}}/redefinir" method="POST" class="d-flex formulario">
                                            @csrf
                                            <span>
                                                <span>Redefinir permições</span>

                                                <div class="d-flex">
                                                    <select name="autorizacao" class="form-select">
                                                        <option value="{{ $usuario->autorizacao }}">{{ $usuario->autorizacao }}</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Editor">Editor</option>
                                                        <option value="Leitor">Leitor</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-success ms-2">
                                                        <i class="fas fa-save"></i>
                                                    </button>
                                                </div>
                                            </span>
                                        </form>
                                    @endif

                                    @if(($email !== $usuario->email) && ($autorizacao == 'Admin'))
                                        <span>
                                            <a title="Remover Usuário" id="{{ $usuario->id }}" class="btn btn-danger remover ms-2 h-auto">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </span>
                                    @endif
                                </span>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </section>
    </main>

    <script  type="text/javascript">
        ///// ABILITAR FORMULÁRIO /////
        document.getElementById('editar').addEventListener('click', ()=>{
            let formulario = document.getElementById('formulario');

            abilitarConfig(formulario);
        })

        exibirFormularioExcluir('/usuario', 'Certeza que deseja excluir o usuário');

        function exibirFormularioExcluir(url, mensagem) {
            let remover = document.querySelectorAll('.remover');

            for(let i = 0; i < remover.length; i++){
                let id = remover[i].id;
                let item = document.querySelectorAll('.item')[i].innerHTML;

                remover[i].addEventListener('click', ()=>{
                    let main = document.querySelector('main');

                    let i = document.createElement('i');
                        i.setAttribute('class', 'fas fa-trash ms-2');

                    let button = document.createElement('button');
                        button.setAttribute('type', 'submit');
                        button.setAttribute('class', 'btn btn-danger');
                        button.innerHTML = 'Excluir';
                        button.appendChild(i);
                    
                    let i_a = document.createElement('i');
                        i_a.setAttribute('class', 'fas fa-ban ms-2');

                    let a = document.createElement('a');
                        a.setAttribute('id', 'cancelar');
                        a.setAttribute('class', 'btn btn-primary');
                        a.innerHTML = 'Cancelar';
                        a.appendChild(i_a);

                    let form = document.createElement('form');
                        form.setAttribute('action', `${url}/${id}/remover`);
                        form.setAttribute('method', 'POST');
                        form.setAttribute('class', 'text-center d-flex justify-content-evenly');
                        form.innerHTML = '@csrf';
                        form.appendChild(a);
                        form.appendChild(button);

                    let p = document.createElement('p');
                        p.setAttribute('class', 'fs-5 text-center lh-1 py-1');
                        p.innerHTML = `${mensagem} \"${item}\"?`;

                    let div = document.createElement('div');
                        div.setAttribute('class', 'alert alert-danger col-12 col-sm-6 col-md-4 border-danger border-1');
                        div.appendChild(p);
                        div.appendChild(form);
                    
                    let section = document.createElement('section');
                        section.setAttribute('class', 'sessao-excluir w-100 h-100 d-flex justify-content-center align-items-center fixed-top removerComentario');
                        section.appendChild(div);

                    main.appendChild(section);

                    fecharFormularioExcluir();
                })
            }
        }

        removerImagemUsuario();
    </script>

@endsection