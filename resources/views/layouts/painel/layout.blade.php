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
    <link rel="stylesheet" href="{{ asset('css/painel/style.css')}}">

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <meta name="description" content="">
    <meta name="author" content="Rafael Vieira">

    <title>Painel | Admin</title>
</head>
<body>
    
    <header class="container-fluid bg-white p-3 d-flex justify-content-center">
        <div class="image-header">
            <a href="/marcas">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Produtos +">
            </a>
        </div>
    </header>

    @yield('conteudo')

    <footer class="container-fluid bg-white p-3 d-flex flex-column justify-content-center align-items-center">
        <p class="m-0 text-center">&copy; <span id="ano"></span> Produtos + | Todos os direitos reservados</p>
        <p class="m-0">Developer | <b><a class="hover-secondary text-decoration-none" target="_blank" rel="noopener" href="https://github.com/rafaeldevcode"><i class="fab fa-github"></i> Rafael Vieira </a></b></p>
    </footer>

    <script type="text/javascript">
        let data = new Date();
        document.getElementById('ano').innerHTML = data.getFullYear();
    </script>
</body>
</html>