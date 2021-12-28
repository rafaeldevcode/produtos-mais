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

    {{-- ////// SCRIPT PARA CARREGAR AS FUNÇÕES ////// --}}
    <script type="text/javascript" src="{{ asset('js/funcoes.js') }}"></script>
    <title>Painel | Admin</title>
</head>
<body>
    
    <header class="container-fluid bg-white p-3 d-flex align-items-center justify-content-between">
        <div class="image-header">
            <a title="Listar Marcas" href="/marcas">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Produtos +">
            </a>
        </div>
        
        <div class="navegacao d-flex flex-column justify-content-between p-0" id="navegacao">
            <span>
                <div class="menu">
                    <i class="fas fa-arrow-circle-left fs-2 text-dark" id="rotacao"></i>
                </div>
    
                <div class="text-end usuario p-2">
                    <i class="fas fa-user-circle fs-1"></i>

                    <p>{{ $usuario }}</p>
                </div>
    
                <nav class="text-end">
                    <ul class="list-group">
                        @auth
                            <li class="list-group-item nav-item">
                                <a title="Inicio" class="nav-link p-0" href="/marcas">Inicio</a>
                            </li>

                            <li class="list-group-item nav-item">
                                <a title="Listar Usuários" class="nav-link p-0" href="/usuarios">Usuarios</a>
                            </li>

                            <li class="list-group-item nav-item">
                                <a title="Adicionar Usuário" class="nav-link p-0" href="/registrar">Novo usuário</a>
                            </li>

                            <li class="list-group-item nav-item">
                                <a title="Adicionar Marca" class="nav-link p-0" href="/adicionar/marca">Nova marca</a>
                            </li>

                            <li class="list-group-item nav-item">
                                <a title="Adicionar Produto" class="nav-link p-0" href="/adicionar/produto">Novo produto</a>
                            </li>

                            <li class="list-group-item nav-item">
                                <a title="Adicionar Comentário" class="nav-link p-0" href="/adicionar/comentario">Novo comentário</a>
                            </li>
                        @endauth

                        <li class="list-group-item nav-item">
                            @auth
                                <a title="Sair" class="text-danger nav-link p-0" href="/sair">
                                    Sair
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            @endauth
            
                            @guest
                                <a title="Entrar" class="text-info nav-link p-0" href="/entrar">
                                    Entrar
                                    <i class="fas fa-sign-in-alt"></i>
                                </a>
                            @endguest
                        </li>
                    </ul>
                </nav>
            </span>

            <span>
                <p class="m-0 text-center"><b><a title="Perfil Git Hub" class="hover-secondary text-decoration-none" target="_blank" rel="noopener" href="https://github.com/rafaeldevcode"><i class="fab fa-github"></i> Rafael Vieira </a></b></p>
            </span>
        </div>
    </header>

    @yield('conteudo')

    <footer class="container-fluid bg-white p-3 d-flex flex-column justify-content-center align-items-center">
        <p class="m-0 text-center">&copy; <span id="ano"></span> Produtos + | Todos os direitos reservados</p>
        <p class="m-0">Developer | <b><a title="Perfil Git Hub" class="hover-secondary text-decoration-none" target="_blank" rel="noopener" href="https://github.com/rafaeldevcode"><i class="fab fa-github"></i> Rafael Vieira </a></b></p>
    </footer>

    <script type="text/javascript">
        let data = new Date();
        document.getElementById('ano').innerHTML = data.getFullYear();

        let menu = false;
        abrirMenuMobile(menu);
    </script>
</body>
</html>