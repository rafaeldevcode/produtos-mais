@extends('marca/layouts/painel/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">
        <section>
            <div class="border-bottom border-success border-2 d-flex justify-content-between">
                <h2>Editar Modal</h2>
                <a title="Voltar" href="/marca/{{ $marcaId }}/config" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            @include('marca/layouts/componentes/errors', [$errors])
            
            <form action="/marca/{{ $marcaId }}/modal/editar" method="POST" enctype="multipart/form-data">
                @csrf

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Informações Principais</h5>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="porcentagem" type="text" value="{{ $dados[0]->porcentagem }}">


                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Porcentagem do desconto:</b>{{ $dados[0]->porcentagem }}</span>

                        <span>
                            <a title="Editar" class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="preco_sem_desconto" type="text" value="{{ $dados[0]->preco_sem_desconto }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Preço sem desconto:</b>{{ $dados[0]->preco_sem_desconto }}</span>

                        <span>
                            <a title="Editar" class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-75 inputEditar" name="preco_com_desconto" value="{{ $dados[0]->preco_com_desconto }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Preço com desconto:</b>{{ $dados[0]->preco_com_desconto }}</span>

                        <span>
                            <a title="Editar" class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-75 inputEditar" name="link_compra" value="{{ $dados[0]->link_compra }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Link do checkout:</b>{{ $dados[0]->link_compra }}</span>

                        <span>
                            <a title="Editar"class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>
                </ul>

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Imagens</h5>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="produto_modal" type="file">

                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Imagem do pruduto:</b> <br>
                            <img class="mt-4" width="100px" height="auto" src="{{ asset("storage/{$dados[0]->produto_modal}") }}" alt="Produto - {{ $dados[0]->produto_modal }}">
                        </span>

                        <span>
                            <a title="Editar" class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>
                </ul>

                <div class="border-top border-success border-2 mt-5 d-flex flex-wrap justify-content-between">
                    <a title="Remover Modal" id="{{ $dados[0]->id }}" class="btn btn-danger mt-2 py-3 px-5 col-12 col-sm-3 remover">
                        Remover Modal
                        <i class="fas fa-trash-alt ms-2"></i>
                    </a>

                    <button title="Salvar" type="submit" class="btn btn-success mt-2 py-3 px-5 col-12 col-sm-3">
                        Salvar
                        <i class="fas fa-save ms-2"></i>
                    </button>
                </div>
            </form>
        </section>
    </main>

    <script type="text/javascript">
        abilitarInputEditar();

        exibirFormularioExcluir('/modal', 'Certeza que deseja excluir o modal?');

        function exibirFormularioExcluir(url, mensagem) {
            let remover = document.querySelectorAll('.remover');

            for(let i = 0; i < remover.length; i++){
                let id = remover[i].id;

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
                        p.innerHTML = `${mensagem}`;

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