require('./bootstrap');

let remover = document.querySelectorAll('.remover');

for(let i = 0; i < remover.length; i++){
    remover[i].addEventListener('click', ()=>{

        let i = document.createElement('i');
            i.setAttribute('class', 'fas fa-trash');

        let button = document.createElement('button');
            button.setAttribute('type', 'submit');
            button.setAttribute('class', 'btn btn-danger');
            button.innerHTML = 'Excluir';
            button.appendChild(i);
        
        let i_a = document.createElement('i');
            i_a.setAttribute('class', 'fas fa-ban');

        let a = document.createElement('a');
            a.setAttribute('id', 'cancelar');
            a.setAttribute('class', 'btn btn-primary');
            a.innerHTML = 'Cancelar';
            a.appendChild(i_a);

        let form = document.createElement('form');
            form.setAttribute('action', '/comentario/{{ $comentario->id }}/remover');
            form.setAttribute('method', 'POST');
            form.setAttribute('class', 'text-center');
            form.innerHTML = '@csrf';
            form.appendChild(button);
            form.appendChild(a);

        let p = document.createElement('p');
            p.setAttribute('class', 'fs-5 text-center lh-1 py-1');
            p.innerHTML = 'Certeza que deseja excluir o comentário de {{ $comentario->nome_cliente }}';

        let div = document.createElement('div');
            div.setAttribute('class', 'alert alert-danger col-12 col-sm-3');
            div.appendChild(form);
            div.appendChild(p);
        
        let section = document.createElement('section');
            section.setAttribute('class', 'w-100 h-100 d-flex justify-content-center align-items-center fixed-top removerComentario');
            section.setAttribute(div);

        cancelar();
    })
}

function cancelar(){
    document.getElementById('cancelar').addEventListener('click', ()=>{
        document.querySelector('.removerComentario').classList.remove('d-flex');
        document.querySelector('.removerComentario').classList.add('d-none');
    })
}






