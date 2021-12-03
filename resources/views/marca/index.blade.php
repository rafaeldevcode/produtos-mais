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
                        <h5 class="item">{{ $marca->nome_marca }}</h5>

                        <span>
                            <a href="/{{ $marca->slug_marca }}/{{ $marca->id }}" class="btn btn-info">
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
                            <a id="{{ $marca->id }}" class="btn btn-danger remover">
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

    <script>
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
                    form.setAttribute('action', `/marca/${id}/remover`);
                    form.setAttribute('method', 'POST');
                    form.setAttribute('class', 'text-center d-flex justify-content-evenly');
                    form.innerHTML = '@csrf';
                    form.appendChild(a);
                    form.appendChild(button);

                let p = document.createElement('p');
                    p.setAttribute('class', 'fs-5 text-center lh-1 py-1');
                    p.innerHTML = `Certeza que deseja excluir a marca ${item}?`;

                let div = document.createElement('div');
                    div.setAttribute('class', 'alert alert-danger col-12 col-sm-6 col-md-4 border-danger border-1');
                    div.appendChild(p);
                    div.appendChild(form);
                
                let section = document.createElement('section');
                    section.setAttribute('class', 'sessao-excluir w-100 h-100 d-flex justify-content-center align-items-center fixed-top removerMarca');
                    section.appendChild(div);

                main.appendChild(section);

                cancelar();
            })
        }

        function cancelar(){
            document.getElementById('cancelar').addEventListener('click', ()=>{
                document.querySelector('.removerMarca').remove('section')
            })
        }
    </script>

@endsection