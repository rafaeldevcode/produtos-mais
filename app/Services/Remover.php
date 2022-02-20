<?php

    namespace App\Services;

    use App\Models\{Marca, Comentario, Produto, Configuracao, Modal, User, Coutdown, Imagen, Upsell};
    use Illuminate\Support\Facades\DB;
    use App\Events\NovoCadastro;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;

    class Remover {

        public function removerMarca($marcaId, $nome_marca)
        {
            $marca = Marca::find($marcaId);

            DB::beginTransaction();
                $marca->comentarios->each(function(Comentario $comentario){
                    $comentario->delete();
                });
        
                $marca->produtos->each(function(Produto $produto){
                    $produto->delete();
                });
    
                $marca->configuracoes->each(function(Configuracao $configuracoes){
                    $configuracoes->delete();
                });

                $marca->modals->each(function(Modal $modal){
                    $modal->delete();
                });

                $marca->coutdown->each(function(Coutdown $coutdown){
                    $coutdown->delete();
                });

                $marca->upsell->each(function(Upsell $upsell){
                    $upsell->delete();
                });
        
                $marca->delete();
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome da marca: {$nome_marca}", "Uma marca foi removida");
        }

        public function removerProduto ($produtoId, $produto)
        {
            $nome_marca = Marca::find(Produto::find($produtoId)->marca_id)->nome_marca;

            DB::beginTransaction();
                Produto::destroy($produtoId);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome do produto: {$produto}", "Um produto foi removido da marca {$nome_marca}");
        }

        public function removerTodosProdutos($marcaId)
        {
            DB::beginTransaction();
                $marca = Marca::find($marcaId);
                $marca->produtos->each(function(Produto $produto){
                    $produto->delete();
                });
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome: Produtos", "Todos os produtos foram removidos da marca {$marca->nome_marca}");
        }

        public function removerComentario($request, $nome_cliente)
        {
            $nome_marca = Marca::find(Comentario::find($request->comentarioId)->marca_id)->nome_marca;

            DB::beginTransaction();
                Comentario::destroy($request->comentarioId);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome do cliente: $nome_cliente", "Um comentário foi removido da marca {$nome_marca}");
        }

        public function removerTodosComentarios($marcaId)
        {
            DB::beginTransaction();
                $marca = Marca::find($marcaId);
                $marca->comentarios->each(function(Comentario $comentario){
                    $comentario->delete();
                });
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome: Comentários", "Todos os comentários foram removidos da marca {$marca->nome_marca}");
        }

        public function removerModal($request)
        {
            $nome_marca = Marca::find(Modal::find($request->modalId)->marca_id)->nome_marca;

            DB::beginTransaction();
                Modal::destroy($request->modalId);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome: Modal", "Modal removido da marca {$nome_marca}");
        }

        public function removerUsuario($request, $usuario)
        {

            DB::beginTransaction();
                User::destroy($request->usuarioId);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome do usuário: {$usuario}", "Usuário removido");
        }

        public function removerUpsell($upsellId)
        {
            $nome_marca = Marca::find(Upsell::find($upsellId)->marca_id)->nome_marca;

            DB::beginTransaction();
                Upsell::destroy($upsellId);
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome: Upasell", "Upsell removida da marca {$nome_marca}");
        }

        public function removerImagen($request)
        {
            $imagen = "galeria/{$request->id}";

            DB::beginTransaction();
                if(!empty(Imagen::where('imagen', 'LIKE', $imagen)->get()[0])){
                    Imagen::destroy(Imagen::where('imagen', 'LIKE', $imagen)->get());
                }
            DB::commit();

            Storage::delete($imagen);

            $this->dispararEvento(Auth::user()->name, "Nome: Galeria", "Uma imagem foi removida da galeria");
        }

        public function removerImagenUsuario($ID, $request)
        {
            $usuario = User::find($ID);;
            DB::beginTransaction();
                $usuario->image_usuario = $request->image_usuario;
                $usuario->save();
            DB::commit();

            $this->dispararEvento(Auth::user()->name, "Nome: {$usuario->name}", "Imagem do usuário {$usuario->name} foi removida");
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