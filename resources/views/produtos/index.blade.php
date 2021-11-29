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
                    <i class="fas fa-shield-alt me-2 fs-1"></i>
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
            <div class="container d-flex flex-wrap justify-content-sm-between justify-content-evenly">
                <div>
                    <img src="https://www.siteblindado.com/images/logo-site-blindado.svg" alt="titulos">
                </div>

                <div>
                    <img src="https://www.siteblindado.com/images/logo-site-blindado.svg" alt="titulos">
                </div>

                <div>
                    <img src="https://www.siteblindado.com/images/logo-site-blindado.svg" alt="titulos">
                </div>

                <div>
                    <img src="https://www.siteblindado.com/images/logo-site-blindado.svg" alt="titulos">
                </div>
            </div>

            <div class="col-md-9 col-12 py-3 px-5 my-5 mx-auto border border-2">
                <p class="text-center m-0">Este produto não se destina a diagnosticar, tratar, curar ou prevenir qualquer doença. As opiniões e conselhos nutricionais expressos pela Nullius Health não se destinam ao objetivo de fornecer aconselhamento médico. Por favor, sempre consulte seu médico se estiver tomando algum medicamento ou tiver algum problema de saúde. Os resultados individuais podem variar.​</p>
            </div>
        </section>
    </main>   
@endsection