<?php

    namespace App\Services;

    use App\Models\{Marca, Configuracao, Produto, User};
    use Illuminate\Support\Facades\DB;
    use App\Events\NovoCadastro;
    use Illuminate\Support\Facades\Hash;

    class Editar {

        function editarMarca($request, $marcaId)
        {
            DB::beginTransaction();
                $marca = Marca::find($marcaId);
                $marca->nome_marca    = $request->nome_marca;
                $marca->slug_marca    = strtolower(str_replace(' ', '-', $request->slug_marca));
                if(!empty($request->file('logomarca'))){$marca->logomarca = $request->file('logomarca')->store('galeria');};
                if(!empty($request->file('favicon'))){$marca->favicon = $request->file('favicon')->store('galeria');};
                $marca->cor_principal = $request->cor_principal;
                $marca->cor_titulo    = $request->cor_titulo;
                $marca->cor_texto     = $request->cor_texto;
                if(!empty($request->file('banner_1'))){$marca->banner_1 = $request->file('banner_1')->store('galeria');};
                if(!empty($request->file('banner_2'))){$marca->banner_2 = $request->file('banner_2')->store('galeria');};
                if(!empty($request->file('banner_3'))){$marca->banner_3 = $request->file('banner_3')->store('galeria');};
                if(!empty($request->file('image_desc'))){$marca->image_desc = $request->file('image_desc')->store('galeria');};
                $marca->titulo_desc   = $request->titulo_desc;
                $marca->item_1        = $request->item_1;
                $marca->item_2        = $request->item_2;
                $marca->item_3        = $request->item_3;
                $marca->item_4        = $request->item_4;
                $marca->item_5        = $request->item_5;
                $marca->tagmanager    = $request->tagmanager;
                $marca->pixel         = $request->pixel;
                $marca->evento        = $request->evento;
                $marca->cnpj          = $request->cnpj;
                $marca->cidade        = $request->cidade;
                $marca->rua           = $request->rua;
                $marca->telefone      = $request->telefone;
                $marca->email         = $request->email;
                $marca->facebook      = $request->facebook;
                $marca->instagram     = $request->instagram;
                $marca->twitter       = $request->twitter;
                $marca->disclaimer    = $request->disclaimer;
                $marca->save();
            DB::commit();
        }

        public function editarProduto($request, $produto)
        {

            DB::beginTransaction();
                $produto->nome_produto    = $request->nome_produto;
                $produto->link_compra     = $request->link_compra;
                $produto->quant_produto   = $request->quant_produto;
                if(!empty($request->file('image_produto'))){$produto->image_produto = $request->file('image_produto')->store('galeria');};
                $produto->valor_unit      = $request->valor_unit;
                $produto->valor_cheio     = $request->valor_cheio;
                $produto->valor_parcelado = $request->valor_parcelado;
                $produto->parcelas        = $request->parcelas;
                $produto->exibir_produto  = $request->exibir_produto;
                $produto->save();
            DB::commit();
        }

        public function editarComentario($request, $comentario)
        {
            DB::beginTransaction();
                $comentario->nome_cliente  = $request->nome_cliente;
                $comentario->coment_desc   = $request->coment_desc;
                if(!empty($request->file('image_cliente'))){$comentario->image_cliente = $request->file('image_cliente')->store('galeria');};
                $comentario->comentario    = $request->comentario;
                $comentario->exibir_coment = $request->exibir_coment;
                $comentario->save();
            DB::commit();
        }

        public function editarConfiguracao($configId, $request)
        {
            $config = Configuracao::find($configId);
            $marca = Marca::find($config->marca_id)->nome_marca;

            DB::beginTransaction();
                $config->modal         = $request->modal;
                $config->icone_produto = $request->icone_produto;
                $config->comentarios   = $request->comentarios;
                $config->disclaimer    = $request->disclaimer;
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
                $config->coutdown      = $request->coutdown;
                $config->tagmanager    = $request->tagmanager;
                $config->pixel         = $request->pixel;
                $config->exibir_link   = $request->exibir_link;
                $config->save();
            DB::commit();
        }

        public function editarModal($request, $marcaId)
        {
            $marca = Marca::find($marcaId)->nome_marca;
            $modal = Marca::find($marcaId)->modals()->get();

            DB::beginTransaction();
                if(!empty($request->file('produto_modal'))){$modal[0]->produto_modal = $request->file('produto_modal')->store('galeria');};
                $modal[0]->porcentagem        = $request->porcentagem;
                $modal[0]->preco_sem_desconto = $request->preco_sem_desconto;
                $modal[0]->preco_com_desconto = $request->preco_com_desconto;
                $modal[0]->link_compra        = $request->link_compra;
                $modal[0]->save();
            DB::commit();
        }

        public function editarCoutdown($marcaId, $request)
        {
            $marca = Marca::find($marcaId)->nome_marca;
            $coutdown = Marca::find($marcaId)->coutdown()->get();

            DB::begintransaction();
                $coutdown[0]->data  = $request->data;
                $coutdown[0]->time  = $request->time;
                $coutdown[0]->texto = $request->texto;
                $coutdown[0]->save();
            DB::commit();
        }

        public function editarUsuario($usuarioId, $request)
        {
            $usuario = User::find($usuarioId);

            DB::beginTransaction();
                if(!empty($request->nome)){$usuario->name = $request->name;};
                if(!empty($request->file('image_usuario'))){$usuario->image_usuario = $request->file('image_usuario')->store('galeria');};
                if(!empty($request->password)){$usuario->password = Hash::make($request->password);}
                $usuario->save();
            DB::commit();
        }

        public function editarUpsell($marca, $request)
        {
            $upsell = $marca->upsell()->get()[0];
            DB::beginTransaction();
                $upsell->nome_produto = $request->nome_produto;
                $upsell->link_compra = $request->link_compra;
                $upsell->preco_sem_desconto = $request->preco_sem_desconto;
                $upsell->preco_com_desconto = $request->preco_com_desconto;
                if(!empty($request->file('image_produto'))){$upsell->image_produto = $request->file('image_produto')->store('galeria');}
                $upsell->save();
            DB::commit();
        }

        public function redefinirPermicoes($ID, $request)
        {
            $usuario = User::find($ID);
            DB::beginTransaction();
                $usuario->autorizacao = $request->autorizacao;
                $usuario->save();
            DB::commit();
        }

        private function dispararEvento(string $nome, string $mensagem):void
        {
            event(new NovoCadastro(
                $nome,
                $mensagem
            ));
        }
    }