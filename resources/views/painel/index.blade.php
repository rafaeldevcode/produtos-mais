@extends('layouts/painel/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">
        <h2 class="border-bottom border-secondary border-2 pb-3">Marcas Cadastradas</h2>

        <section class="d-flex flex-wrap justify-content-evenly">
            <div class="card mt-3 text-center p-3 border-1 border-secondary col-lg-3 col-md-4 col-sm-6 col-12 mx-2">
                <h4>Nome da marca</h4>
                
                <div>
                    <a href="#" class="btn btn-info py-2 px-5 ">
                        Ver Produtos
                        <i class="fas fa-external-link-square-alt ms-2"></i>
                    </a>
                </div>
            </div>


            <div class="card mt-3 text-center p-3 border-1 border-secondary col-lg-3 col-md-4 col-sm-6 col-12  mx-2">
                <h4>Nome da marca</h4>
                
                <div>
                    <a href="#" class="btn btn-info py-2 px-5 ">
                        Ver Produtos
                        <i class="fas fa-external-link-square-alt ms-2"></i>
                    </a>
                </div>
            </div>


            <div class="card mt-3 text-center p-3 border-1 border-secondary col-lg-3 col-md-4 col-sm-6 col-12  mx-2">
                <h4>Nome da marca</h4>
                
                <div>
                    <a href="#" class="btn btn-info py-2 px-5 ">
                        Ver Produtos
                        <i class="fas fa-external-link-square-alt ms-2"></i>
                    </a>
                </div>
            </div>


            <div class="card mt-3 text-center p-3 border-1 border-secondary col-lg-3 col-md-4 col-sm-6 col-12  mx-2">
                <h4>Nome da marca</h4>
                
                <div>
                    <a href="#" class="btn btn-info py-2 px-5 ">
                        Ver Produtos
                        <i class="fas fa-external-link-square-alt ms-2"></i>
                    </a>
                </div>
            </div>
        </section>

        <section class="border-top border-secondary border-2 mt-5 d-flex justify-content-between">
            <a href="/adicionar/marca" class="btn btn-primary d-flex align-items-center mt-2 py-3 px-5">
                Nova Marca
                <i class="fas fa-plus-circle ms-2"></i>
            </a>

            <a href="/adicionar/produto" class="btn btn-primary d-flex align-items-center mt-2 py-3 px-5">
                Novo Produto
                <i class="fas fa-plus-circle ms-2"></i>
            </a>

            <a href="/adicionar/comentario" class="btn btn-primary d-flex align-items-center mt-2 py-3 px-5">
                Novo Comentário
                <i class="fas fa-plus-circle ms-2"></i>
            </a>
        </section>
    </main>

@endsection