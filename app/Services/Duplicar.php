<?php

    namespace App\Services;

    use App\Models\{Marca, Produto};
    use Illuminate\Support\Facades\DB;

    class Duplicar {

        public function duplicarProduto($produto)
        {
            DB::transaction(function() use($produto){
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
            });
        }

        public function duplicarComentario($comentario)
        {
            DB::transaction(function() use($comentario){
                $marca = Marca::find($comentario->marca_id);

                $marca->comentarios()->create([
                    'nome_cliente'  => "{$comentario->nome_cliente} - Cópia", 
                    'coment_desc'   => $comentario->coment_desc, 
                    'image_cliente' => $comentario->image_cliente, 
                    'comentario'    => $comentario->comentario
                ]);
            });
        }
    }