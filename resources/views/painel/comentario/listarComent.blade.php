@extends('painel/layouts/painel/layout')

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
                            <h5 class="item">{{ $comentario->nome_cliente }}</h5>

                            <span>
                                <a title="Duplicar Comentário" href="/comentario/{{ $comentario->id }}/duplicar" class="btn btn-warning">
                                    <i class="fas fa-copy"></i>
                                </a>

                                <a title="Listar Comentários" href="/comentario/{{ $comentario->id }}/listarDados" class="btn btn-success">
                                    <i class="fas fa-pen-square"></i>
                                </a>
            
                                <a title="Remover Comntário" id="{{ $comentario->id }}" class="btn btn-danger remover">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </span>
                        </li>
                    @endforeach
                @endif
            </ul>
        </section>

        <section class="border-top border-success border-2 mt-5 d-flex justify-content-between">
            <a title="Adicionar Comentário" href="/adicionar/comentario" class="btn btn-primary mt-2 py-3 px-5 col-12 col-sm-3">
                Novo Comentário
                <i class="fas fa-plus-circle ms-2"></i>
            </a>
        </section>
    </main>

    <script type="text/javascript">
        exibirFormularioExcluir('/comentario', 'Certeza que deseja excluir o comentário de');

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