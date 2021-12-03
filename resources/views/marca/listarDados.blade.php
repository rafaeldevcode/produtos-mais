@extends('layouts/painel/layout')

@section('conteudo')
    
    <main class="container bg-white my-5 rounded p-3">

        <section>
            <div class="border-bottom border-success border-2 d-flex justify-content-between">
                <h2>Editar {{ $dados->nome_marca }}</h2>
                <a href="/marcas" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>
            <form action="/marca/{{ $marcaId }}/editar" method="POST">
                @csrf

                <ul class="list-group mt-5">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="nome_marca" type="text" value="{{ $dados->nome_marca }}">


                        <span class="textEditar"><b class="p-1 alert alert-primary me-2">Nome:</b>{{ $dados->nome_marca }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="slug_marca" type="text" value="{{ $dados->slug_marca }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Slug:</b>{{ $dados->slug_marca }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="logomarca" type="text" value="{{ $dados->logomarca }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Logo:</b>{{ $dados->logomarca }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="favicon" type="text" value="{{ $dados->favicon }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Favicon:</b>{{ $dados->favicon }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="cor_principal" type="text" value="{{ $dados->cor_principal }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Cor principal da página:</b>{{ $dados->cor_principal }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="banner_1" type="text" value="{{ $dados->banner_1 }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Banner 1:</b>{{ $dados->banner_1 }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="banner_2" type="text" value="{{ $dados->banner_2 }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Banner 2:</b>{{ $dados->banner_2 }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="banner_3" type="text" value="{{ $dados->banner_3 }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Banner 3:</b>{{ $dados->banner_3 }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="image_desc" type="text" value="{{ $dados->image_desc }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Imagen da descrição:</b>{{ $dados->image_desc }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <input hidden class="form-control w-25 inputEditar" name="titulo_desc" type="text" value="{{ $dados->titulo_desc }}">

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Título da descrição:</b>{{ $dados->titulo_desc }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <textarea hidden class="form-control w-75 inputEditar" name="tagmanager" type="text">{{ $dados->tagmanager }}</textarea>

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Tagmanager:</b>{{ $dados->tagmanager }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <textarea hidden class="form-control w-75 inputEditar" name="pixel_1" type="text">{{ $dados->pixel_1 }}</textarea>

                        <span class=" textEditar"><b class="p-1 alert alert-primary me-2">Pixel:</b>{{ $dados->pixel_1 }}</span>

                        <span>
                            <a class="btn btn-info btnEditar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </span>
                    </li>
                </ul>

                <div class="border-top border-success border-2 mt-5 d-flex flex-wrap justify-content-between">
                    <a href="/adicionar/marca" class="btn btn-primary mt-2 py-3 px-5 col-12 col-sm-3">
                        Nova Marca
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
    </script>

@endsection