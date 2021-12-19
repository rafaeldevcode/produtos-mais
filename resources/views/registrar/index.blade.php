@extends('marca/layouts/painel/layout')

@section('conteudo')

    <main class=" col-12 col-lg-6 m-auto my-5 pt-1 bg-white rounded">
        <section class="container p-5">
            <div class="d-flex justify-content-center border border-2 rouded py-2">
                <i class="fas fa-user-plus display-1"></i>
            </div>

            @include('marca/layouts/componentes/errors', [$errors])

            <form method="POST">
                @csrf
                <div class="mt-5">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Nome" class="form-control">
                </div>

                <div class="mt-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" placeholder="E-mail" class="form-control">
                </div>

                <div class="mt-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" id="password" placeholder="Senha" class="form-control">
                </div>

                <div class="d-flex flex-wrap justify-content-end mt-2">
                    <button title="Registrar" type="submit" class="py-2 px-5 btn btn-primary col-12 col-sm-4">
                        Registrar
                        <i class="fas fa-plus-circle"></i>
                    </button>
                </div>
            </form>
        </section>
    </main>

    <script type="text/javascript">
        let removerErro = document.querySelectorAll('.removerErro');
        let btnRemoverErro = document.querySelectorAll('.btnRemoverErro');

        for(let i = 0; i < btnRemoverErro.length; i++){
            btnRemoverErro[i].addEventListener('click', ()=>{
                removerErro[i].remove(removerErro[i])
            })
        }
    </script>
@endsection