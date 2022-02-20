<?php

    namespace App\Services;

    use App\Models\Marca;
    use Illuminate\Support\Facades\DB;
    use App\Events\NovoCadastro;
    use App\Models\Imagen;
    use Illuminate\Support\Facades\{Auth, Hash};
    use App\Models\User;

    class Adicionar {

        public function adicionarMarca($request)
        {
            $data = $request->all();
            $data['logomarca']  = empty($request->file('logomarca')) ? null : $request->file('logomarca')->store('galeria');
            $data['favicon']    = empty($request->file('favicon')) ? null : $request->file('favicon')->store('galeria');
            $data['banner_1']   = $request->file('banner_1')->store('galeria');
            $data['banner_2']   = $request->file('banner_2')->store('galeria');
            $data['banner_3']   = $request->file('banner_3')->store('galeria');
            $data['image_desc'] = $request->file('image_desc')->store('galeria');
            $data['slug_marca'] = strtolower(str_replace($request->slug_marca, ' ', '-'));

            DB::beginTransaction();
                $marca = Marca::create($data);
                $marca->configuracoes()->create();
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome da marca: {$request->nome_marca}", 'Uma nova marca foi cadastrada em Produtos+');
        }

        public function adicionarProduto($request, $marca)
        {

            $data = $request->except('id');
            $data['image_produto'] = $request->file('image_produto')->store('galeria');

            DB::beginTransaction();
                $marca->produtos()->create($data);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome do produto: {$request->nome_produto}", "Um novo produto foi adicionado em {$marca->nome_marca}");
        }

        public function adicionarComentario($request)
        {
            $marca = Marca::find($request->id);
            $data = $request->except('id');
            $data['image_cliente'] = $request->file('image_cliente')->store('galeria');

            DB::beginTransaction();
                $marca->comentarios()->create($data);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome do cliente: {$request->nome_cliente}", "Um novo comentário foi adicionado em {$marca->nome_marca}");
        }

        public function adicionarModal($request, $marcaId)
        {
            $marca = Marca::find($marcaId);
            $data = $request->all();
            $data['produto_modal'] = $request->file('produto_modal')->store('galeria');

            DB::beginTransaction();
                $marca->modals()->create($data);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome: Modal", "Um novo modal foi adicionado em {$marca->nome_marca}");
        }

        public function adicionarCoutdown($marcaId, $request)
        {
            $marca = Marca::find($marcaId);
            $coutdown = $request->except('_token');
    
            DB::begintransaction();
                $marca->coutdown()->create($coutdown);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome: Coutdown", "Um novo coutdown foi adicionado em {$marca->nome_marca}");
        }

        public function adicionarUsuario($request)
        {
            $data = $request->except('_token');
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
    
            if(!Auth::user()){
                Auth::login($user);
            }

            $this->dispararEvento(Auth::user()->name, "Nome do usuário: {$request->name}", "Um novo usuário foi adicionado com permisões de {$request->autorizacao}");
        }

        public function adicionarUpsell($marca, $request)
        {
            $data = $request->all();
            $data['image_produto'] = $request->file('image_produto')->store('galeria');
            DB::beginTransaction();
                $marca->upsell()->create($data);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome: Upsell ", "Uma nova upsell foi adicionada em {$marca->nome_marca}");
        }

        public function adicionarImagen($request)
        {
            DB::beginTransaction();
                Imagen::create([
                    'imagen' => $request->file('imagen')->store('galeria')
                ]);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, 'Adicionada em: Galeria', 'Uma nova imagem foi adicionada');
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