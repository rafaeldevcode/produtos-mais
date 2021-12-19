<?php

    namespace App\Services;

    use App\Models\{Marca, Comentario, Produto, Configuracao, Modal, User};
    use Illuminate\Support\Facades\DB;
    
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
        
                $marca->delete();
            DB::commit();
        }

        public function removerProduto ($produtoId)
        {
            DB::beginTransaction();
                Produto::destroy($produtoId);
            DB::commit();
        }

        public function removerComentario($request)
        {
            DB::beginTransaction();
                Comentario::destroy($request->comentarioId);
            DB::commit();
        }

        public function removerModal($request)
        {
            DB::beginTransaction();
                Modal::destroy($request->modalId);
            DB::commit();
        }

        public function removerUsuario($request){
            DB::beginTransaction();
                User::destroy($request->usuarioId);
            DB::commit();
        }
    }