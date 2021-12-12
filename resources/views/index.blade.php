@extends('marca/layouts/layout')

@section('conteudo')
    <main class="my-5">
        <section class="container mb-5 pb-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset("images/$marca->banner_1") }}" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset("images/$marca->banner_2") }}" class="d-block w-100" alt="Banner 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset("images/$marca->banner_3") }}" class="d-block w-100" alt="Banner 3">
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <section class="container d-flex justify-content-evenly flex-wrap" id="compra-agora">
            @foreach ($produtos as $produto)
                @if ($produto->exibir_produto == 'on')
                    <div class="card shadow d-flex border-0 mb-2">
                        <div class="card-header text-center border-0 p-0 m-0 bg-white">
                            <div class="bg-principal m-0 p-2 fs-4">
                                <h2 class="fs-4">{{ $produto->quant_produto }} UNIDADES</h2>
                                @if ($config[0]->icone_produto == 'on')
                                    <div class="detalhes-produto bg-secondary px-2 rounded-top">
                                        <span class="fs-6">Frete para todo Brasil</span>
                                        <i class="fas fa-truck-moving"></i>
                                    </div>
                                @endif
                            </div>
                            <p class="my-2 fs-6">Cada unidade sai por <b class="texto-cor-principal">R${{ $produto->valor_unit }}</b></p>
                        </div>

                        <div class="card-body text-center">
                            <div>
                                <img class="img-fluid" src="{{ asset("images/$produto->image_produto") }}" alt="{{ $produto->nome_produto }}">
                            </div>

                            <ul class="list-group mt-4">
                                <li class="list-group-item border-0 p-0">à vista R${{ $produto->valor_cheio }}</li>
                                <li class="list-group-item border-0 p-0 fw-bolder fs-3 texto-cor-principal">{{ $produto->parcelas }}x R${{ $produto->valor_parcelado }}</li>
                            </ul>

                            <div class="row px-3 pt-3">
                                <a href="{{ $produto->link_compra }}" class="btn btn-comprar">
                                    <i class="fas fa-arrow-circle-right"></i>
                                    Comprar Agora
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </section>

        <section class="container-fluid bg-white py-3 mt-5">
            <ul class="lista-detalhes list-group d-flex flex-column flex-sm-row justify-content-evenly">
                <li class="list-group-item border-0 d-flex flex-column flex-sm-row align-items-center">
                    <i class="fas fa-shield-alt me-2 fs-1"></i>
                    <span>COMPRA <br>
                        <b>100% SEGURA</b>
                    </span>
                </li>
                <li class="list-group-item border-0 d-flex flex-column flex-sm-row align-items-center">
                    <i class="fas fa-registered me-2 fs-1"></i>
                    <span>PRODUTO <br>
                        <b>RECOMENDADO</b>
                    </span>
                </li>
                <li class="list-group-item border-0 d-flex flex-column flex-sm-row align-items-center">
                    <i class="fas fa-check-square me-2 fs-1"></i>
                    <span>PRODUTO <br>
                        <b>AUTORIZADO</b>
                    </span>
                </li>
                <li class="list-group-item border-0 d-flex flex-column flex-sm-row align-items-center">
                    <i class="fas fa-award me-2 fs-1"></i>
                    <span>GARANTIA <br>
                        <b>TOTAL</b>
                    </span>
                </li>
            </ul>
        </section>

        <section class="container py-5 mt-5">
            <div class="descricao-produto d-flex flex-wrap justify-content-between align-items-center">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <h2 class="display-6 lh-1">{{ $marca->titulo_desc }}</h2>
    
                    <ul class="list-group">
                        @if (!empty($marca->item_1))
                            <li class="list-group-item border-0">
                                <i class="fas fa-check-circle"></i>
                                <span class="fs-5">{{ $marca->item_1 }}</span>
                            </li>
                        @endif

                        @if (!empty($marca->item_2))
                            <li class="list-group-item border-0">
                                <i class="fas fa-check-circle"></i>
                                <span class="fs-5">{{ $marca->item_2 }}</span>
                            </li>
                        @endif

                        @if (!empty($marca->item_3))
                            <li class="list-group-item border-0">
                                <i class="fas fa-check-circle"></i>
                                <span class="fs-5">{{ $marca->item_3 }}</span>
                            </li>
                        @endif

                        @if (!empty($marca->item_4))
                            <li class="list-group-item border-0">
                                <i class="fas fa-check-circle"></i>
                                <span class="fs-5">{{ $marca->item_4 }}</span>
                            </li>
                        @endif

                        @if (!empty($marca->item_5))
                            <li class="list-group-item border-0">
                                <i class="fas fa-check-circle"></i>
                                <span class="fs-5">{{ $marca->item_5 }}</span>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="container-fluid col-xl-6 col-md-6 col-sm-12">
                    <img class="img-fluid" src="{{ asset("images/$marca->image_desc") }}" alt="Produto {{ $marca->nome_marca }}">
                </div>
            </div>

            <div class="text-center mt-3 d-flex justify-content-center">
                <a href="#compra-agora" class="btn btn-light btn-outline-secondary py-3 px-5 btn-principal">
                    <i class="fas fa-arrow-circle-right"></i>
                    Comprar Agora
                </a>
            </div>
        </section>

        <section class="container-fluid bg-white py-5">
            <h2 class="display-5 py-5 text-center">Quem já experimentou</h2>
            <div class="d-flex flex-wrap justify-content-evenly">

                @foreach ($comentarios as $comentario)
                    <div class="card shadow d-flex border-0 mb-2 pt-3">
                        <div class="comentario card-header text-center border-0 p-0 m-0 bg-white lh-1">
                            <img src="{{ asset("images/$comentario->image_cliente") }}" alt="{{ $comentario->nome_cliente }}">
                            <p class="my-2 fs-6 fw-bolder">{{ $comentario->nome_cliente }}</p>
                            <span class="fw-bolder">{{ $comentario->coment_desc }}</span>
                        </div>
        
                        <div class="card-body text-center">
                            <p>{{ $comentario->comentario }}</p>
                        </div>
                    </div>
                @endforeach
    
            </div>

            <div class="text-center">
                <a href="#" class="btn mt-5 py-3 px-5 btn-comentarios">Carregar mais comentários</a>
            </div>
        </section>

        <section class="container-fluid bg-white py-3 mt-1">
            <div class="container d-flex flex-wrap justify-content-sm-between justify-content-evenly align-items-center">
                <div class="image-list">
                    <img src="{{ asset('images/reclame-aqui.png') }}" alt="Ótimo Reclame Aqui'">
                </div>

                <div class="image-list">
                    <img src="{{ asset('images/compra-segura.webp') }}" alt="Compra Segura">
                </div>

                <div class="image-list">
                    <img src="{{ asset('images/site-blindado.png') }}" alt="Site Blindados">
                </div>

                <div class="image-list">
                    <img src="{{ asset('images/formas-pag.png') }}" alt="Formas de Pagamentos">
                </div>
            </div>

            <div class="col-md-9 col-12 py-3 px-5 my-5 mx-auto border border-2">
                <p class="text-center m-0">Este produto não se destina a diagnosticar, tratar, curar ou prevenir qualquer doença. As opiniões e conselhos nutricionais expressos pela Nullius Health não se destinam ao objetivo de fornecer aconselhamento médico. Por favor, sempre consulte seu médico se estiver tomando algum medicamento ou tiver algum problema de saúde. Os resultados individuais podem variar.​</p>
            </div>
        </section>
    </main>   
@endsection