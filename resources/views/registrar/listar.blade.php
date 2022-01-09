@extends('painel/layouts/painel/layout')

@section('conteudo')

    <main class="container bg-white my-5 rounded p-3">
        @include('painel/layouts/componentes/mensagem', [$mensagem])
        <div class="border-bottom border-success border-2 d-flex flex-column-reverse flex-md-row justify-content-md-between align-items-center">
            <h2>Usuários</h2>

            <span class="d-flex mb-3">
                <form action="?" class="d-flex ms-1">
                    <input type="search" class="form-control rounded-0 rounded-start" disabled placeholder="Pesquisar usuário">
                    <button title="Pesquisar" type="submit" class="btn btn-primary rounded-0 rounded-end" disabled>
                        <i class="fas fa-search"></i>
                    </button>
                </form>

                <a title="Voltar" href="/painel" class="btn btn-info d-flex align-items-center ms-2 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </span>
        </div>

        <section>
            <ul class="list-group mt-5">
                @foreach ($dados as $dado)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="item d-flex">
                                <h5>{{ $dado->name }} <span class="text-secondary fs-6">{{ $dado->autorizacao }}</span></h5>
    
                                @if ($email == $dado->email)
                                    <h6 class="ms-2 badge bg-success">Logado</h6>
                                @endif
                            </span>
    
                            <span>
                                @if ($email == $dado->email)
                                    <a id="editar" title="Editar usuário" class="btn btn-success" >
                                        <i class="fas fa-key"></i>
                                    </a>
                                @elseif(($email !== $dado->email) && ($usuario->autorizacao == 'Admin'))
                                    <a title="Remover Usuário" id="{{ $dado->id }}" class="btn btn-danger remover">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endif
                            </span>
                        </div>

                        @if ($email == $dado->email)
                            <form action="/editar/usuario/{{ $dado->id }}" method="POST" id="formulario" hidden>
                                @csrf
                                <span class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-3 mt-3 mt-md-0">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" name="name" value="{{ $dado->name }}" class="form-control">
                                    </div>
    
                                    {{-- <div class="col-12 col-md-3 mt-3 mt-md-0">
                                        <label for="password_antiga" class="form-label">Senha Antiga</label>
                                        <input type="password" name="password_antiga" class="form-control">
                                    </div> --}}
    
                                    <div class="col-12 col-md-3 mt-3 mt-md-0">
                                        <label for="password" class="form-label">Nova Senha</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </span>

                                <span class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success mt-3">
                                        Salvar
                                        <i class="fas fa-save"></i>
                                    </button>
                                </span>
                            </form>
                        @endif
                    </li>
                @endforeach
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
    </script>

@endsection