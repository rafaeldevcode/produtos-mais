function abrirMenuMobile(menu) {
    document.getElementById('rotacao').addEventListener('click', ()=>{
        menu = !menu;

        if(menu == true){
            document.getElementById('rotacao').classList.remove('rotacaoInversa');
            document.getElementById('rotacao').classList.add('rotacao');

            document.getElementById('navegacao').classList.remove('fecharMenu');
            document.getElementById('navegacao').classList.add('abrirMenu');
        }else{
            document.getElementById('rotacao').classList.remove('rotacao');
            document.getElementById('rotacao').classList.add('rotacaoInversa');

            document.getElementById('navegacao').classList.remove('abrirMenu');
            document.getElementById('navegacao').classList.add('fecharMenu');
        }
    })
}

///// REMOVER LISTAS DE ERROS AO ENVIAR COMPOS DO FORM VAZIOS //////
function removerErroVerificacao(){     
    let removerErro = document.querySelectorAll('.removerErro');
    let btnRemoverErro = document.querySelectorAll('.btnRemoverErro');

    for(let i = 0; i < btnRemoverErro.length; i++){
        btnRemoverErro[i].addEventListener('click', ()=>{
            removerErro[i].remove(removerErro[i])
        })
    }
}

////// FUNÇÃO PARA FECHAR FORMULÁRIO DE EXCLUIR UM ITEM ///////
function fecharFormularioExcluir(){
    document.getElementById('cancelar').addEventListener('click', ()=>{
        document.querySelector('.removerComentario').remove('section')
    })
}

////// FUNÇÃO PARA EXIBIR INPUT PARA EDITAR DADOS ////////
function abilitarInputEditar() {
    let btnEditar = document.querySelectorAll('.btnEditar');
    let textEditar = document.querySelectorAll('.textEditar');
    let inputEditar = document.querySelectorAll('.inputEditar');

    for(let i = 0; i < btnEditar.length; i++){
        btnEditar[i].addEventListener('click', ()=>{

            if(textEditar[i].hasAttribute('hidden')){
                textEditar[i].removeAttribute('hidden');
                inputEditar[i].hidden = true;
            }else{
                inputEditar[i].removeAttribute('hidden');
                textEditar[i].hidden = true;
            }

        })
    }
}

////// SALVAR COUTDOWN NO BANCO ////////
function salvarCoutdown() {
    document.getElementById('salvar').addEventListener('click', ()=>{
        let formData = new FormData();
        let opcao = document.getElementById('opcao').value;
        let marcaId = document.getElementById('marcaId').value;
        let data = document.getElementById('data').value;
        let time = document.getElementById('time').value;
        let texto = document.getElementById('texto').value;
        let token = document.querySelector('input[name="_token"').value
        let url = opcao == 'salvar' ? `/marca/${marcaId}/coutdown` : `/marca/${marcaId}/coutdown/editar`;
        let mensagem = opcao == 'salvar' ? 'Coutdown adicionado com sucesso!' : 'Coutdown atualizado com sucesso!'

        if((time == '') || (data == '') || (texto == '')){
            adicionarAlerta('Todos os campos devem ser preenchidos!', 'danger');
            return;
        }

        formData.append('data', data);
        formData.append('time', time);
        formData.append('texto', texto);
        formData.append('_token', token);

        fetch(url, {
            body: formData,
            method: 'POST'
        }).then(()=>{
            document.getElementById('mensagem').innerHTML = '';
            adicionarAlerta(mensagem, 'success');
        })

        function adicionarAlerta(texto, cor){
            document.getElementById('mensagem').innerHTML = '';

            let div = document.createElement('div');
                div.setAttribute('class', `alert alert-${cor}`);
                div.innerHTML = texto;
                document.getElementById('mensagem').appendChild(div);
        }
    });
}

////// FUNÇÃO PARA CHAMAR ABILITAR CONFIGURAÇÕES //////
function chamarFuncaoAbilitarConfig() {
    ///// ABILITAR CONFIGURAÇÕES PARA COUTDOWN /////
    document.getElementById('coutdown').addEventListener('click', ()=>{
        let coutdown = document.querySelector('.coutdown')
        
        abilitarConfig(coutdown);
    })

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
}

///// FUNÇÃO MOSTRAR/OCULTAR CONFIGURÇÕES /////
function abilitarConfig(elemento){

    if((elemento.classList.value == 'btn btn-warning modal-config')
        || (elemento.classList.value == 'coutdown mt-4')) {
        if(elemento.hasAttribute('hidden')){
            elemento.removeAttribute('hidden');
        }else{
            elemento.hidden = true;
        }
    }else{
        if(elemento.hasAttribute('hidden')){
            elemento.removeAttribute('hidden');
            elemento.classList.add('d-flex');
        }else{
            elemento.classList.remove('d-flex');
            elemento.hidden = true;
        }
    }
}

////// FUNÇÃO ALTERAR COR DA PÁGINA //////
function alterarCorPagina() {
    let corPrincipal = document.getElementById('corPrincipal').innerHTML;
    let corTitulo = document.getElementById('corTitulo').innerHTML;
    let corTexto = document.getElementById('corTexto').innerHTML;
    document.body.style.setProperty('--cor-principal', corPrincipal);
    document.body.style.setProperty('--cor-titulo', corTitulo);
    document.body.style.setProperty('--cor-texto', corTexto);
}

////// ADICIONAR ITEM DA LISTA DE DESCRIÇÃO //////
function adicionarItem() {
    let indice = 1;
        
    document.getElementById('adicionarItem').addEventListener('click', ()=>{
        document.getElementById('removerItem').classList.remove('disabled');

        let pai = document.getElementById('paiLista');
        let item = document.querySelectorAll('.item');
        let avisoItem = document.getElementById('avisoItem');

        if(item.length < 5){
            let input = document.createElement('input');
                input.setAttribute('name', `item_${indice}`);
                input.setAttribute('type', 'text');
                input.setAttribute('class', 'form-control mx-2 item');
                input.setAttribute('placeholder', `Digite o Item ${indice}`)
        
            let label = document.createElement('label');
                label.setAttribute('class', 'form-label m-0');
                label.setAttribute('for', `item_${indice}`)
                label.innerHTML = `item_${indice}`;
        
            let div = document.createElement('div');
                div.setAttribute('class', 'd-flex flex-row align-items-center mb-2 remover');
                div.appendChild(label);
                div.appendChild(input);
        
            pai.appendChild(div);
        }else if(item.length == 5){
            avisoItem.removeAttribute('hidden');
            document.getElementById('adicionarItem').classList.add('disabled');
        }
    
        indice++;
    })
}

////// REMOVER ITEM DA LISTA DE DESCRIÇÃO //////
function removerItem() {
    document.getElementById('removerItem').addEventListener('click', ()=>{
        document.getElementById('adicionarItem').classList.remove('disabled');
        let remover = document.querySelectorAll('.remover');
        let item = remover[remover.length - 1];
        avisoItem.hidden = true;
        item.remove();

        if(remover.length == 1){
            document.getElementById('removerItem').classList.add('disabled');
        }else{
            document.getElementById('removerItem').classList.remove('disabled');
        }
        indice--;
    });
}

/////// MASCARA PARA CNPJ /////////
function mascaraTelefone() {
    document.getElementById('cnpj').addEventListener('keyup', ()=>{
        let cnpj = removerCaracter(document.getElementById('cnpj').value);
        let mascara = `${cnpj.substr(0, 2)}.${cnpj.substr(2, 3)}.${cnpj.substr(5, 3)}/${cnpj.substr(8, 4)}-${cnpj.substr(12, 2)}`;

        document.getElementById('cnpj').value = mascara;
    });
}

/////// MASCAR PARA TELEFONE ///////
function mascaraCnpj() {
    document.getElementById('telefone').addEventListener('keyup', ()=>{
        let telefone = removerCaracter(document.getElementById('telefone').value);
        let mascara = `(${telefone.substr(0, 2)}) ${telefone.substr(2, 1)} ${telefone.substr(3, 4)}-${telefone.substr(7, 4)}`;

        document.getElementById('telefone').value = mascara;
    });
}

/////// FUNÇÃO PARA REMOVER CARACTERE ///////
function removerCaracter(telefone){
    let regex = /[^0-9]/gi;
    telefone = telefone.replace(regex, '');
    return telefone;
}

////// FUNÇÃO PARA EXECUTAR COUTDOWN //////
function coutdown(data, time) {
    let dataFinal = new Date();
        dataFinal = new Date(`${data} ${time}`).getTime();
    let dia = document.getElementById('dia');
    let hora = document.getElementById('hora');
    let minuto = document.getElementById('minuto');
    let segundo = document.getElementById('segundo');

    let coutdown = setInterval(()=>{
        let dataAtual = new Date().getTime();
        
        let regressiva = dataFinal - dataAtual;
        
        dia.innerHTML = formatarData(Math.floor(regressiva / (1000 * 60 * 60 * 24)));
        hora.innerHTML = formatarData(Math.floor((regressiva % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
        minuto.innerHTML = formatarData(Math.floor((regressiva % (1000 * 60 * 60)) / (1000 * 60)));
        segundo.innerHTML = formatarData(Math.floor((regressiva % (1000 * 60)) / 1000));

        if (regressiva < 0) {
            clearInterval(coutdown);
            dia.innerHTML = '00';
            hora.innerHTML = '00';
            minuto.innerHTML = '00';
            segundo.innerHTML = '00';
            document.getElementById('expira'). innerHTML = "EXPIRADO"
            document.getElementById('texto-desc').innerHTML = 'Promoção expirada!';
        }
    }, 1000);
}

/////// FUNÇÃO PRA FORMATAR A DATA CASO TENHA SÓ UM DIGÍTO ///////
function formatarData(data){
    if (data.toString().length == 1) {
        return `0${data}`
    }else{
        return data
    }
}

////// FECHAR MODAL //////
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

//////// ABRIR MODAL NO DESKTOP //////
function abrirModalDesk(){
    document.querySelector('.componente-modal').removeAttribute('hidden');
    document.querySelector('.componente-modal').classList.remove('fechar-modal');
    document.querySelector('.componente-modal').classList.add('abrir-modal');

    fecharModal();
}

////// ABRIR MODAL NO DESKTOP DEPOIS DE UM DETERMINADO TEMPO //////
function abrierModalDesckNovamente(){
    setTimeout(() => {
        document.querySelector('body').setAttribute('onmousemove', 'abrirModal(event)');
    }, 60000);

    fecharModal();
}

////// ABRIR MODAL NO MOBILE ///////
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

//////// CHAMAR FUNÇÃO PARA ABRIR MODAL NO DESKTOP //////
function abrirModal(event){
    let y = event.clientY;

    if (y < 20) {
        abrirModalDesk();
        document.querySelector('body').removeAttribute('onmousemove');

        abrierModalDesckNovamente();
    }
}

///// ADICIONAR ATRIBUTO ONMOUSEMOVE NO BODY ///////
function adicionarAttrOnmousemove(){
    setTimeout(() => {
        document.querySelector('body').setAttribute('onmousemove', 'abrirModal(event)');
    }, 3000);
}

///// ALTERAR ÍCONES ACIMA DOS PRODUTOS ///////
function alterarIcones(indice, mensagem, iconeMsg, back){
    let icone = document.querySelectorAll('.icone');
    let span = document.querySelectorAll('.span');
    let background = document.querySelectorAll('.detalhes-produto');

    span[indice].innerHTML = mensagem;
    icone[indice].innerHTML = iconeMsg;
    background[indice].classList.add(back);
}

////// EVITAR ABRIR POPUP AO CLICAR EM LINKS INTERNOS ///////
function naoAbrirPopupLinkInterno() {
    let comprarAgora = document.querySelectorAll('.comprarAgora');
    let body = document.body.getBoundingClientRect();
    let elemento = document.getElementById('compra-agora').getBoundingClientRect();
    let posicao = elemento.top - body.top;
 
    for(let i = 0; i < comprarAgora.length; i++){
        comprarAgora[i].addEventListener('click', (event)=>{
            event.preventDefault();

            window.scrollTo(0, posicao);
        })
    }
}