@extends('layouts/painel/layout')

@section('conteudo')
    
    <main class="container my-5 pt-1 bg-white rounded">
        <section class="container p-0">
            <div class="border-bottom border-success border-2 mt-5 d-flex justify-content-between">
                <h2>Adicionar Marca</h2>
                <a href="/marcas" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            <form action="/adicionar/marca" method="POST" class="adiconar-marca border border-2 rounded p-3 my-3">
                @csrf

                <div class="border border-2 rounded p-3">
                    <h3>Informações Principais</h3>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5  mt-5">
                            <label for="nome_marca" class="form-label">Nome Da Marca</label>
                            <input name="nome_marca" type="text" class="form-control" placeholder="Nome da Marca">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="slug_marca" class="form-label">Slug Da Marca</label>
                            <input name="slug_marca" type="text" class="form-control" placeholder="Slug da Marca">
                            <span>Nao deve conter espaços ou acentos</span>
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="cor_principal" class="form-label">Digite a Cor Principal Da Página</label>
                            <input name="cor_principal" type="text" class="form-control" placeholder="Cor Principal Da Página">
                            <span>Em exadecimal - EX: #FFFFFF</span>
                        </div>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Banners e Imagens</h3>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5 mt-5">
                            <label for="banner_1" class="form-label">Banner 1</label>
                            <input name="banner_1" type="text" class="form-control">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="banner_2" class="form-label">Banner 2</label>
                            <input name="banner_2" type="text" class="form-control">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="banner_3" class="form-label">Banner 3</label>
                            <input name="banner_3" type="text" class="form-control">
                        </div>

                        <div class="col-12 col-md-5 mt-5">
                            <label for="logomarca" class="form-label">Imagem do logo</label>
                            <input name="logomarca" class="form-control" type="text">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="favicon" class="form-label">Favicon Da Marca</label>
                            <input name="favicon" class="form-control" type="text">
                        </div>

                        <div class="col-12 col-md-5 mt-5">
                            <label for="image_desc" class="form-label">Imagen da Descrição</label>
                            <input name="image_desc" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Descrição</h3>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5 mt-5">
                            <label for="titulo_desc" class="form-label">Título da descrição</label>
                            <input name="titulo_desc" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5 mt-5">
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Adicionar Itens da lista</h6>
                                <a class="btn btn-primary" id="adicionarItem">
                                    <i class="fas fa-plus fs-6"></i>
                                </a>
                            </div>


                            <div id="paiLista"></div>
                        </div>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Tagmanager | Pixel</h3>

                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-end mt-5">
                        <div class="col-12 col-sm-8">
                            <label for="tagmanager" class="form-label">Tagmanager</label>
                            <input disabled name="tagmanager" type="text" class="form-control disabled" placeholder="Digite o Tagmanager">
                        </div>

                        <a class="btn btn-primary col-12 col-sm-3 mt-2 mt-sm-0" id="abilitar">
                            Abilitar Tagmanager
                            <i class="fas fa-circle"></i>
                        </a>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5 mt-5">
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Adicionar Pixel</h6>
                                <a class="btn btn-primary" id="adicionarPixel">
                                    <i class="fas fa-plus fs-6"></i>
                                </a>
                            </div>


                            <div id="paiPixel"></div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mt-3 py-3 px-5 col-sm-3 col-12">
                        Salvar
                        <i class="fas fa-save ms-2"></i>
                    </button>
                </div>

            </form>
        </section>
    </main>

    <script>

        let indice = 1;
        let indice_2 = 1;
        
        document.getElementById('adicionarItem').addEventListener('click', ()=>{
            let pai = document.getElementById('paiLista');
        
            let i = document.createElement('i');
                i.setAttribute('class', 'fas fa-minus fs-6'); 
        
            let a = document.createElement('a');
                a.setAttribute('class', 'btn btn-danger remover');
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
                div.setAttribute('class', 'd-flex flex-row align-items-center mb-2 filho');
                div.appendChild(label);
                div.appendChild(input);
                div.appendChild(a);
        
            pai.appendChild(div);
        
            indice++;
        
            removerInput();
        })
        
        document.getElementById('adicionarPixel').addEventListener('click', ()=>{
            let pai = document.getElementById('paiPixel');
        
            let i = document.createElement('i');
                i.setAttribute('class', 'fas fa-minus fs-6'); 
        
            let a = document.createElement('a');
                a.setAttribute('class', 'btn btn-danger remover');
                a.appendChild(i);
        
            let input = document.createElement('input');
                input.setAttribute('name', `pixel_${indice_2}`);
                input.setAttribute('type', 'number');
                input.setAttribute('class', 'form-control mx-2');
                input.setAttribute('placeholder', `Digite o Pixel ${indice_2}`)
        
            let label = document.createElement('label');
                label.setAttribute('class', 'form-label m-0');
                label.setAttribute('for', `pixel_${indice_2}`)
                label.innerHTML = `pixel_${indice_2}`;
        
            let div = document.createElement('div');
                div.setAttribute('class', 'd-flex flex-row align-items-center mb-2 filho');
                div.appendChild(label);
                div.appendChild(input);
                div.appendChild(a);
        
            pai.appendChild(div);
        
            indice_2++;
        
            removerInput();
        })
        
        function  removerInput(){
            let remover = document.querySelectorAll('.remover');
            let filho = document.querySelectorAll('.filho');
        
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

    </script>

@endsection