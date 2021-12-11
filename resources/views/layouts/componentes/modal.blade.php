<section class="componente-modal" hidden>
    <div class="conteudo-modal rounded">
        <div class="header-modal w-100 d-flex justify-content-center align-items-center rounded-top">
            <i class="fas fa-times-circle fs-3" id="fechar"></i>
            <p class="text-center m-0">ESPERE VOCÊ ACABOU DE <br> {{ empty($modal[0]->porcentagem) ? 'GANHAR UM SUPER' : $modal[0]->porcentagem }} DESCONTO</p>
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
                        <small>De <span>{{ empty($modal[0]->preco_sem_desconto) ? '000,00' : $modal[0]->preco_sem_desconto }}</span></small> <br>
                        Por <span>{{ empty($modal[0]->preco_com_desconto) ? '000,00' : $modal[0]->preco_com_desconto }}</span>
                    </p>
                </div>

                <div class="btn-modal w-100">
                    <a href="{{ $modal[0]->link_compra }}" class="btn w-100 h-100 pulse">
                        EU QUERO
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    history.pushState({},'',location.href);
    history.pushState({},'',location.href);
    window.onpopstate = ()=>{
        document.querySelector('.componente-modal').removeAttribute('hidden');
        document.querySelector('.componente-modal').classList.remove('fechar-modal');
        document.querySelector('.componente-modal').classList.add('abrir-modal');
    };

    document.querySelector('#fechar').addEventListener('click', (event)=>{
        event.preventDefault(event);
        
        document.querySelector('.componente-modal').classList.remove('abrir-modal');
        document.querySelector('.componente-modal').classList.add('fechar-modal');
        window.history.pushState({}, 'back',  '');

        setTimeout(() => {
            document.querySelector('.componente-modal').hidden = true;
        }, 800);
    })
</script>