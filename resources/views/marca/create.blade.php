@extends('layouts/painel/layout')

@section('conteudo')
    
    <main class="container my-5 pt-3 bg-white rounded">
        <section class="container px-2">
            <div class="border-bottom border-success border-2 mt-5 d-flex justify-content-between">
                <h2>Adicionar Marca</h2>
                <a href="/painel/admin" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>

            <form action="/adicionar/marca" method="POST" class="adiconar-marca border border-2 rounded p-3 my-3">
                @csrf

                <div class="d-flex flex-wrap justify-content-between">
                    <div class="col-12 col-md-5">
                        <label for="nome_marca" class="form-label">Nome Da Marca</label>
                        <input id="nome_marca" name="nome_marca" type="text" class="form-control" placeholder="Nome da Marca">
                    </div>

                    <div class="col-12 col-md-5 mt-5 mt-md-0">
                        <label for="slug_marca" class="form-label">Slug Da Marca</label>
                        <input id="slug_marca" name="slug_marca" type="text" class="form-control" placeholder="Slug da Marca">
                        <span>Nao deve conter espaços ou acentos</span>
                    </div>

                    <div class="col-12 col-md-5 mt-5">
                        <label for="logomarca" class="form-label">Imagem do logo</label>
                        <input id="logomarca" name="logomarca" type="text" class="form-control"">
                    </div>

                    <div class="col-12 col-md-5 mt-5">
                        <label for="favicon" class="form-label">Favicon Da Marca</label>
                        <input id="favicon" name="favicon" type="text" class="form-control">
                    </div>

                    <div class="col-12 col-md-5 mt-5">
                        <label for="cor_principal" class="form-label">Digite a Cor Principal Da Página</label>
                        <input id="cor_principal" name="cor_principal" type="text" class="form-control" placeholder="Cor Principal Da Página">
                        <span>Em exadecimal - EX: #FFFFFF</span>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Banners</h3>

                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5 mt-5">
                            <label for="banner_1" class="form-label">Banner 1</label>
                            <input id="banner_1" name="banner_1" type="text" class="form-control" placeholder="Valor Unitário">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="banner_2" class="form-label">Banner 2</label>
                            <input id="banner_2" name="banner_2" type="text" class="form-control" placeholder="Valor Cheio">
                        </div>
    
                        <div class="col-12 col-md-5 mt-5">
                            <label for="banner_3" class="form-label">Banner 3</label>
                            <input id="banner_3" name="banner_3" type="text" class="form-control" placeholder="Valor Parcelado">
                        </div>
                    </div>
                </div>

                <div class="border border-2 rounded p-3 mt-5">
                    <h3>Tagmanager | Pixel</h3>

                    <div class="mt-5">
                        <label for="tagmanager">Tagmanager</label>
                        <textarea name="tagmanager" id="tagmanager" class="form-control" placeholder="agmanager Aqui"></textarea>
                    </div>

                    <div class="mt-5">
                        <label for="pixel">Pixel</label>
                        <textarea name="pixel" id="pixel" class="form-control" placeholder="Pixel Aqui"></textarea>
                    </div>

                    {{-- <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-md-5 mt-5">
                            <label for="tagmanager" class="form-label">Tagmanager</label>
                            <input id="tagmanager" name="tagmanager" type="text" class="form-control" placeholder="Digite o Tagmanager">
                        </div>

                        <div class="col-12 col-md-5 mt-5">
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Adicionar Pixel</h6>
                                <a class="btn btn-primary" id="adicionar">
                                    <i class="fas fa-plus fs-6"></i>
                                </a>
                            </div>


                            <div id="pai"></div>
                        </div>
                    </div> --}}
                </div>

                <div>
                    <button type="submit" class="btn btn-success mt-3 py-3 px-5">
                        Adicionar
                        <i class="fas fa-plus-circle ms-2"></i>
                    </button>
                </div>

            </form>
        </section>
    </main>

    {{-- <script>

        let indice = 1;
        
        document.getElementById('adicionar').addEventListener('click', ()=>{
            let pai = document.getElementById('pai');

            let i = document.createElement('i');
                i.setAttribute('class', 'fas fa-minus fs-6'); 

            let a = document.createElement('a');
                a.setAttribute('class', 'btn btn-danger remover');
                a.appendChild(i);

            let input = document.createElement('input');
                input.setAttribute('id', `pixel-${indice}`);
                input.setAttribute('name', `pixel_${indice}`);
                input.setAttribute('type', 'number');
                input.setAttribute('class', 'form-control mx-2');
                input.setAttribute('placeholder', 'Digite o Pixel')

            let label = document.createElement('label');
                label.setAttribute('class', 'form-label m-0');
                label.setAttribute('for', `pixel_${indice}`)
                label.innerHTML = `pixel_${indice}`;

            let div = document.createElement('div');
                div.setAttribute('class', 'd-flex flex-row align-items-center mb-2 filho');
                div.appendChild(label);
                div.appendChild(input);
                div.appendChild(a);

            pai.appendChild(div);

            indice++;

            removerPixel();
        })

        function  removerPixel(){
            let remover = document.querySelectorAll('.remover');
            let filho = document.querySelectorAll('.filho');

            for(let i = 0; i < remover.length; i++){
                remover[i].addEventListener('click', ()=>{
                    filho[i].remove(filho[i]);
                })
            }
        }
        
    </script> --}}

@endsection