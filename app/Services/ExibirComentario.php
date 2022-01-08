<?php

    namespace App\Services;

    use App\Models\Comentario;

    class ExibirComentario
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
    }