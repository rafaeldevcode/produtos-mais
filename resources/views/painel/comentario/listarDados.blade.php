@extends('painel/layouts/painel/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">
        <section>
            <div class="border-bottom border-success border-2 d-flex justify-content-between">
                <h2>Editar <span class="text-primary">{{ $dados->nome_cliente }}</span></h2>
                <a title="Voltar" href="/marca/{{ $dados->marca_id }}/comentarios" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            <form action="/comentario/{{ $comentarioId }}/editar" method="POST" enctype="multipart/form-data">
                @csrf

                <h5 class="mt-5 mb-3 border-bottom border-info border-2">Informações Principais</h5>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="nome_cliente" type="text" value="{{ $dados->nome_cliente }}">


                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Nome do cliente:</b>{{ $dados->nome_cliente }}</span>

                        <span>
                            <a title="Editar" class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="coment_desc" type="text" value="{{ $dados->coment_desc }}">


                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Descrição do comentário:</b>{{ $dados->coment_desc }}</span>

                        <span>
                            <a title="Editar" class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <textarea hidden class="form-control w-75 inputEditar" name="comentario">{{ $dados->comentario }}</textarea>

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Comentário:</b>{{ $dados->comentario }}</span>

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
                        <input hidden class="form-control w-25 inputEditar" name="image_cliente" type="file">

                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Imagem cliente:</b> <br>
                            <img class="mt-4" width="100px" height="auto" src="{{ asset("storage/{$dados->image_cliente}") }}" alt="{{ $dados->nome_cliente }}">
                        </span>

                        <span>
                            <a title="Editar" class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>
                </ul>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Selecione essa opção para exibir o comentário na página</h3>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 form-check form-switch">
                            <label for="exibir_coment" class="form-check-label">Mostrar na Página?</label>
                            <input
                                {{ $dados->exibir_coment == 'on' ? 'checked' : '' ; }}
                             name="exibir_coment" type="checkbox" class="form-check-input">
                        </div>
                    </div>
                </div>

                <div class="border-top border-success border-2 mt-5 d-flex flex-wrap justify-content-between">
                    <a title="Novo Comentário" href="/adicionar/comentario" class="btn btn-primary mt-2 py-3 px-5 col-12 col-sm-3">
                        Novo Comentário
                        <i class="fas fa-plus-circle ms-2"></i>
                    </a>

                    <button title="Salvar" type="submit" class="btn btn-success mt-2 py-3 px-5 col-12 col-sm-3">
                        Salvar
                        <i class="fas fa-save ms-2"></i>
                    </button>
                </div>
            </form>
        </section>
    </main>

    <script type="text/javascript">
        abilitarInputEditar();
    </script>

@endsection