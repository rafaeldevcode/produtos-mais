<section class="componente-modal" hidden>
        <div class="conteudo-modal rounded {{ empty($modal) ? 'd-flex align-items-center justify-content-center' : '' }}">
            @if (empty($modal))
                <div class="alert alert-danger d-flex flex-column">
                    <p class="text-center mb-0">Você apenas abilitou o modal mas não cadastrou nenhum!</p>

                    @auth
                        @if ($usuario->autorizacao !== 'Leitor')
                            <p class="text-center">Deseja adicionar um Modal?</p>
                        @endif
            
                        <div class="d-flex justify-content-evenly">
                            @if ($usuario->autorizacao !== 'Leitor')
                                <button title="Fechar Modal" id="fechar" class="btn btn-danger py-2 px-5">Não</button>
                                <a title="Adicionar Modal" href="/marca/{{ $marca->id }}/modal/adicionar" class="btn btn-primary py-2 px-5">Sim</a>
                            @else
                                <button title="Fechar Modal" id="fechar" class="btn btn-danger py-2 px-5">Fechar</button>
                            @endif
                        </div>
                    @endauth
                    <span class="row text-center m-auto">Para evitar exibir essa mensagem ao cliente final, dasbilite o modal em configurações!</span>
                    
                    @guest
                        <button title="Fechar Modal" id="fechar" class="btn btn-danger py-2 px-5">Fechar</button>
                    @endguest
                </div>
            @else

                <div class="header-modal w-100 d-flex justify-content-center align-items-center rounded-top">
                    <i class="fas fa-times-circle fs-3" id="fechar"></i>
                    <p class="text-center m-0">ESPERE VOCÊ ACABOU DE <br> GANHAR {{ empty($modal->porcentagem) ? 'UM SUPER' : $modal->porcentagem }} DESCONTO</p>
                </div>

                <div class="image-modal p-3 d-flex justify-content-center align-items-center">
                    <img src="{{ asset("storage/{$modal->produto_modal}") }}" alt="Produto Modal">
                </div>

                <div class="corpo-modal w-100 d-flex">
                    <div class="satisfacao d-flex justify-content-center align-items-center">
                        <i class="fas fa-award"></i>
                    </div>

                    <div class="preco-btn p-2">
                        <div class="preco d-flex align-items-center justify-content-end">
                            <p class="text-end">
                                <small>De <span>{{ $modal->preco_sem_desconto }}</span></small> <br>
                                Por <span>{{ $modal->preco_com_desconto }}</span>
                            </p>
                        </div>

                        <div class="btn-modal w-100">
                            <a title="Comprar Produto" href="{{ $modal->link_compra }}" class="btn w-100 h-100 pulse">
                                EU QUERO
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
</section>

<script type="text/javascript">
    navigator.userAgentData.mobile == true ? abrirModalMobile() : adicionarAttrOnmousemove();

    abrirModal(event);
</script>
