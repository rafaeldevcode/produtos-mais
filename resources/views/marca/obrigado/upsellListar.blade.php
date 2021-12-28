@extends('marca/layouts/painel/layout')

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

                        <span>
                            <a title="Editar" class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="link_compra" type="text" value="{{ $dados->link_compra }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Link de checkout:</b>{{ $dados->link_compra }}</span>

                        <span>
                            <a title="Editar" class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="preco_sem_desconto" type="text" value="{{ $dados->preco_sem_desconto }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Preço sem desconto:</b>{{ $dados->preco_sem_desconto }}</span>

                        <span>
                            <a title="Editar" class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="preco_com_desconto" type="text" value="{{ $dados->preco_com_desconto }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Preço com desconto:</b>{{ $dados->preco_com_desconto }}</span>

                        <span>
                            <a title="Editar" class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>
                </ul>

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Imagens</h5>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="image_produto" type="file">

                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Imagem do pruduto:</b> <br>
                            <img class="mt-4" width="100px" height="auto" src="{{ asset("storage/{$dados->image_produto}") }}" alt="Produto - {{ $dados->image_produto }}">
                        </span>

                        <span>
                            <a title="Editar" class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>
                </ul>

                <div class="border-top border-success border-2 mt-5 d-flex flex-wrap justify-content-end">
                    <button title="Salvar" type="submit" class="btn btn-success mt-2 py-3 px-5 col-12 col-sm-3">
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