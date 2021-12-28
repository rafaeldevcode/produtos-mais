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
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    @if (!empty($marca->favicon))
        <link rel="shortcut icon" href="{{ asset("storage/$marca->favicon") }}" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="{{ asset("images/favicon.png") }}" type="image/x-icon">
    @endif
    <meta name="description" content="">
    <meta name="author" content="Rafael Vieira">

    {{-- ////// SCRIPT PARA CARREGAR AS FUNÇÕES ////// --}}
    <script type="text/javascript" src="{{ asset('js/funcoes.js') }}"></script>
    <title>{{ $marca->nome_marca }} {{ $politicas == true ? ' | Políticas & Termos' : '' }}</title>

    {{-- ////// MARCA TAGMANAGER ////// --}}
    @if ($config[0]->tagmanager == 'on')
        @if (!empty($marca->tagmanager))
            @include('marca/layouts/componentes/tagmanagerHeader', [$marca->tagmanager])
        @endif
    @endif
    
    {{-- ////// MARCA PIXEL ////// --}}
    @if ($config[0]->pixel == 'on')
        @if (!empty($marca->pixel))
            @include('marca/layouts/componentes/pixelHeader', [$pixels, $marca->evento])
        @endif
    @endif

</head>
<body>

    {{-- ////// MARCA TAGMANAGER NO SCIPT ////// --}}
    @if ($config[0]->tagmanager == 'on')
        @if (!empty($marca->tagmanager))
            @include('marca/layouts/componentes/tagmanagerBody', [$marca->tagmanager])
        @endif
    @endif

    {{-- ////// MARCA PIXEL NO SCIPT ////// --}}
    @if ($config[0]->pixel == 'on')
        @if (!empty($marca->pixel))
            @include('marca/layouts/componentes/pixelBody', [$pixels])
        @endif
    @endif

    {{-- ///////// ABILITAR COUTDOWN //////// --}}
    @if ($politicas !== true)
        @if ($config[0]->coutdown == 'on')
            @include('marca/layouts/componentes/coutdown')
        @endif
    @endif

    <header class="cabecalho">
        <section class="container d-flex justify-content-sm-between justify-content-center align-items-center p-3 ">
            <div class="image-header">
                @if (!empty($marca->logomarca))
                    <img src="{{ asset("storage/$marca->logomarca") }}" alt="Logo {{ asset("images/$marca->nome_marca") }}">
                @else
                    <img src="{{ asset("images/logo.png") }}" alt="Logo Produtos +">
                @endif
            </div>
    
            <a title="Comprar Agora" href="{{ $politicas == true ? "/produto/{$marca->id}" : "#compra-agora" }}" class="btn px-4 pt-2 d-sm-block d-none btn-principal comprarAgora">
                <i class="fas fa-arrow-circle-right"></i>
                Comprar Agora
            </a>
        </section>
    </header>
    
    @yield('conteudo')

    <footer class="container-fluid pb-1 bg-principal">
        <section class="links-rodape container d-flex flex-wrap justify-content-between">
            @if ($config[0]->empresa == 'on')
                <div class="m-3">
                    <h5 class="fw-bolder">EMPRESA</h5>

                    <ul class="list-group">
                        @if (!empty($marca->nome_marca))
                            <li class="list-group-item border-0 p-0">{{ $marca->nome_marca }}</li>
                        @endif
                        
                        @if ($config[0]->cnpj == 'on')
                            @if (!empty($marca->cnpj))
                                <li class="list-group-item border-0 p-0">CNPJ: {{ $marca->cnpj }}</li>
                            @endif
                        @endif
                        
                        @if ($config[0]->rua == 'on')
                            @if (!empty($marca->rua))
                                <li class="list-group-item border-0 p-0">Rua: {{ $marca->rua }}</li>
                            @endif
                        @endif
                        
                        @if ($config[0]->cidade == 'on')
                            @if (!empty($marca->cidade))
                                <li class="list-group-item border-0 p-0">Cidade: {{ $marca->cidade }}</li>
                            @endif
                        @endif
                    </ul>
                </div>
            @endif

            @if ($config[0]->atendimento == 'on')
                <div class="m-3">
                    <h5 class="fw-bolder">ATENDIMENTO</h5>

                    <ul class="list-group">
                        @if ($config[0]->telefone == 'on')
                            @if (!empty($marca->telefone))
                                <li class="list-group-item border-0 p-0">
                                    <i class="fas fa-phone-square"></i>
                                    Telefone: {{ $marca->telefone }}
                                </li>
                            @endif
                        @endif

                        @if ($config[0]->email == 'on')
                            @if (!empty($marca->email))
                                <li class="list-group-item border-0 p-0">
                                    <i class="fas fa-envelope-square"></i>
                                    <a title="E-mail" href="mailto:{{ $marca->email }}" class="text-decoration-none">E-mail: {{ $marca->email }} </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            @endif

            @if ($config[0]->social == 'on')
                <div class="m-3">
                    <h5 class="fw-bolder">SOCIAL</h5>

                    <ul class="list-group">
                        @if ($config[0]->facebook == 'on')
                            @if (!empty($marca->facebook))
                                <li class="list-group-item border-0 p-0">
                                    <a title="Facebook" target="_blank" rel="noopener" class="text-decoration-none" href="{{ $marca->facebook }}">
                                        <i class="fab fa-facebook-square"></i>
                                        Facebook
                                    </a>
                                </li>
                            @endif
                        @endif

                        @if ($config[0]->instagram == 'on')
                            @if (!empty($marca->instagram))
                                <li class="list-group-item border-0 p-0">
                                    <a title="Instagram" target="_blank" rel="noopener" class="text-decoration-none" href="{{ $marca->instagram }}">
                                        <i class="fab fa-instagram-square"></i>
                                        Instagram
                                    </a>
                                </li>
                            @endif
                        @endif

                        @if ($config[0]->twitter == 'on')
                            @if (!empty($marca->twitter))
                                <li class="list-group-item border-0 p-0">
                                    <a title="Twitter" target="_blank" rel="noopener" class="text-decoration-none" href="{{ $marca->twitter }}">
                                        <i class="fab fa-twitter-square"></i>
                                        Twitter
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            @endif
        </section>

        <section class="text-center links">
            <div class="m-3 pb-3">
                <h5 class="fw-bolder">LINKS</h5>

                <ul class="list-group d-flex flex-row justify-content-center">
                    <li class="list-group-item border-0 p-0">
                        <a title="Políticas de Privacidade" target="{{ $politicas == true ? '_self' : '_blank' }}" rel="noopener" class="text-decoration-none" href="/politicas/privacidade/{{ $marca->id }}">Políticas de Privacidade</a>
                    </li>
                    <li class="list-group-item border-0 px-2 py-0">
                        |
                    </li>
                    <li class="list-group-item border-0 p-0">
                        <a title="Termos de Uso" target="{{ $politicas == true ? '_self' : '_blank' }}" rel="noopener" class="text-decoration-none" href="/politicas/termos/{{ $marca->id }}">Termos de Uso</a>
                    </li>
                </ul>
            </div>

            <p class="text-center">&copy; <span id="ano"></span> {{ $marca->nome_marca }} - Todos os direitos reservados</p>
        </section>

    </footer>
    <span hidden id="corPrincipal">{{ $marca->cor_principal }}</span>
    <span hidden id="corTitulo">{{ $marca->cor_titulo }}</span>
    <span hidden id="corTexto">{{ $marca->cor_texto }}</span>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script type="text/javascript">
        ////// EXIBIR O ANO /////////
        let data = new Date();
        document.getElementById('ano').innerHTML = data.getFullYear();

        ////// ALTERAR A COR DA PÁGINA ///////
        alterarCorPagina();

        ////// ALTERAR ÍCONES ACIMA DO PRODUTO ///////
        alterarIcones(0, 'Mais Econômico', '<i class="fas fa-hand-holding-usd"></i>', 'bg-danger')
        alterarIcones(1, 'Mais Vendido', '<i class="fas fa-plus-circle"></i>', 'bg-warning');
        alterarIcones(2, 'Frete para todo Brasil', '<i class="fas fa-truck-moving"></i>', 'bg-success');

        naoAbrirPopupLinkInterno();
    </script>
</body>
</html>