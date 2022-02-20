<?php

    namespace App\Services;

    use App\Models\{Marca, Produto};
    use Illuminate\Support\Facades\DB;
    use App\Events\NovoCadastro;
use Illuminate\Support\Facades\Auth;

    class Duplicar {

        public function duplicarProduto($produto)
        {
            DB::beginTransaction();
                $marca = Marca::find($produto->marca_id);

                $marca->produtos()->create([
                    'nome_produto'    => "{$produto->nome_produto} - Cópia",
                    'link_compra'     => $produto->link_compra,
                    'quant_produto'   => $produto->quant_produto,
                    'image_produto'   => $produto->image_produto,
                    'valor_unit'      => $produto->valor_unit,
                    'valor_cheio'     => $produto->valor_cheio,
                    'valor_parcelado' => $produto->valor_parcelado,
                    'parcelas'        => $produto->parcelas,
                    'exibir_produto'  => $produto->exibir_produto
                ]);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome do produto: {$produto->nome_produto}", "Um produto foi duplicado em {$marca->nome_marca}");
        }

        public function duplicarComentario($comentario)
        {
            DB::beginTransaction();
                $marca = Marca::find($comentario->marca_id);

                $marca->comentarios()->create([
                    'nome_cliente'  => "{$comentario->nome_cliente} - Cópia", 
                    'coment_desc'   => $comentario->coment_desc, 
                    'image_cliente' => $comentario->image_cliente, 
                    'comentario'    => $comentario->comentario,
                    'exibir_coment' => $comentario->exibir_coment
                ]);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome do cliente: {$comentario->nome_cliente}", "Um comentário foi duplicado em {$marca->nome_marca}");
        }

        private function dispararEvento(string $nome_usuario, string $nome, string $mensagem):void
        {
            event(new NovoCadastro(
                $nome_usuario,
                $nome,
                $mensagem
            ));
        }
    }