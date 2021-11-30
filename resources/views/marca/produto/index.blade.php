@extends('layouts/layout')

@section('conteudo')
    <main class="my-5">
        <section class="container-fluid mb-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active d-flex justify-content-center">
                    <img src="https://sf.nullius.com.br/wp-content/uploads/2021/08/Move360-6.png" class="d-block img-fluid" alt="...">
                  </div>
                  <div class="carousel-item d-flex justify-content-center">
                    <img src="https://sf.nullius.com.br/wp-content/uploads/2021/08/Move360-3.png" class="d-block img-fluid" alt="...">
                  </div>
                  <div class="carousel-item d-flex justify-content-center">
                    <img src="https://sf.nullius.com.br/wp-content/uploads/2021/08/Move360.png" class="d-block img-fluid" alt="...">
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

        <section class="container d-flex justify-content-evenly flex-wrap">
            <div class="card shadow d-flex border-0 mb-2">
                <div class="card-header text-center border-0 p-0 m-0 bg-white">
                    <h2 class="bg-secondary m-0 p-2 fs-4">6 unidade</h2>
                    <p class="my-2 fs-6">Cada unidade sai por <b>R$97,93</b></p>
                </div>

                <div class="card-body text-center">
                    <div>
                        <img class="img-fluid" src="https://sf.nullius.com.br/wp-content/uploads/2021/08/Move360-6.png" alt="Produto 1">
                    </div>

                    <ul class="list-group mt-4">
                        <li class="list-group-item border-0 p-0">à vista R$000,00</li>
                        <li class="list-group-item border-0 p-0 fw-bolder fs-3">12x R$00,00</li>
                    </ul>

                    <div class="row px-3 pt-3">
                        <a href="#" class="btn btn-light btn-outline-secondary">
                            <i class="fas fa-arrow-circle-right"></i>
                            Comprar Agora
                        </a>
                    </div>
                </div>
            </div>

            <div class="card shadow d-flex border-0 mb-2">
                <div class="card-header text-center border-0 p-0 m-0 bg-white">
                    <h2 class="bg-secondary m-0 p-2 fs-4">3 unidade</h2>
                    <p class="my-2 fs-6">Cada unidade sai por <b>R$97,93</b></p>
                </div>

                <div class="card-body text-center">
                    <div>
                        <img class="img-fluid" src="https://sf.nullius.com.br/wp-content/uploads/2021/08/Move360-3.png" alt="Produto 1">
                    </div>

                    <ul class="list-group mt-4">
                        <li class="list-group-item border-0 p-0">à vista R$000,00</li>
                        <li class="list-group-item border-0 p-0 fw-bolder fs-3">12x R$00,00</li>
                    </ul>

                    <div class="row px-3 pt-3">
                        <a href="#" class="btn btn-light btn-outline-secondary">
                            <i class="fas fa-arrow-circle-right"></i>
                            Comprar Agora
                        </a>
                    </div>
                </div>
            </div>

            <div class="card shadow d-flex border-0 mb-2">
                <div class="card-header text-center border-0 p-0 m-0 bg-white">
                    <h2 class="bg-secondary m-0 p-2 fs-4">1 unidade</h2>
                    <p class="my-2 fs-6">Cada unidade sai por <b>R$97,93</b></p>
                </div>

                <div class="card-body text-center">
                    <div>
                        <img class="img-fluid" src="https://sf.nullius.com.br/wp-content/uploads/2021/08/Move360.png" alt="Produto 1">
                    </div>

                    <ul class="list-group mt-4">
                        <li class="list-group-item border-0 p-0">à vista R$000,00</li>
                        <li class="list-group-item border-0 p-0 fw-bolder fs-3">12x R$00,00</li>
                    </ul>

                    <div class="row px-3 pt-3">
                        <a href="#" class="btn btn-light btn-outline-secondary">
                            <i class="fas fa-arrow-circle-right"></i>
                            Comprar Agora
                        </a>
                    </div>
                </div>
            </div>
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
                    <i class="fas fa-shield-alt me-2 fs-1"></i>
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
                    <i class="fas fa-shield-alt me-2 fs-1"></i>
                    <span>GARANTIA <br>
                        <b>TOTAL</b>
                    </span>
                </li>
            </ul>
        </section>

        <section class="container py-5 mt-5">
            <div class="descricao-produto d-flex flex-wrap justify-content-between align-items-center">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <h2 class="display-6 lh-1">Mantenha suas articulações mais saudáveis e flexíveis, sem dor e inchaço.</h2>
    
                    <ul class="list-group">
                        <li class="list-group-item border-0">
                            <i class="fas fa-check-circle"></i>
                            <span class="fs-5">Estimule articulações e cartilagens saudáveis</span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check-circle"></i>
                            <span class="fs-5">Sinta-se mais jovem e disposto</span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check-circle"></i>
                            <span class="fs-5">Ajudar a reparar as articulações e cartilagem</span>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check-circle"></i>
                            <span class="fs-5 fs-md-6">Apoio a flexibilidade e mobilidade articulares saudáveis</span>
                        </li>
                    </ul>
                </div>

                <div class="container-fluid col-xl-6 col-md-6 col-sm-12">
                    <img class="img-fluid" src="{{ asset('images/produto.png') }}" alt="Produto">
                </div>
            </div>

            <div class="text-center mt-3 d-flex justify-content-center">
                <a href="#" class="btn btn-light btn-outline-secondary py-3 px-5">
                    <i class="fas fa-arrow-circle-right"></i>
                    Comprar Agora
                </a>
            </div>
        </section>

        <section class="container-fluid bg-white py-5">
            <h2 class="display-5 py-5 text-center">Quem já experimentou</h2>
            <div class="d-flex flex-wrap justify-content-evenly">
                <div class="card shadow d-flex border-0 mb-2">
                    <div class="card-header text-center border-0 p-0 m-0 bg-white lh-1">
                        <img src="https://sf.nullius.com.br/wp-content/uploads/2021/04/id_p-move2.jpg" alt="Comentario">
                        <p class="my-2 fs-6 fw-bolder">Carlos Pegorato</p>
                        <span class="fw-bolder">51 Anos</span>
                    </div>
    
                    <div class="card-body text-center">
                        <p>“Após a primeira semana, meus dedos dos pés não estavam mais doloridos Meus ombros não doem e meus braços não “dormem” durante a noite. Meu corpo se sente bem.”</p>
                    </div>
                </div>
    
                <div class="card shadow d-flex border-0 mb-2">
                    <div class="card-header text-center border-0 p-0 m-0 bg-white lh-1">
                        <img src="https://sf.nullius.com.br/wp-content/uploads/2021/04/id_p-move2.jpg" alt="Comentario">
                        <p class="my-2 fs-6 fw-bolder">Carlos Pegorato</p>
                        <span class="fw-bolder">51 Anos</span>
                    </div>
    
                    <div class="card-body text-center">
                        <p>“Após a primeira semana, meus dedos dos pés não estavam mais doloridos Meus ombros não doem e meus braços não “dormem” durante a noite. Meu corpo se sente bem.”</p>
                    </div>
                </div>
    
                <div class="card shadow d-flex border-0 mb-2">
                    <div class="card-header text-center border-0 p-0 m-0 bg-white lh-1">
                        <img src="https://sf.nullius.com.br/wp-content/uploads/2021/04/id_p-move2.jpg" alt="Comentario">
                        <p class="my-2 fs-6 fw-bolder">Carlos Pegorato</p>
                        <span class="fw-bolder">51 Anos</span>
                    </div>
    
                    <div class="card-body text-center">
                        <p>“Após a primeira semana, meus dedos dos pés não estavam mais doloridos Meus ombros não doem e meus braços não “dormem” durante a noite. Meu corpo se sente bem.”</p>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="#" class="btn btn-secondary mt-5 py-3 px-5">Carregar mais comentários</a>
            </div>
        </section>

        <section class="container-fluid bg-white py-3 mt-1">
            <div class="container d-flex flex-wrap justify-content-sm-between justify-content-evenly align-items-center">
                <div>
                    <img src="https://sf.nullius.com.br/wp-content/uploads/2020/07/icon_ft_1.jpg" alt="titulos">
                </div>

                <div>
                    <img src="data:image/png;base64,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" alt="titulos">
                </div>

                <div>
                    <img src="https://www.siteblindado.com/images/logo-site-blindado.svg" alt="titulos">
                </div>

                <div>
                    <img src="https://sf.nullius.com.br/wp-content/uploads/2020/11/pay-icon_a.jpg" alt="titulos">
                </div>
            </div>

            <div class="col-md-9 col-12 py-3 px-5 my-5 mx-auto border border-2">
                <p class="text-center m-0">Este produto não se destina a diagnosticar, tratar, curar ou prevenir qualquer doença. As opiniões e conselhos nutricionais expressos pela Nullius Health não se destinam ao objetivo de fornecer aconselhamento médico. Por favor, sempre consulte seu médico se estiver tomando algum medicamento ou tiver algum problema de saúde. Os resultados individuais podem variar.​</p>
            </div>
        </section>
    </main>   
@endsection