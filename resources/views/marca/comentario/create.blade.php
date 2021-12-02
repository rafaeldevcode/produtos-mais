@extends('layouts/painel/layout')

@section('conteudo')
        
    <main class="container my-5 pt-3 bg-white rounded">
        <section class="container p-0">
            <div class="border-bottom border-success border-2 mt-5 d-flex justify-content-between">
                <h2>Adicionar Comentário</h2>
                <a href="/painel/admin" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            <form action="?" method="POST" class="adiconar-marca border border-2 rounded p-3 my-3">

                <div class="d-flex flex-wrap justify-content-between">
                    <div class="col-12 mb-5">
                        <label for="marca" class="form-label">Selecione a Marca</label>
                        <input list="marca" class="form-control" />
                            <datalist id="marca">
                                <option value="teste">
                            </datalist>
                    </div>
                    
                    <div class="col-12 col-md-5">
                        <label for="nome_cliente" class="form-label">Nome Do Cliente</label>
                        <input id="nome_cliente" name="nome_cliente" type="text" class="form-control" placeholder="Nome do Cliente">
                    </div>

                    <div class="col-12 col-md-5 mt-5 mt-md-0">
                        <label for="idade_cliente" class="form-label">Idade Do Cliente</label>
                        <input id="idade_cliente" name="idade_cliente" type="number" class="form-control" placeholder="Idade do Cliente">
                    </div>

                    <div class="col-12 mt-5">
                        <label for="image_cliente" class="form-label">Idade Do Cliente</label>
                        <input id="image_cliente" name="image_cliente" type="text" class="form-control">
                    </div>
                </div>

                <div class="mt-5">
                    <label for="comentario">Comentário</label>
                    <textarea name="comentario" id="comentario" class="form-control" placeholder="Adicione o comentário aqui"></textarea>
                </div>

                <div class="col-12 col-sm-3">
                    <button type="submit" class="btn btn-success mt-3 py-3 px-5 w-100">
                        Adicionar
                        <i class="fas fa-plus-circle ms-2"></i>
                    </button>
                </div>

            </form>
        </section>
    </main>

@endsection