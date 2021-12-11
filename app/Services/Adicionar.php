<?php

    namespace App\Services;

    use App\Models\Marca;
    use Illuminate\Support\Facades\DB;

    class Adicionar {

        public function adicionarMarca($request)
        {
            DB::transaction(function() use($request){
                $marca = Marca::create($request->all());
                $marca->configuracoes()->create();
            });
        }

        public function adicionarProduto($request, $marca)
        {
            DB::transaction(function() use($request, $marca){
                $marca->produtos()->create([
                    'nome_produto'    => $request->nome_produto,
                    'link_compra'     => $request->link_compra,
                    'quant_produto'   => $request->quant_produto,
                    'image_produto'   => $request->image_produto,
                    'valor_unit'      => $request->valor_unit,
                    'valor_cheio'     => $request->valor_cheio,
                    'valor_parcelado' => $request->valor_parcelado,
                    'parcelas'        => $request->parcelas,
                    'exibir_produto'  => $request->exibir_produto
                ]);
            });
        }

        public function adicionarComentario($request)
        {
            $marca = Marca::find($request->id);

            DB::transaction(function() use($request, $marca){
                $marca->comentarios()->create([
                    'nome_cliente'  => $request->nome_cliente, 
                    'coment_desc'   => $request->coment_desc, 
                    'image_cliente' => $request->image_cliente, 
                    'comentario'    => $request->comentario
                ]);
            });
        }

        public function adicionarModal($request, $marcaId)
        {
            $marca = Marca::find($marcaId);

            DB::transaction(function() use($request, $marca){
                $marca->modals()->create([
                    'produto_modal'         => $request->produto_modal, 
                    'porcentagem'              => $request->porcentagem, 
                    'preco_sem_desconto'    => $request->preco_sem_desconto, 
                    'preco_com_desconto'    => $request->preco_com_desconto,
                    'link_compra'           => $request->link_compra
                ]);
            });
        }
    }