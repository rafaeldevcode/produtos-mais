@extends('marca/layouts/painel/layout')

@section('conteudo')
    
    <main class="container my-5 pt-1 bg-white rounded">
        <section class="container p-0">
            <div class="border-bottom border-success border-2 mt-5 d-flex justify-content-between">
                <h2>Adicionar Marca</h2>
                <a title="Voltar" href="/marcas" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            @include('marca/layouts/componentes/errors', [$errors])
            <small class="fs-6 text-secondary">* Compos obrigatório</small>

            <form action="/adicionar/marca" method="POST" enctype="multipart/form-data" class="adiconar-marca border border-2 rounded p-3 my-3">
                @csrf

                <div class="border border-2 rounded p-3">
                    <h3>Informações Da Marca</h3>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5  mt-5">
                            <label for="nome_marca" class="form-label">Nome Da Marca <span class="fs-5 text-danger">*</span></label>
                            <input name="nome_marca" type="text" class="form-control" placeholder="Nome da Marca">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="slug_marca" class="form-label">Slug Da Marca <span class="fs-5 text-danger">*</span></label>
                            <input name="slug_marca" type="text" class="form-control" placeholder="Slug da Marca">
                            <span>Nao deve conter espaços ou acentos</span>
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="cor_principal" class="form-label">Digite a Cor Principal Da Página</label>
                            <input name="cor_principal" type="color" class="form-control" placeholder="Cor Principal Da Página">
                        </div>

                        <div class="col-12 col-md-5 mt-5">
                            <label for="cor_titulo" class="form-label">Digite a Cor dos Títulos do Rodapé</label>
                            <input name="cor_titulo" type="color" class="form-control" placeholder="dos Títulos do Rodapé">
                        </div>

                        <div class="col-12 col-md-5 mt-5">
                            <label for="cor_texto" class="form-label">Digite a Cor dos Textos do Rodapé</label>
                            <input name="cor_texto" type="color" class="form-control" placeholder="Cor dos Textos do Rodapé">
                        </div>

                        <div class="col-12 col-md-5 mt-5">
                            <label for="cnpj" class="form-label">Digite o CNPJ</label>
                            <input name="cnpj" type="text" class="form-control" placeholder="CNPJ">
                        </div>

                        <div class="col-12 col-md-5 mt-5">
                            <label for="cidade" class="form-label">Digite o endereço</label>
                            <input name="cidade" type="text" class="form-control" placeholder="Nome da cidade/Estado CEP">
                        </div>

                        <div class="col-12 col-md-5 mt-5">
                            <label for="rua" class="form-label">Digite a rua</label>
                            <input name="rua" type="text" class="form-control" placeholder="Nome da rua, número - Bairro">
                        </div>

                        <div class="col-12 mt-5">
                            <label for="disclaimer" class="form-label">Disclaimer</label>
                            <textarea name="disclaimer" class="form-control" placeholder="Disclaimer"></textarea>
                        </div>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Contato e Mídias sociais</h3>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5 mt-5">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input name="telefone" type="tel" class="form-control" placeholder="Digite o telefone de contato">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="email" class="form-label">E-mail</label>
                            <input name="email" type="email" class="form-control" placeholder="Digite o e-mail">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input name="facebook" type="url" class="form-control" placeholder="Facebook">
                            <span>Ex: https://facebook.com</span>
                        </div>

                        <div class="col-12 col-md-5 mt-5">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input name="instagram" class="form-control" type="url" placeholder="Instagram">
                            <span>Ex: https://instagram.com</span>
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="twitter" class="form-label">Twitter</label>
                            <input name="twitter" class="form-control" type="url" placeholder="Twitter">
                            <span>Ex: https://twitter.com</span>
                        </div>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Banners e Imagens</h3>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5 mt-5">
                            <label for="banner_1" class="form-label">Banner 1 <span class="fs-5 text-danger">*</span></label>
                            <input name="banner_1" type="file" class="form-control">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="banner_2" class="form-label">Banner 2 <span class="fs-5 text-danger">*</span></label>
                            <input name="banner_2" type="file" class="form-control">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="banner_3" class="form-label">Banner 3 <span class="fs-5 text-danger">*</span></label>
                            <input name="banner_3" type="file" class="form-control">
                        </div>

                        <div class="col-12 col-md-5 mt-5">
                            <label for="logomarca" class="form-label">Imagem do logo</label>
                            <input name="logomarca" class="form-control" type="file">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="favicon" class="form-label">Favicon Da Marca</label>
                            <input name="favicon" class="form-control" type="file">
                        </div>

                        <div class="col-12 col-md-5 mt-5">
                            <label for="image_desc" class="form-label">Imagen da Descrição <span class="fs-5 text-danger">*</span></label>
                            <input name="image_desc" class="form-control" type="file">
                        </div>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Descrição</h3>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5 mt-5">
                            <label for="titulo_desc" class="form-label">Título da descrição <span class="fs-5 text-danger">*</span></label>
                            <input name="titulo_desc" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5 mt-5">
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Adicionar Itens da lista</h6>

                                <span>
                                    <a title="Remover Item" class="btn btn-danger disabled" id="removerItem">
                                        <i class="fas fa-minus fs-6"></i>
                                    </a>

                                    <a title="Adicionar Item" class="btn btn-primary" id="adicionarItem">
                                        <i class="fas fa-plus fs-6"></i>
                                    </a>
                                </span>
                            </div>


                            <div id="paiLista">
                                <div hidden class="alert alert-danger" id="avisoItem">
                                    Você pode adicionar no máximo 5 itens!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Tagmanager | Pixel</h3>

                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-end mt-5">
                        <div class="col-12 col-md-5">
                            <label for="tagmanager" class="form-label">Tagmanager</label>
                            <input name="tagmanager" type="text" class="form-control" placeholder="Tagmanager">
                        </div>
                    </div>

                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-end mt-5">
                        <div class="col-12 col-md-5">
                            <label for="pixel" class="form-label">Pixel</label>
                            <textarea name="pixel" type="text" class="form-control" placeholder="0123456789,0123456789..."></textarea>
                            <span>Se for mais de 1 pixel separar por ',' sem espaços!</span>
                        </div>

                        <div class="col-12 col-md-5 mt-5 mt-md-0">
                            <label for="evento" class="form-label">Marcar evento</label>
                            <input name="evento" type="text" class="form-control" placeholder="Marcar evento">
                            <span>Ex: Lead | PageView | BannerView...</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button title="Salvar" type="submit" class="btn btn-success mt-3 py-3 px-5 col-sm-3 col-12">
                        Salvar
                        <i class="fas fa-save ms-2"></i>
                    </button>
                </div>

            </form>
        </section>
    </main>

    <script type="text/javascript">

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

        ///// REMOVER LISTAS DE ERROS AO ENVIAR COMPOS DO FORM VAZIOS //////
        let removerErro = document.querySelectorAll('.removerErro');
        let btnRemoverErro = document.querySelectorAll('.btnRemoverErro');

        for(let i = 0; i < btnRemoverErro.length; i++){
            btnRemoverErro[i].addEventListener('click', ()=>{
                removerErro[i].remove(removerErro[i])
            })
        }
    </script>

@endsection