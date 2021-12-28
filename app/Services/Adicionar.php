<?php

    namespace App\Services;

    use App\Models\Marca;
    use Illuminate\Support\Facades\DB;
    use App\Events\NovoCadastro;
    use Illuminate\Support\Facades\{Auth, Hash};
    use App\Models\User;

    class Adicionar {

        public function adicionarMarca($request)
        {
            DB::beginTransaction();
                $marca = Marca::create([
                    'nome_marca'    => $request->nome_marca,
                    'slug_marca'    => $request->slug_marca,
                    'logomarca'     => empty($request->file('logomarca')) ? null : $request->file('logomarca')->store('marca'),
                    'favicon'       => empty($request->file('favicon')) ? null : $request->file('favicon')->store('marca'),
                    'cor_principal' => $request->cor_principal,
                    'cor_titulo'    => $request->cor_titulo,
                    'cor_texto'     => $request->cor_texto,
                    'banner_1'      => $request->file('banner_1')->store('marca'),
                    'banner_2'      => $request->file('banner_2')->store('marca'),
                    'banner_3'      => $request->file('banner_3')->store('marca'),
                    'image_desc'    => $request->file('image_desc')->store('marca'),
                    'titulo_desc'   => $request->titulo_desc,
                    'item_1'        => $request->item_1,
                    'item_2'        => $request->item_2,
                    'item_3'        => $request->item_3,
                    'item_4'        => $request->item_4,
                    'item_5'        => $request->item_5,
                    'tagmanager'    => $request->tagmanager,
                    'pixel'         => $request->pixel,
                    'evento'        => $request->evento,
                    'cnpj'          => $request->cnpj,
                    'cidade'        => $request->cidade,
                    'rua'           => $request->rua,
                    'telefone'      => $request->telefone,
                    'email'         => $request->email,
                    'facebook'      => $request->facebook,
                    'instagram'     => $request->instagram,
                    'twitter'       => $request->twitter,
                    'disclaimer'    => $request->disclaimer
                ]);
                $marca->configuracoes()->create();
            DB::commit();

            $this->dispararEvento($request->nome_marca, 'Nova marca cadastrada!');
        }

        public function adicionarProduto($request, $marca)
        {
            DB::beginTransaction();
                $marca->produtos()->create([
                    'nome_produto'    => $request->nome_produto,
                    'link_compra'     => $request->link_compra,
                    'quant_produto'   => $request->quant_produto,
                    'image_produto'   => $request->file('image_produto')->store('produtos'),
                    'valor_unit'      => $request->valor_unit,
                    'valor_cheio'     => $request->valor_cheio,
                    'valor_parcelado' => $request->valor_parcelado,
                    'parcelas'        => $request->parcelas,
                    'exibir_produto'  => $request->exibir_produto
                ]);
            DB::commit();

            $this->dispararEvento($request->nome_produto, "Novo produto adicionado a marca {$marca->nome_marca}");
        }

        public function adicionarComentario($request)
        {
            $marca = Marca::find($request->id);

            DB::beginTransaction();
                $marca->comentarios()->create([
                    'nome_cliente'  => $request->nome_cliente,
                    'coment_desc'   => $request->coment_desc,
                    'image_cliente' => $request->file('image_cliente')->store('comentario'),
                    'comentario'    => $request->comentario,
                    'exibir_coment' => $request->exibir_coment
                ]);
            DB::commit();

            $this->dispararEvento($request->nome_cliente, 'Novo comentário adicionado!');
        }

        public function adicionarModal($request, $marcaId)
        {
            $marca = Marca::find($marcaId);

            DB::beginTransaction();
                $marca->modals()->create([
                    'produto_modal'      => $request->file('produto_modal')->store('modal'),
                    'porcentagem'        => $request->porcentagem,
                    'preco_sem_desconto' => $request->preco_sem_desconto,
                    'preco_com_desconto' => $request->preco_com_desconto,
                    'link_compra'        => $request->link_compra
                ]);
            DB::commit();

            $this->dispararEvento('Modal', "Novo modal adicionado a marca {$marca->nome_marca}");
        }

        public function adicionarCoutdown($marcaId, $request)
        {
            $marca = Marca::find($marcaId);
            $coutdown = $request->except('_token');
    
            DB::begintransaction();
                $marca->coutdown()->create($coutdown);
            DB::commit();

            $this->dispararEvento('Coutdown', "Novo coutdown adicionado a marca {$marca->nome_marca}");
        }

        public function adicionarUsuario($request)
        {
            $data = $request->except('_token');
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
    
            if(!Auth::user()){
                Auth::login($user);
            }

            $this->dispararEvento($request->name, 'Nova usuário adicionado a produtos +!');
        }

        public function adicionarUpsell($marca, $request)
        {
            DB::beginTransaction();
                $marca->upsell()->create([
                    'nome_produto'       => $request->nome_produto,
                    'link_compra'        => $request->link_compra,
                    'preco_sem_desconto' => $request->preco_sem_desconto,
                    'preco_com_desconto' => $request->preco_com_desconto,
                    'image_produto'      => $request->file('image_produto')->store('upsell')
                ]);
            DB::commit();

            $this->dispararEvento('Upsell', "Upsell adicionado a marca {$marca->nome_marca}");
        }

        private function dispararEvento(string $nome, string $mensagem):void
        {
            event(new NovoCadastro(
                $nome,
                $mensagem
            ));
        }
    }