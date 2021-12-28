@extends('marca/layouts/painel/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">

        @include('marca/layouts/componentes/mensagem', [$mensagem])
        
        <section>
            <div class="border-bottom border-success border-2 d-flex justify-content-between">
                <h2>Configurações <span class="text-primary">{{ $marca->nome_marca }}</span></h2>
                <a title="Voltar" href="/marcas" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            <small class="fs-6 text-secondary">* Compos obrigatório</small>

            <form action="/config/{{ $config[0]->id }}/editar" method="POST">
                @csrf
                <input type="hidden" name="marca_id" value="{{ $config[0]->marca_id }}">
                <input type="hidden" name="nome_marca" value="{{ $marca->nome_marca }}">

                <h3 class="mt-5">Selecione as opções para exibir na página</h3>

                <div class="border border-2 rounded p-3 mt-3">
                    <h4>Modal</h4>
                    <div class="col-12 form-check form-switch d-flex justify-content-between align-items-center">
                        <span>
                            <label for="modal" class="form-check-label">Abilitar</label>
                            <input id="modal-config"
                                {{ $config[0]->modal == 'on' ? 'checked' : '' ; }}
                                name="modal" type="checkbox" class="form-check-input">
                        </span>

                        @if (empty($modal[0]))
                            <a title="Adicionar Modal" href="/marca/{{ $marca->id }}/modal/adicionar" class="btn btn-primary modal-config" {{ $config[0]->modal == 'on' ? '' : 'hidden' ; }}>
                                <i class="fas fa-plus-square"></i>
                            </a>
                        @else
                            <a title="Editar Modal" href="/marca/{{ $marca->id }}/modal/listarDados" class="btn btn-success modal-config" {{ $config[0]->modal == 'on' ? '' : 'hidden' ; }}>
                                <i class="fas fa-pen-square"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-3">
                    <h4>Coutdown</h4>
                    <div class="col-12 form-check form-switch">
                        <span>
                            <label for="coutdown" class="form-check-label">Abilitar</label>
                            <input id="coutdown"
                                {{ $config[0]->coutdown == 'on' ? 'checked' : '' ; }}
                                name="coutdown" type="checkbox" class="form-check-input">
                        </span>
                    </div>

                    <div class="coutdown mt-4" {{ $config[0]->coutdown == 'on' ? '' : 'hidden' ; }}>
                        <span id="mensagem"></span>
                        @csrf
                        <input id="marcaId" type="hidden" value="{{ $config[0]->marca_id }}">
                        
                        @if (empty($coutdown[0]))
                            <input id="opcao" type="hidden" value="salvar">
                        @else
                            <input id="opcao" type="hidden" value="editar">
                        @endif

                        <span class="col-12">
                            <label for="texto">Texto descritivo <span class="fs-5 text-danger">*</span></label>
                            <input id="texto" name="texto" placeholder="Texto descritivo" class="form-control" type="text" value="{{ empty($coutdown[0]->texto) ? '' : $coutdown[0]->texto }}">
                        </span>

                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-end">
                            <span class="col-md-3 col-12 mt-4">
                                <label for="data">Data de expiração <span class="fs-5 text-danger">*</span></label>
                                <input id="data" name="data" class="form-control" type="date" value="{{ empty($coutdown[0]->data) ? '' : $coutdown[0]->data }}">
                            </span>
    
                            <span class="col-md-3 col-12 mt-4">
                                <label for="time">Hora da expiração <span class="fs-5 text-danger">*</span></label>
                                <input id="time" name="time" class="form-control" type="time" value="{{ empty($coutdown[0]->time) ? '' : $coutdown[0]->time }}">
                            </span>
    
                            <span class="col-md-3 col-12 mt-4">
                                <a id="salvar" class="btn btn-success py-2 px-5 w-100">
                                    Salvar
                                    <i class="fas fa-save ms-2"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-3">
                    <h4>Tagmanager</h4>
                    <div class="col-12 form-check form-switch">
                        <label for="tagmanager" class="form-check-label">Abilitar</label>
                        <input
                            {{ $config[0]->tagmanager == 'on' ? 'checked' : '' ; }}
                            name="tagmanager" type="checkbox" class="form-check-input">
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-3">
                    <h4>Pixel</h4>
                    <div class="col-12 form-check form-switch">
                        <label for="pixel" class="form-check-label">Abilitar</label>
                        <input
                            {{ $config[0]->pixel == 'on' ? 'checked' : '' ; }}
                            name="pixel" type="checkbox" class="form-check-input">
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-3">
                    <h4>Ícones acima do produto</h4>
                    <div class="col-12 form-check form-switch">
                        <label for="icone_produto" class="form-check-label">Abilitar</label>
                        <input
                            {{ $config[0]->icone_produto == 'on' ? 'checked' : '' ; }}
                            name="icone_produto" type="checkbox" class="form-check-input">
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-3">
                    <h4>Comentários</h4>
                    <div class="col-12 form-check form-switch">
                        <label for="comentarios" class="form-check-label">Abilitar</label>
                        <input
                            {{ $config[0]->comentarios == 'on' ? 'checked' : '' ; }}
                            name="comentarios" type="checkbox" class="form-check-input">
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-3">
                    <h4>Disclaimer</h4>
                    <div class="col-12 form-check form-switch">
                        <label for="disclaimer" class="form-check-label">Abilitar</label>
                        <input
                            {{ $config[0]->disclaimer == 'on' ? 'checked' : '' ; }}
                            name="disclaimer" type="checkbox" class="form-check-input">
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-3">
                    <h4>Link para mais produtos na página de obrigdo</h4>
                    <div class="col-12 form-check form-switch">
                        <label for="exibir_link" class="form-check-label">Abilitar</label>
                        <input
                            {{ $config[0]->exibir_link == 'on' ? 'checked' : '' ; }}
                            name="exibir_link" type="checkbox" class="form-check-input">
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-3">
                    <h4>Informações da empresa</h4>
                    <div class="col-12 form-check form-switch">
                        <label for="empresa" class="form-check-label">Abilitar</label>
                        <input id="empresa"
                            {{ $config[0]->empresa == 'on' ? 'checked' : '' ; }}
                            name="empresa" type="checkbox" class="form-check-input">
                    </div>

                    <div class="border border-2 rounded py-3 px-5 mt-3 {{ $config[0]->empresa == 'on' ? 'd-flex' : '' ; }} justify-content-between flex-column flex-sm-row empresa" 
                        {{ $config[0]->empresa == 'on' ? '' : 'hidden' ; }}>
                        <div>
                            <h6>CNPJ</h6>
                            <div class="col-12 form-check form-switch">
                                <label for="cnpj" class="form-check-label">Abilitar</label>
                                <input
                                    {{ $config[0]->cnpj == 'on' ? 'checked' : '' ; }}
                                    name="cnpj" type="checkbox" class="form-check-input">
                            </div>
                        </div>

                        <div class="mt-4 mt-sm-0">
                            <h6>RUA</h6>
                            <div class="col-12 form-check form-switch">
                                <label for="rua" class="form-check-label">Abilitar</label>
                                <input
                                    {{ $config[0]->rua == 'on' ? 'checked' : '' ; }}
                                    name="rua" type="checkbox" class="form-check-input">
                            </div>
                        </div>

                        <div class="mt-4 mt-sm-0">
                            <h6>CIDADE</h6>
                            <div class="col-12 form-check form-switch">
                                <label for="cidade" class="form-check-label">Abilitar</label>
                                <input
                                    {{ $config[0]->cidade == 'on' ? 'checked' : '' ; }}
                                    name="cidade" type="checkbox" class="form-check-input">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-3">
                    <h4>Atendimanto</h4>
                    <div class="col-12 form-check form-switch">
                        <label for="atendimento" class="form-check-label">Abilitar</label>
                        <input id="atendimento"
                            {{ $config[0]->atendimento == 'on' ? 'checked' : '' ; }}
                            name="atendimento" type="checkbox" class="form-check-input">
                    </div>

                    <div class="border border-2 rounded py-3 px-5 mt-3 {{ $config[0]->atendimento == 'on' ? 'd-flex' : '' ; }} justify-content-between flex-column flex-sm-row atendimento" 
                        {{ $config[0]->atendimento == 'on' ? '' : 'hidden' ; }}>
                        <div>
                            <h6>TELEFONE</h6>
                            <div class="col-12 form-check form-switch">
                                <label for="telefone" class="form-check-label">Abilitar</label>
                                <input
                                    {{ $config[0]->telefone == 'on' ? 'checked' : '' ; }}
                                    name="telefone" type="checkbox" class="form-check-input">
                            </div>
                        </div>

                        <div class="mt-4 mt-sm-0">
                            <h6>E-MAIL</h6>
                            <div class="col-12 form-check form-switch">
                                <label for="email" class="form-check-label">Abilitar</label>
                                <input
                                    {{ $config[0]->email == 'on' ? 'checked' : '' ; }}
                                    name="email" type="checkbox" class="form-check-input">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-3">
                    <h4>Social</h4>
                    <div class="col-12 form-check form-switch">
                        <label for="social" class="form-check-label">Abilitar</label>
                        <input id="social"
                            {{ $config[0]->social == 'on' ? 'checked' : '' ; }}
                            name="social" type="checkbox" class="form-check-input">
                    </div>

                    <div class="border border-2 rounded py-3 px-5 mt-3 {{ $config[0]->social == 'on' ? 'd-flex' : '' ; }} justify-content-between flex-column flex-sm-row social" 
                        {{ $config[0]->social == 'on' ? '' : 'hidden' ; }}>
                        <div>
                            <h6>FACEBOOK</h6>
                            <div class="col-12 form-check form-switch">
                                <label for="facebook" class="form-check-label">Abilitar</label>
                                <input
                                    {{ $config[0]->facebook == 'on' ? 'checked' : '' ; }}
                                    name="facebook" type="checkbox" class="form-check-input">
                            </div>
                        </div>

                        <div class="mt-4 mt-sm-0">
                            <h6>INSTAGRAM</h6>
                            <div class="col-12 form-check form-switch">
                                <label for="instagram" class="form-check-label">Abilitar</label>
                                <input
                                    {{ $config[0]->instagram == 'on' ? 'checked' : '' ; }}
                                    name="instagram" type="checkbox" class="form-check-input">
                            </div>
                        </div>

                        <div class="mt-4 mt-sm-0">
                            <h6>TWITTER</h6>
                            <div class="col-12 form-check form-switch">
                                <label for="twitter" class="form-check-label">Abilitar</label>
                                <input
                                    {{ $config[0]->twitter == 'on' ? 'checked' : '' ; }}
                                    name="twitter" type="checkbox" class="form-check-input">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-top border-success border-2 mt-5 d-flex flex-wrap justify-content-between">
                    <a title="Nova Marca" href="/adicionar/marca" class="btn btn-primary mt-2 py-3 px-5 col-12 col-sm-3">
                        Nova Marca
                        <i class="fas fa-plus-circle ms-2"></i>
                    </a>

                    <button title="Salvar" type="submit" class="btn btn-success mt-2 py-3 px-5 col-12 col-sm-3">
                        Salvar
                        <i class="fas fa-save ms-2"></i>
                    </button>
                </div>
            </form>
        </section>

        <section class="container mt-5">
            <h5>Páginas relacionadas a marca <span class="text-primary">{{ $marca->nome_marca }}</span></h5>

            
            <div class="border border-secondary border-2 rounded p-3 mt-3">
                <h6>Páginas de Políticas</h6>

                <ul class="list-group">
                    <li class="list-group-item">
                        <a class="text-decoration-none" target="_blank" rel="noopener" href="/politicas/privacidade/{{ $marca->id }}"> Políticas de privacidade</a>
                    </li>
                    <li class="list-group-item">
                        <a class="text-decoration-none" target="_blank" rel="noopener" href="/politicas/termos/{{ $marca->id }}">Termos de uso</a>
                    </li>
                </ul>

                <h6 class="mt-5">Páginas de obrigado/upsell</h6>

                <ul class="list-group">
                    <li class="list-group-item">
                        <a class="text-decoration-none" target="_blank" rel="noopener" href="/obrigado/{{ $marca->id }}">Obrigado</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a class="text-decoration-none" target="_blank" rel="noopener" href="/obrigado/upsell/{{ $marca->id }}">Upsell</a>

                        @if (empty($upsell[0]))
                            <a href="/obrigado/upsell/{{ $marca->id }}/adicionar" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        @else
                            <a href="/obrigado/upsell/{{ $marca->id }}/listar" class="btn btn-success">
                                <i class="fas fa-pen-square"></i>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </section>
    </main>

    <script type="text/javascript">
        chamarFuncaoAbilitarConfig();
        salvarCoutdown();
    </script>

@endsection