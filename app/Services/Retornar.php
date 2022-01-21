<?php

    namespace App\Services;

    use App\Models\{Comentario, Produto};

    class Retornar
    {
        public function retornarComentario($marca):array
        {
            $comentarios = [];

            $marca->comentarios->each(function(Comentario $comentario) use(&$comentarios){
                if($comentario->exibir_coment == 'on'){
                    $comentarios[] = $comentario;
                }
            });

            return $comentarios;
        }

        public function retornarProdutos($marca):array
        {
            $produtos = [];

            $marca->produtos->each(function(Produto $produto) use(&$produtos){
                if($produto->exibir_produto == 'on'){
                    $produtos[] = $produto;
                }
            });

            return $produtos;
        }

        public function retornarParametro($request):string
        {
            $utm_source = $request->query('utm_source');
            $utm_compaign = $request->query('utm_compaign');
            $utm_medium = $request->query('utm_medium');
            $utm_content = $request->query('utm_content');

            $parametros = "?utm_source={$utm_source}&utm_compaign={$utm_compaign}&utm_medium={$utm_medium}&utm_content{$utm_content}";
            
            return $parametros;
        }
    }