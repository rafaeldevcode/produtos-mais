<?php

    namespace App\Services;

    use App\Models\{Marca, Comentario, Produto, Configuracao, Modal, User, Coutdown, Upsell};
    use Illuminate\Support\Facades\DB;
    use App\Events\NovoCadastro;
    
    class Remover {

        public function removerMarca($marcaId)
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

            // $this->dispararEvento($marca, 'Marca removida!');
        }

        public function removerProduto ($produtoId)
        {
            // $produto = Produto::find($produtoId);
            // $marca = Marca::find($produto->marca_id);

            DB::beginTransaction();
                Produto::destroy($produtoId);
            DB::commit();

            // $this->dispararEvento($produto->nome_produto, "Produto removido da marca {$marca->nome_marca}!");
        }

        public function removerTodosProdutos($marcaId)
        {
            DB::beginTransaction();
                $marca = Marca::find($marcaId);
                $marca->produtos->each(function(Produto $produto){
                    $produto->delete();
                });
            DB::commit();

            // $this->dispararEvento("Comentários", "Todos os produtos removidos da marca {$marca->nome_marca}");
        }

        public function removerComentario($request)
        {
            // $comentario = Produto::find($request->comentarioId);
            // $marca = Marca::find($comentario->marca_id);

            DB::beginTransaction();
                Comentario::destroy($request->comentarioId);
            DB::commit();

            // $this->dispararEvento($comentario->nome_cliente, "Comentário removido da marca {$marca->nome_marca}!");
        }

        public function removerTodosComentarios($marcaId)
        {
            DB::beginTransaction();
                $marca = Marca::find($marcaId);
                $marca->comentarios->each(function(Comentario $comentario){
                    $comentario->delete();
                });
            DB::commit();

            // $this->dispararEvento("Comentários", "Todos os comenários removidos da marca {$marca->nome_marca}");
        }

        public function removerModal($request)
        {
            // $modal = Produto::find($request->modalId);
            // $marca = Marca::find($modal->marca_id);

            DB::beginTransaction();
                Modal::destroy($request->modalId);
            DB::commit();

            // $this->dispararEvento('Modal', "Modal removido da marca {$marca->nome_marca}!");
        }

        public function removerUsuario($request)
        {

            DB::beginTransaction();
                User::destroy($request->usuarioId);
            DB::commit();

            // $this->dispararEvento(User::find($request->usuarioId)->name, 'Usuário removido de produtos +!');
        }

        public function removerUpsell($marcaId)
        {
            // $nome_marca = Marca::find($marcaId)->nome_marca;

            DB::beginTransaction();
                Upsell::destroy($marcaId);
            DB::commit();

            // $this->dispararEvento('Upsell', "Upsell removida da marca {$nome_marca}");
        }

        private function dispararEvento(string $nome, string $mensagem):void
        {
            event(new NovoCadastro(
                $nome,
                $mensagem
            ));
        }
    }