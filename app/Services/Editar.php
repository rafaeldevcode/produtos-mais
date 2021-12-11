<?php

    namespace App\Services;

    use App\Models\{Marca, Configuracao};
    use Illuminate\Support\Facades\DB;

    class Editar {

        function editarMarca($request, $marcaId)
        {
            DB::transaction(function() use($request, $marcaId){
                $marca = Marca::find($marcaId);
                $marca->nome_marca    = $request->nome_marca;
                $marca->slug_marca    = $request->slug_marca;
                $marca->logomarca     = $request->logomarca;
                $marca->favicon       = $request->favicon;
                $marca->cor_principal = $request->cor_principal;
                $marca->banner_1      = $request->banner_1;
                $marca->banner_2      = $request->banner_2;
                $marca->banner_3      = $request->banner_3;
                $marca->image_desc    = $request->image_desc;
                $marca->titulo_desc   = $request->titulo_desc;
                $marca->item_1        = $request->item_1;
                $marca->item_2        = $request->item_2;
                $marca->item_3        = $request->item_3;
                $marca->item_4        = $request->item_4;
                $marca->item_5        = $request->item_5;
                $marca->tag_head      = $request->tag_head;
                $marca->tag_body      = $request->tag_body;
                $marca->pixel_head    = $request->pixel_head;
                $marca->pixel_body    = $request->pixel_body;
                $marca->cnpj          = $request->cnpj;
                $marca->cidade        = $request->cidade;
                $marca->rua           = $request->rua;
                $marca->telefone      = $request->telefone;
                $marca->email         = $request->email;
                $marca->facebook      = $request->facebook;
                $marca->instagram     = $request->instagram;
                $marca->twitter       = $request->twitter;
                $marca->save();
            });
        }

        public function editarProduto($request, $produto)
        {
            DB::transaction(function() use($request, $produto){
                $produto->nome_produto    = $request->nome_produto;
                $produto->link_compra     = $request->link_compra;
                $produto->quant_produto   = $request->quant_produto;
                $produto->image_produto   = $request->image_produto;
                $produto->valor_unit      = $request->valor_unit;
                $produto->valor_cheio     = $request->valor_cheio;
                $produto->valor_parcelado = $request->valor_parcelado;
                $produto->parcelas        = $request->parcelas;
                $produto->exibir_produto  = $request->exibir_produto;
                $produto->save();
            });
        }

        public function editarComentario($request, $comentario)
        {
            DB::transaction(function() use($request, $comentario){
                $comentario->nome_cliente  = $request->nome_cliente;
                $comentario->coment_desc   = $request->coment_desc;
                $comentario->image_cliente = $request->image_cliente;
                $comentario->comentario    = $request->comentario;
                $comentario->save();
            });
        }

        public function editarConfiguracao($configId, $request)
        {
            $config = Configuracao::find($configId);

            DB::transaction(function() use($config, $request){
                $config->modal         = $request->modal;
                $config->icone_produto = $request->icone_produto;
                $config->empresa       = $request->empresa;
                $config->cnpj          = $request->cnpj;
                $config->rua           = $request->rua;
                $config->cidade        = $request->cidade;
                $config->atendimento   = $request->atendimento;
                $config->telefone      = $request->telefone;
                $config->email         = $request->email;
                $config->social        = $request->social;
                $config->facebook      = $request->facebook;
                $config->instagram     = $request->instagram;
                $config->twitter       = $request->twitter;
                $config->save();
            });
        }

        public function editarModal($request, $marcaId)
        {
            $modal = Marca::find($marcaId)->modals()->get();

            DB::transaction(function() use($request, $modal){
                $modal[0]->produto_modal      = $request->produto_modal;
                $modal[0]->porcentagem           = $request->porcentagem;
                $modal[0]->preco_sem_desconto = $request->preco_sem_desconto;
                $modal[0]->preco_com_desconto = $request->preco_com_desconto;
                $modal[0]->link_compra        = $request->link_compra;
                $modal[0]->save();
            });
        }
    }