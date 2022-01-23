<?php

    namespace App\Services;

    use App\Models\{Marca, Comentario, Produto, Configuracao, Modal, User, Coutdown, Imagen, Upsell};
    use Illuminate\Support\Facades\DB;
    use App\Events\NovoCadastro;
use Illuminate\Support\Facades\Storage;

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
        }

        public function removerProduto ($produtoId)
        {
            DB::beginTransaction();
                Produto::destroy($produtoId);
            DB::commit();
        }

        public function removerTodosProdutos($marcaId)
        {
            DB::beginTransaction();
                $marca = Marca::find($marcaId);
                $marca->produtos->each(function(Produto $produto){
                    $produto->delete();
                });
            DB::commit();
        }

        public function removerComentario($request)
        {
            DB::beginTransaction();
                Comentario::destroy($request->comentarioId);
            DB::commit();
        }

        public function removerTodosComentarios($marcaId)
        {
            DB::beginTransaction();
                $marca = Marca::find($marcaId);
                $marca->comentarios->each(function(Comentario $comentario){
                    $comentario->delete();
                });
            DB::commit();
        }

        public function removerModal($request)
        {
            DB::beginTransaction();
                Modal::destroy($request->modalId);
            DB::commit();
        }

        public function removerUsuario($request)
        {

            DB::beginTransaction();
                User::destroy($request->usuarioId);
            DB::commit();
        }

        public function removerUpsell($marcaId)
        {
            DB::beginTransaction();
                Upsell::destroy($marcaId);
            DB::commit();
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
        }

        public function removerImagenUsuario($ID, $request)
        {
            $usuario = User::find($ID);;
            DB::beginTransaction();
                $usuario->image_usuario = $request->image_usuario;
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