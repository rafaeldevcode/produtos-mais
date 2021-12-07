@extends('layouts/painel/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">
        <section>
            <div class="border-bottom border-success border-2 d-flex justify-content-between">
                <h2>Editar {{ $dados->nome_produto }}</h2>
                <a href="/marca/{{ $dados->marca_id }}/produtos" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>
            <form action="/produto/{{ $produtoId }}/editar" method="POST">
                @csrf

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Informações Principais</h5>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="nome_produto" type="text" value="{{ $dados->nome_produto }}">


                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Nome:</b>{{ $dados->nome_produto }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="link_compra" type="text" value="{{ $dados->link_compra }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Link de checkout:</b>{{ $dados->link_compra }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="quant_produto" type="text" value="{{ $dados->quant_produto }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Quantidade:</b>{{ $dados->quant_produto }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="image_produto" type="text" value="{{ $dados->image_produto }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Imagem:</b>{{ $dados->image_produto }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>
                </ul>

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Valores</h5>

                <ul class="list-group">

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="valor_unit" type="text" value="{{ $dados->valor_unit }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Valor por únidade:</b>{{ $dados->valor_unit }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="valor_cheio" type="text" value="{{ $dados->valor_cheio }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Valor total:</b>{{ $dados->valor_cheio }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="valor_parcelado" type="text" value="{{ $dados->valor_parcelado }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Valor das parcelas:</b>{{ $dados->valor_parcelado }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="parcelas" type="text" value="{{ $dados->parcelas }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Quantidade de parcelas:</b>{{ $dados->parcelas }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>
                </ul>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Selecione essa opção para exibir o produto na página</h3>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 form-check form-switch">
                            <label for="exibir_produto" class="form-check-label">Mostrar na Página?</label>
                            <input
                                @if ($dados->exibir_produto == 'on')
                                    {{ $checked = 'checked' }}
                                @else
                                    {{ $checked = '' }}
                                @endif
                             name="exibir_produto" type="checkbox" class="form-check-input">
                        </div>
                    </div>
                </div>

                <div class="border-top border-success border-2 mt-5 d-flex flex-wrap justify-content-between">
                    <a href="/adicionar/produto" class="btn btn-primary mt-2 py-3 px-5 col-12 col-sm-3">
                        Novo Produto
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