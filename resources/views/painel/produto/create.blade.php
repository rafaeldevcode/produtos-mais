@extends('painel/layouts/painel/layout')

@section('conteudo')
    @if (empty($nome_marca))

        <main class="container my-5 px-5 pb-5 pt-1 bg-white rounded text-center">
            <div class="border-bottom border-success border-2 my-5 d-flex justify-content-between">
                <h2>Adicionar Produto</h2>
                <a title="Voltar" href="/painel" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            <section class="alert alert-danger">
                <h2 class="fs-4 text-center">Para adicionar um produdo você deve primeiro adicionar uma marca!</h2>
            </section>

            <a title="Adicionar Marca" href="/adicionar/marca" class="btn btn-primary mt-3 py-3 px-5 col-12 col-sm-3">
                Nova Marca
                <i class="fas fa-plus-circle ms-2"></i>
            </a>
        </main>

    @else
        
        <main class="container my-5 pt-1 bg-white rounded">
            @include('painel/layouts/componentes/mensagem', [$mensagem])

            <section class="container p-0">
                <div class="border-bottom border-success border-2 mt-5 d-flex justify-content-between">
                    <h2>Adicionar Produto</h2>
                    <a title="Adicionar Produto" href="/painel" class="btn btn-info d-flex align-items-center mb-3 py-2">
                        <i class="fas fa-reply"></i>
                    </a>
                </div>

                @include('painel/layouts/componentes/errors', [$errors])
                <small class="fs-6 text-secondary">* Compos obrigatório</small>

                <form action="/adicionar/produto" method="POST" enctype="multipart/form-data" class="border border-2 rounded p-3 my-3 formulario">
                    @csrf
                    <div class="border border-2 rounded p-3 mt-1">
                        <h3>Marca do produto <span class="fs-5 text-danger">*</span></h3>
                        <div class="col-12 mt-5">
                            <select name="id" class="form-select">
                                <option value="0">Selecione o nome da marca</option>

                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->nome_marca }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="border border-2 rounded p-3 mt-5">
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
                                <label for="quant_produto" class="form-label">Quantidade do Produto <span class="fs-5 text-danger">*</span></label>
                                <input name="quant_produto" type="number" class="form-control" placeholder="Quantidade do Produto">
                            </div>

                            <div class="col-12 col-md-5 mt-5">
                                <label for="image_produto" class="form-label">Imagem do Produto <span class="fs-5 text-danger">*</span></label>
                                <input name="image_produto" type="file" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="border border-2 rounded p-3 mt-5">
                        <h3>Valores</h3>

                        <div class="d-flex flex-wrap justify-content-between">
                            <div class="col-12 col-md-5 mt-5">
                                <label for="valor_unit" class="form-label">Valor Unitário <span class="fs-5 text-danger">*</span></label>
                                <input name="valor_unit" type="text" class="form-control" placeholder="Valor Unitário">
                            </div>
        
                            <div class="col-12 col-md-5 mt-5">
                                <label for="valor_cheio" class="form-label">Valor Cheio <span class="fs-5 text-danger">*</span></label>
                                <input name="valor_cheio" type="text" class="form-control" placeholder="Valor Cheio">
                            </div>
        
                            <div class="col-12 col-md-5 mt-5">
                                <label for="valor_parcelado" class="form-label">Valor Parcelado <span class="fs-5 text-danger">*</span></label>
                                <input name="valor_parcelado" type="text" class="form-control" placeholder="Valor Parcelado">
                            </div>
        
                            <div class="col-12 col-md-5 mt-5">
                                <label for="parcelas" class="form-label">Quantidade de Parcelas <span class="fs-5 text-danger">*</span></label>
                                <input name="parcelas" type="number" class="form-control" placeholder="Quantidade de Parcelas">
                            </div>
                        </div>
                    </div>

                    <div class="border border-2 rounded p-3 mt-5">
                        <h3>Selecione essa opção para exibir o produto na página</h3>

                        <div class="d-flex flex-wrap justify-content-between">
                            <div class="col-12 form-check form-switch">
                                <label for="exibir_produto" class="form-check-label">Mostrar na Página?</label>
                                <input name="exibir_produto" type="checkbox" class="form-check-input">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex flex-wrap justify-content-between">
                        <a title="Adidionar Marca" href="/adicionar/marca" class="btn btn-primary mt-3 py-3 px-5 col-12 col-sm-3">
                            Nova Marca
                            <i class="fas fa-plus-circle ms-2"></i>
                        </a>

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
    @endif

@endsection