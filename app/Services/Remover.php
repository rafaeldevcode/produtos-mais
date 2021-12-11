<?php

    namespace App\Services;

    use App\Models\{Marca, Comentario, Produto, Configuracao, Modal};
    use Illuminate\Support\Facades\DB;
    
    class Remover {

        public function removerMarca($marcaId)
        {
            $marca = Marca::find($marcaId);

            DB::transaction(function() use($marca){
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
            });
        }

        public function removerProduto ($produtoId)
        {
            DB::transaction(function() use($produtoId){
                Produto::destroy($produtoId);
            });
        }

        public function removerComentario($request)
        {
            DB::transaction(function() use($request){
                Comentario::destroy($request->comentarioId);
            });
        }

        public function removerModal($request)
        {
            DB::transaction(function() use($request){
                Modal::destroy($request->modalId);
            });
        }
    }