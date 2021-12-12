@extends('marca/layouts/painel/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">
        @include('marca/layouts/componentes/mensagem', [$mensagem])
        
        <section>
            <div class="border-bottom border-success border-2 d-flex justify-content-between">
                <h2>Configurações {{ $marca->nome_marca }}</h2>
                <a href="/marcas" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>
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
                            <a href="/marca/{{ $marca->id }}/modal/adicionar" class="btn btn-primary modal-config" {{ $config[0]->modal == 'on' ? '' : 'hidden' ; }}>
                                <i class="fas fa-plus-square"></i>
                            </a>
                        @else
                            <a href="/marca/{{ $marca->id }}/modal/listarDados" class="btn btn-success modal-config" {{ $config[0]->modal == 'on' ? '' : 'hidden' ; }}>
                                <i class="fas fa-pen-square"></i>
                            </a>
                        @endif
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
                    <h4>Informações da empresa</h4>
                    <div class="col-12 form-check form-switch">
                        <label for="empresa" class="form-check-label">Abilitar</label>
                        <input id="empresa"
                            {{ $config[0]->empresa == 'on' ? 'checked' : '' ; }}
                            name="empresa" type="checkbox" class="form-check-input">
                    </div>

                    <div class="border border-2 rounded py-3 px-5 mt-3 {{ $config[0]->empresa == 'on' ? 'd-flex' : '' ; }} justify-content-between empresa" 
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

                        <div>
                            <h6>RUA</h6>
                            <div class="col-12 form-check form-switch">
                                <label for="rua" class="form-check-label">Abilitar</label>
                                <input
                                    {{ $config[0]->rua == 'on' ? 'checked' : '' ; }}
                                    name="rua" type="checkbox" class="form-check-input">
                            </div>
                        </div>

                        <div>
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

                    <div class="border border-2 rounded py-3 px-5 mt-3 {{ $config[0]->atendimento == 'on' ? 'd-flex' : '' ; }} justify-content-between atendimento" 
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

                        <div>
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

                    <div class="border border-2 rounded py-3 px-5 mt-3 {{ $config[0]->social == 'on' ? 'd-flex' : '' ; }} justify-content-between social" 
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

                        <div>
                            <h6>INSTAGRAM</h6>
                            <div class="col-12 form-check form-switch">
                                <label for="instagram" class="form-check-label">Abilitar</label>
                                <input
                                    {{ $config[0]->instagram == 'on' ? 'checked' : '' ; }}
                                    name="instagram" type="checkbox" class="form-check-input">
                            </div>
                        </div>

                        <div>
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
                    <a href="/adicionar/marca" class="btn btn-primary mt-2 py-3 px-5 col-12 col-sm-3">
                        Novo Marca
                        <i class="fas fa-plus-circle ms-2"></i>
                    </a>

                    <button type="submit" class="btn btn-success mt-2 py-3 px-5 col-12 col-sm-3">
                        Salvar
                        <i class="fas fa-save ms-2"></i>
                    </button>
                </div>
            </form>
        </section>
    </main>

    <script>
        ///// ABILITAR CONFIGURAÇÕES PARA MODAL /////
        document.getElementById('modal-config').addEventListener('click', ()=>{
            let modal = document.querySelector('.modal-config')
            
            abilitarConfig(modal);
        })

        ///// ABILITAR INPUTS EMPRESA /////
        document.getElementById('empresa').addEventListener('click', ()=>{
            let empresa = document.querySelector('.empresa')
            
            abilitarConfig(empresa);
        })

        ///// ABILITAR INPUTS ATENDIMENTO /////
        document.getElementById('atendimento').addEventListener('click', ()=>{
            let atendimento = document.querySelector('.atendimento');

            abilitarConfig(atendimento);
        })

        ///// ABILITAR INPUTS SOCIAL /////
        document.getElementById('social').addEventListener('click', ()=>{
            let social = document.querySelector('.social');

            abilitarConfig(social);
        })

        ///// FUNÇÃO ABILITAR /////
        function abilitarConfig(elemento){

            if(elemento.classList.value == 'btn btn-warning modal-config'){
                if(elemento.hasAttribute('hidden')){
                    elemento.removeAttribute('hidden');
                }else{
                    elemento.hidden = true;
                }
            }else{
                if(elemento.hasAttribute('hidden')){
                    elemento.classList.add('d-flex');
                    elemento.removeAttribute('hidden');
                }else{
                    elemento.classList.remove('d-flex');
                    elemento.hidden = true;
                }
            }
        }
    </script>

@endsection