<!DOCTYPE html>
<html lang="pt-BR" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- ///////// BOOTSTRAP ///////// --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- ///////// FONTAWESOME ///////// --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/obrigado/style.css')}}">

    @if (!empty($marca->favicon))
        <link rel="shortcut icon" href="{{ asset("storage/$marca->favicon") }}" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="{{ asset("images/favicon.png") }}" type="image/x-icon">
    @endif

    <meta name="description" content="">
    <meta name="author" content="Rafael Vieira - github.com/rafaeldevcode">
    <title>{{ $marca->nome_marca }} | Obrigado</title>

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
<body class="w-100 h-100 d-flex justify-content-center align-items-center">

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
    
    <main class="d-flex align-items-center flex-column obrigado">
        <h1 class="display-5 fw-bolder titulo">OBRIGADO!!!!</h1>
        <section class="col-12 col-md-8 p-5 rounded mt-5 card-obrigado">
            <p class="m-0 text-center fs-5">Parabéns pela sua compra!</p>

            <p class="m-0 text-center fs-5">A marca {{ $marca->nome_marca }} está muito grata!!!</p>

            <p class="m-0 text-center fs-5">Informamos que seu pedido já esta sendo processado e será enviado o mais rápido possível.</p>

            <p class="m-0 text-center fs-5">Fique atento em seu e-mail, enviaremos o código de rastreio por lá.</p>

            @if($config[0]->exibir_link == 'on')
                <p class="m-0 text-center fs-5 mt-5">
                    Caso queira dar uma olhada em outros produtos!
                    <a class="text-decoration-none" href="/">Clique aqui</a>
                </p>
            @endif
        </section>
    </main>

    <span hidden id="corPrincipal">{{ $marca->cor_principal }}</span>
    <span hidden id="corTitulo">{{ $marca->cor_titulo }}</span>
    <span hidden id="corTexto">{{ $marca->cor_texto }}</span>

    <script type="text/javascript">
        alterarCorPagina();
    </script>
</body>
</html>