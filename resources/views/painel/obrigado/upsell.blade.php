<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- ///////// BOOTSTRAP ///////// --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- ///////// FONTAWESOME ///////// --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/upsell/style.css')}}">

    @if (!empty($marca->favicon))
        <link rel="shortcut icon" href="{{ asset("storage/$marca->favicon") }}" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="{{ asset("images/favicon.png") }}" type="image/x-icon">
    @endif
    <meta name="description" content="">
    <meta name="author" content="Rafael Vieira - github.com/rafaeldevcode">
    <title>{{ $marca->nome_marca }} | Upsell</title>

    {{-- ////// MARCA TAGMANAGER ////// --}}
    @if ($config[0]->tagmanager == 'on')
        @if (!empty($marca->tagmanager))
            @include('painel/layouts/componentes/tagmanagerHeader', [$marca->tagmanager])
        @endif
    @endif
    
    {{-- ////// MARCA PIXEL ////// --}}
    @if ($config[0]->pixel == 'on')
        @if (!empty($marca->pixel))
            @include('painel/layouts/componentes/pixelHeader', [$pixels, $marca->evento])
        @endif
    @endif
</head>
<body class="w-100 d-flex justify-content-center align-items-center">

    {{-- ////// MARCA TAGMANAGER NO SCIPT ////// --}}
    @if ($config[0]->tagmanager == 'on')
        @if (!empty($marca->tagmanager))
            @include('painel/layouts/componentes/tagmanagerBody', [$marca->tagmanager])
        @endif
    @endif

    {{-- ////// MARCA PIXEL NO SCIPT ////// --}}
    @if ($config[0]->pixel == 'on')
        @if (!empty($marca->pixel))
            @include('painel/layouts/componentes/pixelBody', [$pixels])
        @endif
    @endif
    
    <main class="container d-flex flex-column align-items-center mt-5">
        <section class="text-center titulo">
            <h1 class="fw-bolder">Muito obrigado pela sua confiança!</h1>
            <p class="fs-5">Já estamos processando seu pedido...</p>
            <p class="fs-5 fw-bolder bg-light rounded">E aproveitamos para selecionarmos para você um super desconto por tempo limitado!</p>
        </section>

        @if (empty($upsell))
            <section class="card col-12 col-md-10 col-lg-8 p-5">
                <div class="card-header">
                    <h2 class="text-center">Você ainda não cadastrou nenhuma upsell!</h2>

                    @auth
                        @if ($usuario->autorizacao !== 'Leitor')
                            <p class="text-center fw-bolder">Deseja adicionar uma?</p>
                        @endif
                    @endauth
                </div>

                @auth
                    @if ($usuario->autorizacao !== 'Leitor')
                        <div class="card-body text-center">
                            <a href="/marca/{{ $marca->id }}/config" class="btn btn-danger py-2 px-5">
                                Não
                            </a>

                            <a href="/obrigado/upsell/{{ $marca->id }}/adicionar" class="btn btn-primary py-2 px-5">
                                Sim
                            </a>
                        </div>
                    @endif
                @endauth
            </section>
        @else
            <section class="card d-flex flex-column flex-lg-row col-12 col-md-10 col-lg-8">
                <div class="card-header col-12 col-lg-6 d-flex align-items-center">
                    <img class="w-100" src="{{ asset("storage/{$upsell->image_produto}") }}" alt="">
                </div>

                <div class="card-body col-12 col-lg-6 d-flex flex-column justify-content-between">
                    <div>
                        <p class="p-3 m-0 bg-danger text-light fw-bolder text-center">ESTA OFERTA NÃO APARECERÁ NOVAMENTE</p>
                        <h2 class="fw-bolder">{{ $upsell->nome_produto }}</h2>
                    </div>

                    <div>
                        <small>De <span class="fw-bolder">R$</span><span class="fw-bolder fs-3 text-danger">{{ $upsell->preco_sem_desconto }}</span></small>
                        <p>por <span class="fw-bolder">R$</span><span class="fw-bolder display-4 text-success">{{ $upsell->preco_com_desconto }}</span></p>
                    </div>

                    <div class="col-12 text-center">
                        <a href="{{ $upsell->link_compra }}" class="btn btn-success col-12">EU QUERO ESTA OFERTA</a>
                        <a href="/produto/{{ $marca->id }}" class="btn col-12">NÃO QUERO ESTA OFERTA</a>
                        <img class="w-75 mt-2" src="{{ asset("images/formas-pag.png") }}" alt="">
                    </div>
                </div>           
            </section>
        @endif
    </main>

    <span hidden id="corPrincipal">{{ $marca->cor_principal }}</span>
    <span hidden id="corTitulo">{{ $marca->cor_titulo }}</span>
    <span hidden id="corTexto">{{ $marca->cor_texto }}</span>
    
    <script type="text/javascript">
        alterarCorPagina();
    </script>
</body>
</html>