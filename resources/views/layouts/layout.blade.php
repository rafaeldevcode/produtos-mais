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
        <link rel="shortcut icon" href="{{ asset("images/$marca->favicon") }}" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="{{ asset("images/favicon.png") }}" type="image/x-icon">
    @endif
    <meta name="description" content="">
    <meta name="author" content="Rafael Vieira">
    <title>{{ $marca->nome_marca }}</title>

    @if (!empty($marca->tag_head))
        {{ $marca->tag_head }}
    @else
    
    @if(!empty($marca->pixel_head))
        {{ $marca->pixel_head }}
    @endif
</head>
<body>

    @if (!empty($marca->tag_body))
        {{ $marca->tag_body }}
    @else
    
    @if(!empty($marca->pixel_body))
        {{ $marca->pixel_body }}
    @endif

    <header class="cabecalho">
        <section class="container d-flex justify-content-sm-between justify-content-center align-items-center p-3 ">
            <div class="image-header">
                @if (!empty($marca->logomarca))
                    <img src="{{ asset("images/$marca->logomarca") }}" alt="Logo {{ asset("images/$marca->nome_marca") }}">
                @else
                    <img src="{{ asset("images/logo.png") }}" alt="Logo Produtos +">
                @endif
            </div>
    
            <a href="#compra-agora" class="btn px-4 pt-2 d-sm-block d-none btn-principal">
                <i class="fas fa-arrow-circle-right"></i>
                Comprar Agora
            </a>
        </section>
    </header>
    
    @yield('conteudo')

    <footer class="container-fluid pb-5 bg-principal">
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
                                    <a href="mailto:{{ $marca->email }}" class="text-decoration-none">E-mail: {{ $marca->email }} </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            @endif

            <div class="m-3">
                <h5 class="fw-bolder">LINKS</h5>

                <ul class="list-group">
                    <li class="list-group-item border-0 p-0">
                        <a target="_blank" rel="noopener" class="text-decoration-none" href="/politicas/privacidade/{{ $marca->id }}">Termos de Uso</a>
                    </li>
                    <li class="list-group-item border-0 p-0">
                        <a target="_blank" rel="noopener" class="text-decoration-none" href="/politicas/termos/{{ $marca->id }}">Políticas de Privacidade</a>
                    </li>
                </ul>
            </div>

            @if ($config[0]->social == 'on')
                <div class="m-3">
                    <h5 class="fw-bolder">SOCIAL</h5>

                    <ul class="list-group">
                        @if ($config[0]->facebook == 'on')
                            @if (!empty($marca->facebook))
                                <li class="list-group-item border-0 p-0">
                                    <a target="_blank" rel="noopener" class="text-decoration-none" href="{{ $marca->facebook }}">
                                        <i class="fab fa-facebook-square"></i>
                                        Facebook
                                    </a>
                                </li>
                            @endif
                        @endif

                        @if ($config[0]->instagram == 'on')
                            @if (!empty($marca->instagram))
                                <li class="list-group-item border-0 p-0">
                                    <a target="_blank" rel="noopener" class="text-decoration-none" href="{{ $marca->instagram }}">
                                        <i class="fab fa-instagram-square"></i>
                                        Instagram
                                    </a>
                                </li>
                            @endif
                        @endif

                        @if ($config[0]->twitter == 'on')
                            @if (!empty($marca->twitter))
                                <li class="list-group-item border-0 p-0">
                                    <a target="_blank" rel="noopener" class="text-decoration-none" href="{{ $marca->twitter }}">
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

        <p class="pt-5 text-center">&copy; <span id="ano"></span> {{ $marca->nome_marca }} - Todos os direitos reservados</p>

        @if ($config[0]->modal == 'on')
            @include('layouts/componentes/modal')
        @endif

    </footer>
    <span hidden id="corPrincipal">{{ $marca->cor_principal }}</span>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script type="text/javascript">
        let data = new Date();
        document.getElementById('ano').innerHTML = data.getFullYear();

        let corPrincipal = document.getElementById('corPrincipal').innerHTML;
        document.body.style.setProperty('--cor-principal', corPrincipal);
    </script>
</body>
</html>