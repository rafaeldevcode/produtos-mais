require('./bootstrap');


let indice = 1;
        
document.getElementById('adicionarItem').addEventListener('click', ()=>{
    let pai = document.getElementById('paiLista');

    let i = document.createElement('i');
        i.setAttribute('class', 'fas fa-minus fs-6'); 

    let a = document.createElement('a');
        a.setAttribute('class', 'btn btn-danger removerItem');
        a.appendChild(i);

    let input = document.createElement('input');
        input.setAttribute('name', `item_${indice}`);
        input.setAttribute('type', 'number');
        input.setAttribute('class', 'form-control mx-2');
        input.setAttribute('placeholder', `Digite o Item ${indice}`)

    let label = document.createElement('label');
        label.setAttribute('class', 'form-label m-0');
        label.setAttribute('for', `item_${indice}`)
        label.innerHTML = `item_${indice}`;

    let div = document.createElement('div');
        div.setAttribute('class', 'd-flex flex-row align-items-center mb-2 filhoLista');
        div.appendChild(label);
        div.appendChild(input);
        div.appendChild(a);

    pai.appendChild(div);

    indice++;

    removerPixel();
})

function  removerPixel(){
    let remover = document.querySelectorAll('.removerItem');
    let filho = document.querySelectorAll('.filhoLista');

    for(let i = 0; i < remover.length; i++){
        remover[i].addEventListener('click', ()=>{
            filho[i].remove(filho[i]);
        })
    }
}


document.getElementById('abilitar').addEventListener('click', ()=>{

    let tagmanager = document.querySelector('.disabled');
    let abilitar = document.getElementById('abilitar');

    if(tagmanager.disabled){
        tagmanager.removeAttribute('disabled');
        abilitar.innerHTML = 'Desabilitar Tagmanager <i class="fas fa-ban"></i>'
    }else{
        tagmanager.disabled = true;
        abilitar.innerHTML = 'Abilitar Tagmanager <i class="fas fa-circle"></i>'
    }

})


