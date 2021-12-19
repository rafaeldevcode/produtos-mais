<section class="componente-modal" hidden>
        <div class="conteudo-modal rounded {{ empty($modal[0]) ? 'd-flex align-items-center justify-content-center' : '' }}">
            @if (empty($modal[0]))
                <div class="alert alert-danger">
                    <p class="text-center mb-0">Você apenas abilitou o modal mas não cadastrou nenhum!</p>
                    <p class="text-center">Deseja adicionar um Modal?</p>
        
                    <div class="d-flex justify-content-evenly">
                        <button title="Fechar Modal" id="fechar" class="btn btn-danger py-2 px-5">Não</button>
                        <a title="Adicionar Modal" href="/marca/{{ $marca->id }}/modal/adicionar" class="btn btn-primary py-2 px-5">Sim</a>
                    </div>
                    <span class="row text-center m-auto">Para evitar exibir essa mensagem ao cliente final, dasbilite o modal em configurações!</span>
                </div>
            @else

                <div class="header-modal w-100 d-flex justify-content-center align-items-center rounded-top">
                    <i class="fas fa-times-circle fs-3" id="fechar"></i>
                    <p class="text-center m-0">ESPERE VOCÊ ACABOU DE <br> GANHAR {{ empty($modal[0]->porcentagem) ? 'UM SUPER' : $modal[0]->porcentagem }} DESCONTO</p>
                </div>

                <div class="image-modal p-3 d-flex justify-content-center align-items-center">
                    <img src="{{ asset("images/{$modal[0]->produto_modal}") }}" alt="Produto Modal">
                </div>

                <div class="corpo-modal w-100 d-flex">
                    <div class="satisfacao d-flex justify-content-center align-items-center">
                        <i class="fas fa-award"></i>
                    </div>

                    <div class="preco-btn p-2">
                        <div class="preco d-flex align-items-center justify-content-end">
                            <p class="text-end">
                                <small>De <span>{{ $modal[0]->preco_sem_desconto }}</span></small> <br>
                                Por <span>{{ $modal[0]->preco_com_desconto }}</span>
                            </p>
                        </div>

                        <div class="btn-modal w-100">
                            <a title="Comprar Produto" href="{{ $modal[0]->link_compra }}" class="btn w-100 h-100 pulse">
                                EU QUERO
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
</section>

<script>
    let mobile =  navigator.userAgentData.mobile;

    if (mobile == true) {
        abrirModalMobile();
    }else{
        setTimeout(() => {
            document.querySelector('body').setAttribute('onmousemove', 'abrirModal(event)');
        }, 3000);
    }

    function fecharModal(){
        document.querySelector('#fechar').addEventListener('click', ()=>{
            event.preventDefault(event);
            
            document.querySelector('.componente-modal').classList.remove('abrir-modal');
            document.querySelector('.componente-modal').classList.add('fechar-modal');
            window.history.pushState({}, 'back',  '');

            setTimeout(() => {
                document.querySelector('.componente-modal').hidden = true;
            }, 800);
        })
    }

    function abrirModalDesk(){
        document.querySelector('.componente-modal').removeAttribute('hidden');
        document.querySelector('.componente-modal').classList.remove('fechar-modal');
        document.querySelector('.componente-modal').classList.add('abrir-modal');

        fecharModal();
    }

    function abrierModalDesckNovamente(){
        setTimeout(() => {
            document.querySelector('body').setAttribute('onmousemove', 'abrirModal(event)');
        }, 60000);

        fecharModal();
    }

    function abrirModalMobile(){
        history.pushState({},'',location.href);
        history.pushState({},'',location.href);
        window.onpopstate = ()=>{

            document.querySelector('.componente-modal').removeAttribute('hidden');
            document.querySelector('.componente-modal').classList.remove('fechar-modal');
            document.querySelector('.componente-modal').classList.add('abrir-modal');

            fecharModal();
        };
    }

    function abrirModal(event){
        let y = event.clientY;

        if (y < 20) {
            abrirModalDesk();
            document.querySelector('body').removeAttribute('onmousemove');

            abrierModalDesckNovamente();
        }
    }
</script>
