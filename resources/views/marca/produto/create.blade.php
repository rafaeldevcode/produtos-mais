@extends('layouts/painel/layout')

@section('conteudo')
    
    <main class="container my-5 pt-3 bg-white rounded">
        <section class="container px-2">
            <div class="border-bottom border-success border-2 mt-5 d-flex justify-content-between">
                <h2>Adicionar Produto</h2>
                <a href="/painel/admin" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            <form action="?" method="POST" class="border border-2 rounded p-3 my-3">

                <div class="d-flex flex-wrap justify-content-between">
                    <div class="col-12 mb-5">
                        <label for="marca" class="form-label">Selecione a Marca</label>
                        <input list="marca" class="form-control" />
                            <datalist id="marca">
                                <option value="teste">
                            </datalist>
                    </div>

                    <div class="col-12 col-md-5">
                        <label for="nome_produto" class="form-label">Nome Do Produto</label>
                        <input id="nome_produto" name="nome_produto" type="text" class="form-control" placeholder="Nome do Produto">
                    </div>

                    <div class="col-12 col-md-5 mt-5 mt-md-0">
                        <label for="link_compra" class="form-label">Link de Compra</label>
                        <input id="link_compra" name="link_compra" type="text" class="form-control" placeholder="Link de Compra">
                    </div>

                    <div class="col-12 col-md-5 mt-5">
                        <label for="quant_produto" class="form-label">Quantidade do Produto</label>
                        <input id="quant_produto" name="quant_produto" type="number" class="form-control" placeholder="Quantidade do Produto">
                    </div>

                    <div class="col-12 col-md-5 mt-5">
                        <label for="image_produto" class="form-label">Imagem do Produto</label>
                        <input id="image_produto" name="image_produto" type="text" class="form-control">
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Valores</h3>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5 mt-5">
                            <label for="valor_unit" class="form-label">Valor Unitário</label>
                            <input id="valor_unit" name="valor_unit" type="number" class="form-control" placeholder="Valor Unitário">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="valor_cheio" class="form-label">Valor Cheio</label>
                            <input id="valor_cheio" name="valor_cheio" type="number" class="form-control" placeholder="Valor Cheio">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="valor_parcelado" class="form-label">Valor Parcelado</label>
                            <input id="valor_parcelado" name="valor_parcelado" type="number" class="form-control" placeholder="Valor Parcelado">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="parcelas" class="form-label">Quantidade de Parcelas</label>
                            <input id="parcelas" name="parcelas" type="number" class="form-control" placeholder="Quantidade de Parcelas">
                        </div>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Selecione essa opção para exibir o produto na página</h3>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 form-check form-switch">
                            <label for="exibir_produto" class="form-check-label">Mostrar na Página?</label>
                            <input id="exibir_produto" name="exibir_produto" type="checkbox" class="form-check-input">
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-success mt-3 py-3 px-5">
                        Adicionar
                        <i class="fas fa-plus-circle ms-2"></i>
                    </button>
                </div>

            </form>
        </section>
    </main>

@endsection