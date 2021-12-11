@extends('layouts/painel/layout')

@section('conteudo')

    @if (empty($nome_marca))

        <main class="container my-5 px-5 pb-5 pt-1 bg-white rounded text-center">
            <div class="border-bottom border-success border-2 my-5 d-flex justify-content-between">
                <h2>Adicionar Comentário</h2>
                <a href="/marcas" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            <section class="alert alert-danger">
                <h2 class="fs-4 text-center">Para adicionar um comentário você deve primeiro adicionar uma marca!</h2>
            </section>

            <a href="/adicionar/marca" class="btn btn-primary mt-3 py-3 px-5 col-12 col-sm-3">
                Nova Marca
                <i class="fas fa-plus-circle ms-2"></i>
            </a>
        </main>

    @else
        
        <main class="container my-5 pt-1 bg-white rounded">
            @if (!empty($mensagem))
                @include('layouts/componentes/mensagem', [$mensagem])
            @endif
            <section class="container p-0">
                <div class="border-bottom border-success border-2 mt-5 d-flex justify-content-between">
                    <h2>Adicionar Comentário</h2>
                    <a href="/marcas" class="btn btn-info d-flex align-items-center mb-3 py-2">
                        <i class="fas fa-reply"></i>
                    </a>
                </div>

                @if ($errors->any())
                    <div class="mt-3">
                        <ul class="m-0">
                            @foreach ($errors->all() as $error)
                                <li class="p-1 m-1 alert alert-danger d-flex justify-content-between align-items-center removerErro">{{ $error }} <i class="fas fa-times btnRemoverErro"></i></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/adicionar/comentario" method="POST" class="adiconar-marca border border-2 rounded p-3 my-3">
                    @csrf

                    <div class="border border-2 rounded p-3 mt-1">
                        <h3>Marca do produto</h3>
                        <div class="col-12 mt-5">
                            <select name="id" class="form-select">
                                <option value="0">Selecione o nome da marca</option>

                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->nome_marca }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="border border-2 rounded p-3 mt-1">
                        <h3>Dados do usuário</h3>
                        <div class="d-flex flex-wrap justify-content-between mt-5">
                            <div class="col-12 col-md-5">
                                <label for="nome_cliente" class="form-label">Nome Do Cliente</label>
                                <input name="nome_cliente" type="text" class="form-control" placeholder="Nome do Cliente">
                            </div>

                            <div class="col-12 col-md-5 mt-5 mt-md-0">
                                <label for="coment_desc" class="form-label">Descrição</label>
                                <input name="coment_desc" type="text" class="form-control" placeholder="Descrição do comentário">
                            </div>

                            <div class="col-12 mt-5">
                                <label for="image_cliente" class="form-label">Imagem do Cliente</label>
                                <input name="image_cliente" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="border border-2 rounded p-3 mt-1">
                        <h3>Comentário</h3>
                        <div class="mt-5">
                            <label for="comentario">Comentário</label>
                            <textarea name="comentario" class="form-control" placeholder="Adicione o comentário aqui"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mt-3 py-3 px-5 col-12 col-sm-3">
                            Salvar
                            <i class="fas fa-save ms-2"></i>
                        </button>
                    </div>

                </form>
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
    @endif

@endsection