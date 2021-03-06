@extends('painel/layouts/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">
        @include('painel/layouts/componentes/mensagem', [$mensagem])

        <div class="border-bottom border-success border-2 d-flex flex-column-reverse flex-md-row justify-content-md-between align-items-center">
            <h2>Comentários <span class="text-primary">{{ $marca->nome_marca }}</span></h2>

            <span class="d-flex mb-3">
                <form action="/marca/{{ $marca->id }}/pesquisar/comentario" method="POST" class="d-flex ms-1">
                    @csrf
                    <input type="search" name="pesquisa" class="form-control rounded-0 rounded-start" placeholder="Pesquisar comentario">
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
            <ul class="list-group mt-5">
                @if (empty($comentarios[0]))
                    <li class="alert alert-danger text-center">{{ $aviso }}</li>
                @else
                    @foreach ($comentarios as $comentario)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <h5 class="item">
                                {{ $comentario->nome_cliente }}
                                @if ($comentario->exibir_coment == 'on')
                                    <span class="btn text-success">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                @else
                                    <span class="btn text-secondary">
                                        <i class="fas fa-eye-slash"></i>
                                    </span> 
                                @endif
                            </h5>

                            <span>
                                <a title="Listar Comentários" href="/comentario/{{ $comentario->id }}/listarDados" class="btn btn-success">
                                    <i class="fas fa-pen-square"></i>
                                </a>

                                @if ($usuario->autorizacao !== 'Leitor')
                                    <a title="Duplicar Comentário" href="/comentario/{{ $comentario->id }}/duplicar" class="btn btn-warning">
                                        <i class="fas fa-copy"></i>
                                    </a>
                
                                    <a title="Remover Comentário" id="{{ $comentario->id }}" class="btn btn-danger remover">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endif
                            </span>
                        </li>
                    @endforeach
                @endif
            </ul>
        </section>

        @if ($usuario->autorizacao !== 'Leitor')
            <section class="border-top border-success border-2 mt-5 d-flex flex-wrap justify-content-between">
                <a id="remover" title="Remover todos os comentários" class="btn btn-danger mt-2 py-3 px-5 col-12 col-sm-5 col-md-3 {{ empty($comentarios[0]) ? 'disabled' : '' }}">
                    Excluir Todos
                    <i class="fas fa-trash ms-2"></i>
                    <span hidden id="marcaId">{{ $marca->id }}</span>
                </a>

                <a title="Adicionar Comentário" href="/adicionar/comentario" class="btn btn-primary mt-2 py-3 px-5 col-12 col-sm-5 col-md-3">
                    Novo Comentário
                    <i class="fas fa-plus-circle ms-2"></i>
                </a>
            </section>
        @endif
    </main>

    <script type="text/javascript">
        exibirFormularioExcluir('/comentario', 'Certeza que deseja excluir o comentário de');

        document.getElementById('remover').addEventListener('click', ()=>{
            let id = document.getElementById('marcaId').innerText;
            criarFormulario(`/marca/${id}/comentarios/remover/todos`, 'Certeza que deseja excluir todos os comentário?', '', ''); 
        });

        function exibirFormularioExcluir(url, mensagem) {
            let remover = document.querySelectorAll('.remover');

            for(let i = 0; i < remover.length; i++){
                let id = remover[i].id;
                let item = document.querySelectorAll('.item')[i].innerHTML;

                remover[i].addEventListener('click', ()=>{
                    criarFormulario(url, mensagem, id, item);
                })
            }
        }

        function criarFormulario(url, mensagem, id, item){
            let main = document.querySelector('main');

            let i = document.createElement('i');
                i.setAttribute('class', 'fas fa-trash ms-2');

            let button = document.createElement('button');
                button.setAttribute('type', 'submit');
                button.setAttribute('class', 'btn btn-danger');
                button.setAttribute('title', 'Remover Comentario');
                button.innerHTML = 'Excluir';
                button.appendChild(i);
            
            let i_a = document.createElement('i');
                i_a.setAttribute('class', 'fas fa-ban ms-2');

            let a = document.createElement('a');
                a.setAttribute('id', 'cancelar');
                a.setAttribute('class', 'btn btn-primary');
                a.setAttribute('title', 'Cancelar');
                a.innerHTML = 'Cancelar';
                a.appendChild(i_a);

            let form = document.createElement('form');
                if(id == ''){form.setAttribute('action', `${url}`)}else{form.setAttribute('action', `${url}/${id}/remover`)};
                form.setAttribute('method', 'POST');
                form.setAttribute('class', 'text-center d-flex justify-content-evenly');
                form.innerHTML = '@csrf';
                form.appendChild(a);
                form.appendChild(button);

            let p = document.createElement('p');
                p.setAttribute('class', 'fs-5 text-center lh-1 py-1');
                if(item == ''){p.innerHTML = `${mensagem}`}else{p.innerHTML = `${mensagem} \"${item}\"?`};

            let div = document.createElement('div');
                div.setAttribute('class', 'alert alert-danger col-12 col-sm-6 col-md-4 border-danger border-1');
                div.appendChild(p);
                div.appendChild(form);
            
            let section = document.createElement('section');
                section.setAttribute('class', 'sessao-excluir w-100 h-100 d-flex justify-content-center align-items-center fixed-top removerComentario');
                section.appendChild(div);

            main.appendChild(section);

            fecharFormularioExcluir();
        }
    </script>
@endsection