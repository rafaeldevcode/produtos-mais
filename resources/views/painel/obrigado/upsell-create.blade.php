@extends('painel/layouts/painel/layout')

@section('conteudo')
    
    <main class="container my-5 pt-1 bg-white rounded">
        <section class="container p-0">
            <div class="border-bottom border-success border-2 mt-5 d-flex justify-content-between">
                <h2>Adicionar Upsell - <span class="text-primary">{{ $marca->nome_marca }}</span></h2>
                <a title="Voltar" href="/marca/{{ $marca->id }}/config" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            @include('painel/layouts/componentes/errors', [$errors])
            <small class="fs-6 text-secondary">* Compos obrigatório</small>

            <form action="/obrigado/upsell/{{ $marca->id }}/adicionar" method="POST" enctype="multipart/form-data" class="rounded p-3 my-3 formulario">
                @csrf

                <div class="border border-2 rounded p-3">
                    <h3>Informações Principais</h3>

                    <div class="d-flex flex-wrap justify-content-between mt-5">
                        <div class="col-12 col-md-5">
                            <label for="nome_produto" class="form-label">Nome Do Produto <span class="fs-5 text-danger">*</span></label>
                            <input name="nome_produto" type="text" class="form-control" placeholder="Nome do Produto">
                        </div>

                        <div class="col-12 col-md-5">
                            <label for="link_compra" class="form-label">Link de Compra <span class="fs-5 text-danger">*</span></label>
                            <input name="link_compra" type="url" class="form-control" placeholder="Link de Compra">
                            <span>Ex: https://produto.com</span>
                        </div>

                        <div class="col-12 col-md-5 mt-5">
                            <label for="preco_sem_desconto" class="form-label">Preço sem desconto<span class="fs-5 text-danger">*</span></label>
                            <input name="preco_sem_desconto" type="text" class="form-control" placeholder="Valor sem desconto">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="preco_com_desconto" class="form-label">Preço com desconto<span class="fs-5 text-danger">*</span></label>
                            <input name="preco_com_desconto" type="text" class="form-control" placeholder="Valor com desconto">
                        </div>

                        <div class="col-12 mt-5">
                            <label for="image_produto" class="form-label">Imagem do Produto <span class="fs-5 text-danger">*</span></label>
                            <input name="image_produto" type="file" class="form-control">
                            <span>Recomendçaõ de uma foto 400 X 400</span>
                        </div>
                    </div>
                </div>

                
                <div class="col-12 d-flex flex-wrap justify-content-end">
                    <button title="Salvar" type="submit" class="btn btn-success mt-3 py-3 px-5 col-12 col-sm-3">
                        Salvar
                        <i class="fas fa-save ms-2"></i>
                    </button>
                </div>
            </form>
        </section>
    </main>

    <script type="text/javascript">
        removerErroVerificacao();
    </script>
@endsection