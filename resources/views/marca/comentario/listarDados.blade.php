@extends('layouts/painel/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">
        <section>
            <div class="border-bottom border-success border-2 d-flex justify-content-between">
                <h2>Editar {{ $dados[$id]->nome_cliente }}</h2>
                <a href="/marcas" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>
            <form action="/comentario/{{ $comentarioId }}/editar" method="POST">
                @csrf

                <ul class="list-group mt-5">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="nome_cliente" type="text" value="{{ $dados[$id]->nome_cliente }}">


                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Nome do cliente:</b>{{ $dados[$id]->nome_cliente }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="coment_desc" type="text" value="{{ $dados[$id]->coment_desc }}">


                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Descrição do comentário:</b>{{ $dados[$id]->coment_desc }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="image_cliente" type="text" value="{{ $dados[$id]->image_cliente }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Imagem:</b>{{ $dados[$id]->image_cliente }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="comentario" type="text" value="{{ $dados[$id]->comentario }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Comentário:</b>{{ $dados[$id]->comentario }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>
                </ul>

                <div class="border-top border-success border-2 mt-5 d-flex flex-wrap justify-content-between">
                    <a href="/adicionar/comentario" class="btn btn-primary mt-2 py-3 px-5 col-12 col-sm-3">
                        Novo Comentário
                        <i class="fas fa-plus-circle ms-2"></i>
                    </a>

                    <button type="submit" class="btn btn-success mt-2 py-3 px-5 col-12 col-sm-3">
                        Salvar
                        <i class="fas fa-save ms-2"></i>
                    </button>
                </div>
            </form>
        </section>
    </main>

    <script>
        let btnEditar = document.querySelectorAll('.btnEditar');
        let textEditar = document.querySelectorAll('.textEditar');
        let inputEditar = document.querySelectorAll('.inputEditar');

        for(let i = 0; i < btnEditar.length; i++){
            btnEditar[i].addEventListener('click', ()=>{

                if(textEditar[i].hasAttribute('hidden')){
                    textEditar[i].removeAttribute('hidden');
                    inputEditar[i].hidden = true;
                }else{
                    inputEditar[i].removeAttribute('hidden');
                    textEditar[i].hidden = true;
                }

            })
        }
    </script>

@endsection