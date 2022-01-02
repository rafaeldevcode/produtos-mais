@extends('painel/layouts/painel/layout')

@section('conteudo')

<style>
    .cartao-imagen{
        width: 150px;
        height: 185px;
    }

    .cartao-imagen img,
    .cartao-imagen a{
        cursor: pointer;
    }

    .cartao-imagen:nth-child(1),
    .cartao-imagen:nth-child(2){
        display: none !important;
    }
</style>
    <main class="container bg-white my-5 rounded p-3">
        @include('painel/layouts/componentes/mensagem', [$mensagem])
        <div class="border-bottom border-success border-2 d-flex justify-content-between">
            <h2>Galeria</span></h2>
            <a title="Voltar" href="/painel" class="btn btn-info d-flex align-items-center mb-3 py-2">
                <i class="fas fa-reply"></i>
            </a>
        </div>

        <div>
            <div class="border border-2 rounded p-3 mt-3 d-flex flex-wrap justify-content-start">
                <?php
                    $diretorio = 'storage/galeria/';

                    if(is_dir($diretorio)){

                        $imagens = scandir($diretorio);

                        if(count($imagens) == 2) { ?>
                            <div class="alert alert-danger col-12 text-center m-0">
                                Não foi feito nenhum upload!
                            </div>
                        <?php }else{
                            foreach ($imagens as $indice => $imagen) { ?>
                                <div class="card cartao-imagen p-2 m-2 d-flex flex-column justify-content-between align-items-end">
                                    <img class="w-100 h-100 imagen" src="<?php echo $diretorio . $imagen; ?>" alt="imagen-<?php echo ($indice - 1) ?>">
                                    <a class="text-danger text-decoration-none mt-3 remover">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            <?php }
                        }
                    }
                ?>
            </div>
        </div>

        <section class="border-top border-success border-2 mt-5 d-flex flex-wrap justify-content-end">
            <button id="upload" title="Carregar mais arquivos" class="btn btn-success mt-2 py-3 px-5 col-12 col-sm-5 col-md-3">
                Upload
                <i class="fas fa-upload"></i>
            </button>
        </section>
    </main>

    <script type="text/javascript">
        exibirFormularioExcluir('/galeria/imagen/remover', 'Certeza que deseja excluir esta imagen?');

        // document.getElementById('remover').addEventListener('click', ()=>{
        //     let id = document.getElementById('marcaId').innerText;
        //     criarFormulario(`/marca/${id}/comentarios/remover/todos`, 'Certeza que deseja excluir todos os comentário?', '', ''); 
        // });

        function exibirFormularioExcluir(url, mensagem) {
            let remover = document.querySelectorAll('.remover');
            let imagen = document.querySelectorAll('.imagen');

            for(let i = 0; i < remover.length; i++){
                let id = imagen[i].src.replace(`http://${window.location.hostname}:8000/storage/galeria/`, '');
                // let item = document.querySelectorAll('.item')[i].innerHTML;

                remover[i].addEventListener('click', ()=>{
                    criarFormulario(url, mensagem, id, '');
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
                button.innerHTML = 'Excluir';
                button.appendChild(i);
            
            let i_a = document.createElement('i');
                i_a.setAttribute('class', 'fas fa-ban ms-2');

            let a = document.createElement('a');
                a.setAttribute('id', 'cancelar');
                a.setAttribute('class', 'btn btn-primary');
                a.innerHTML = 'Cancelar';
                a.appendChild(i_a);

            let input = document.createElement('input');
                input.setAttribute('type', 'text');
                input.setAttribute('value', id);
                input.setAttribute('name', 'id');
                input.setAttribute('hidden', '');


            let form = document.createElement('form');
                form.setAttribute('action', url);
                form.setAttribute('method', 'POST');
                form.setAttribute('class', 'text-center d-flex justify-content-evenly');
                form.innerHTML = '@csrf';
                form.appendChild(input);
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