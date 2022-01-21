@extends('painel/layouts/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">
        <section>
            <div class="border-bottom border-success border-2 d-flex justify-content-between">
                <h2>Editar Upsell - <span class="text-primary">{{ $marca->nome_marca }}</span></h2>
                <a title="Voltar" href="/marca/{{ $marca->id }}/config" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            <form action="/obrigado/upsell/{{ $marca->id }}/editar" method="POST" enctype="multipart/form-data">
                @csrf

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Informações Principais</h5>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="nome_produto" type="text" value="{{ $dados->nome_produto }}">

                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Nome:</b>{{ $dados->nome_produto }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="link_compra" type="text" value="{{ $dados->link_compra }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Link de checkout:</b>{{ $dados->link_compra }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="preco_sem_desconto" type="text" value="{{ $dados->preco_sem_desconto }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Preço sem desconto:</b>{{ $dados->preco_sem_desconto }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="preco_com_desconto" type="text" value="{{ $dados->preco_com_desconto }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Preço com desconto:</b>{{ $dados->preco_com_desconto }}</span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>
                </ul>

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Imagens</h5>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-75 inputEditar" name="image_produto" type="file">

                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Imagem do pruduto:</b> <br>
                            <img class="mt-4" width="100px" height="auto" src="{{ $dados->imagem_produto }}" alt="Produto - {{ $dados->image_produto }}">
                        </span>

                        @include('painel/layouts/componentes/btneditar')
                    </li>
                </ul>

                <div class="border-top border-success border-2 mt-5 d-flex flex-wrap justify-content-between">
                    <a title="Remover Upsell" id="{{ $dados->id }}" class="btn btn-danger mt-2 py-3 px-5 col-12 col-sm-3 remover">
                        Remover Upsell
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

        exibirFormularioExcluir('/obrigado/upsell', 'Certeza que deseja excluir esta upsell?');

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
                        button.setAttribute('title', 'Remover Upsell');
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