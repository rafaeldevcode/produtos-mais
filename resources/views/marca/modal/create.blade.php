@extends('marca/layouts/painel/layout')

@section('conteudo')
    <main class="container bg-white my-5 rounded p-3">
        <div class="border-bottom border-success border-2 d-flex flex-column-reverse flex-md-row justify-content-md-between align-items-center">
            <h2>Configurações Modal</h2>
    
            <a title="Voltar" href="/marca/{{ $marcaId }}/config" class="btn btn-info d-flex align-items-center ms-2 py-2">
                <i class="fas fa-reply"></i>
            </a>
        </div>

        @include('marca/layouts/componentes/errors', [$errors])
        
        <section class="d-flex flex-wrap">
            <form method="POST" action="/marca/{{ $marcaId }}/modal/adicionar" class="my-5 col-12 col-md-6 adiconar-produto">
                @csrf

                <div>
                    <label for="produto_modal">Imagen do produto</label>
                    <input type="text" name="produto_modal" class="form-control">
                </div>

                <div class="mt-5">
                    <label for="desconto">Porcentagem de desconto</label>
                    <input type="text" name="porcentagem" class="form-control" placeholder="Ex: 10%">
                </div>

                <div class="mt-5">
                    <label for="preco_sem_desconto">Preço sem desconto</label>
                    <input type="text" name="preco_sem_desconto" class="form-control" placeholder="Preço sem desconto">
                </div>

                <div class="mt-5">
                    <label for="preco_com_desconto">Preço com desconto</label>
                    <input type="text" name="preco_com_desconto" class="form-control" placeholder="Preço com desconto">
                </div>

                <div class="mt-5">
                    <label for="link_compra">Link para checkout</label>
                    <input type="url" name="link_compra" class="form-control" placeholder="Link para checkout">
                    <span>Ex: https://produto.com</span>
                </div>

                <div class="col-12">
                    <button title="Salvar" type="submit" class="btn btn-success mt-3 py-3 px-5 col-12">
                        Salvar
                        <i class="fas fa-save ms-2"></i>
                    </button>
                </div>
            </form>

            <div class="col-12 col-md-6 p-2 my-3">
                <img src="{{ asset('images/modal.png') }}" alt="Modal" class="w-100">
            </div>
        </section>
    </main>

    <script type="text/javascript">
        ///// REMOVER LISTAS DE ERROS AO ENVIAR COMPOS DO FORM VAZIOS //////
        let removerErro = document.querySelectorAll('.removerErro');
        let btnRemoverErro = document.querySelectorAll('.btnRemoverErro');

        for(let i = 0; i < btnRemoverErro.length; i++){
            btnRemoverErro[i].addEventListener('click', ()=>{
                removerErro[i].remove(removerErro[i])
            })
        }
    </script>
@endsection