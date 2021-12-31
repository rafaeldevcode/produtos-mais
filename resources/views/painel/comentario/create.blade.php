@extends('painel/layouts/painel/layout')

@section('conteudo')

    @if (empty($nome_marca))

        <main class="container my-5 px-5 pb-5 pt-1 bg-white rounded text-center">
            <div class="border-bottom border-success border-2 my-5 d-flex justify-content-between">
                <h2>Adicionar Comentário</h2>
                <a title="Voltar" href="/painel" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            <section class="alert alert-danger">
                <h2 class="fs-4 text-center">Para adicionar um comentário você deve primeiro adicionar uma marca!</h2>
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
                    <h2>Adicionar Comentário</h2>
                    <a title="Adicionar Comentário" href="/painel" class="btn btn-info d-flex align-items-center mb-3 py-2">
                        <i class="fas fa-reply"></i>
                    </a>
                </div>

                @include('painel/layouts/componentes/errors', [$errors])
                <small class="fs-6 text-secondary">* Compos obrigatório</small>

                <form action="/adicionar/comentario" method="POST" enctype="multipart/form-data" class="adiconar-marca border border-2 rounded p-3 my-3">
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

                    <div class="border border-2 rounded p-3 mt-1">
                        <h3>Dados do usuário</h3>
                        <div class="d-flex flex-wrap justify-content-between mt-5">
                            <div class="col-12 col-md-5">
                                <label for="nome_cliente" class="form-label">Nome Do Cliente <span class="fs-5 text-danger">*</span></label>
                                <input name="nome_cliente" type="text" class="form-control" placeholder="Nome do Cliente">
                            </div>

                            <div class="col-12 col-md-5 mt-5 mt-md-0">
                                <label for="coment_desc" class="form-label">Descrição <span class="fs-5 text-danger">*</span></label>
                                <input name="coment_desc" type="text" class="form-control" placeholder="Descrição do comentário">
                            </div>

                            <div class="col-12 mt-5">
                                <label for="image_cliente" class="form-label">Imagem do Cliente <span class="fs-5 text-danger">*</span></label>
                                <input name="image_cliente" type="file" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="border border-2 rounded p-3 mt-1">
                        <h3>Comentário</h3>
                        <div class="mt-5">
                            <label for="comentario">Comentário <span class="fs-5 text-danger">*</span></label>
                            <textarea name="comentario" class="form-control" placeholder="Adicione o comentário aqui"></textarea>
                        </div>
                    </div>

                    <div class="border border-2 rounded p-3 mt-5">
                        <h3>Selecione essa opção para exibir o comentário na página</h3>

                        <div class="d-flex flex-wrap justify-content-between">
                            <div class="col-12 form-check form-switch">
                                <label for="exibir_coment" class="form-check-label">Mostrar na Página?</label>
                                <input name="exibir_coment" type="checkbox" class="form-check-input">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
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