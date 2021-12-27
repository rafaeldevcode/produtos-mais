<?php

    namespace App\Services;

    use App\Models\{Marca, Comentario, Produto, Configuracao, Modal, User, Coutdown};
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
        
                $marca->delete();
            DB::commit();

            // event(new NovoCadastro(
            //     $marca,
            //     'Marca removida!'
            // ));
        }

        public function removerProduto ($produtoId)
        {
            // $produto = Produto::find($produtoId);
            // $marca = Marca::find($produto->marca_id);

            DB::beginTransaction();
                Produto::destroy($produtoId);
            DB::commit();

            // event(new NovoCadastro(
            //     $produto->nome_produto,
            //     "Produto removido da marca {$marca->nome_marca}!"
            // ));
        }

        public function removerComentario($request)
        {
            // $comentario = Produto::find($request->comentarioId);
            // $marca = Marca::find($comentario->marca_id);

            DB::beginTransaction();
                Comentario::destroy($request->comentarioId);
            DB::commit();

            // event(new NovoCadastro(
            //     $comentario->nome_cliente,
            //     "Comentário removido da marca {$marca->nome_marca}!"
            // ));
        }

        public function removerModal($request)
        {
            // $modal = Produto::find($request->modalId);
            // $marca = Marca::find($modal->marca_id);

            DB::beginTransaction();
                Modal::destroy($request->modalId);
            DB::commit();

            // event(new NovoCadastro(
            //     'Modal',
            //     "Modal removido da marca {$marca->nome_marca}!"
            // ));
        }

        public function removerUsuario($request)
        {
            // $usuario = User::find($request->usuarioId)->name;

            DB::beginTransaction();
                User::destroy($request->usuarioId);
            DB::commit();

            // event(new NovoCadastro(
            //     $usuario,
            //     'Usuário removido de produtos +!'
            // ));
        }
    }