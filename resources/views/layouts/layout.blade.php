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

    <meta name="description" content="">
    <meta name="author" content="Rafael Vieira">
    <title>Produtos</title>
</head>
<body>

    <header class="cabecalho">
        <section class="container d-flex justify-content-sm-between justify-content-center align-items-center p-3 ">
            <div class="image-header">
                <img src="https://recomendacao.formoney.com.br/assets/images/logo.png" alt="Logo">
            </div>
    
            <a href="#" class="btn btn-secondary px-4 pt-2 d-sm-block d-none">
                <i class="fas fa-arrow-circle-right"></i>
                Comprar Agora
            </a>
        </section>
    </header>
    
    @yield('conteudo')

    <footer class="container-fluid pb-5">
        <section class="links-rodape container d-flex flex-wrap justify-content-between">
            <div class="m-3">
                <h5>EMPRESA</h5>

                <ul class="list-group">
                    <li class="list-group-item border-0 p-0">Nullius Saúde Natural</li>
                    <li class="list-group-item border-0 p-0">CNPJ 11.587.093/0001-19</li>
                    <li class="list-group-item border-0 p-0">Rua Marina Ciufuli Zanfelice, 280 – Lapa</li>
                    <li class="list-group-item border-0 p-0">São Paulo/SP – Cep 05040-000</li>
                </ul>
            </div>

            <div class="m-3">
                <h5>ATENDIMENTO</h5>

                <ul class="list-group">
                    <li class="list-group-item border-0 p-0">
                        <i class="fas fa-arrow-circle-right"></i>
                        Tel: 0800-323-5001
                    </li>
                    <li class="list-group-item border-0 p-0">
                        <i class="fas fa-arrow-circle-right"></i>
                        E-mail: sac@nullius.com.br
                    </li>
                </ul>
            </div>

            <div class="m-3">
                <h5>LINKS</h5>

                <ul class="list-group">
                    <li class="list-group-item border-0 p-0">
                        <a class="text-decoration-none" href="#">Termos de Uso</a>
                    </li>
                    <li class="list-group-item border-0 p-0">
                        <a class="text-decoration-none" href="#">Políticas de Privacidade</a>
                    </li>
                </ul>
            </div>

            <div class="m-3">
                <h5>SOCIAL</h5>

                <ul class="list-group">
                    <li class="list-group-item border-0 p-0">
                        <a class="text-decoration-none" href="#">
                            <i class="fab fa-facebook-square"></i>
                            Facebook
                        </a>
                    </li>
                    <li class="list-group-item border-0 p-0">
                        <a class="text-decoration-none" href="#">
                            <i class="fab fa-instagram-square"></i>
                            Instagram
                        </a>
                    </li>
                    <li class="list-group-item border-0 p-0">
                        <a class="text-decoration-none" href="#">
                            <i class="fab fa-twitter-square"></i>
                            Twitter
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <p class="pt-5 text-center">&copy; 2021 Produto - Todos os direitos reservados</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>