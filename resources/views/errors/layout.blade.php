<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- ///////// BOOTSTRAP ///////// --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
   
    <link rel="stylesheet" href="{{ asset('css/painel/style.css')}}">

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <meta name="description" content="">
    <meta name="author" content="Rafael Vieira - github.com/rafaeldevcode">

    {{-- ////// SCRIPT PARA CARREGAR AS FUNÇÕES ////// --}}
    <script type="text/javascript" src="{{ asset('js/funcoes.js') }}"></script>
    <title>Produtos + | @yield('code')</title>
</head>
<body>
    
    <main class="container bg-light rounded my-5 mx-auto">
        <section class="container pt-3 px-0">
            <div class="border-bottom border-success border-2 d-flex justify-content-between">
                <h1>Este é um erro @yield('code')</h1>

                <a title="Voltar" href="/" class="btn btn-info d-flex align-items-center mb-3 py-2">
                    <i class="fas fa-reply"></i>
                </a>
            </div>
        </section>

        <section class="lh-1 text-center">
            @yield('message')

            <div class="container">
                @yield('image')
            </div>
        </section>
    </main>

</body>
</html>