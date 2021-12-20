<?php

    namespace App\Services;

    use App\Models\Marca;
    use Illuminate\Support\Facades\DB;

    class Adicionar {

        public function adicionarMarca($request)
        {
            DB::beginTransaction();
                $marca = Marca::create($request->all());
                $marca->configuracoes()->create();
            DB::commit();
        }

        public function adicionarProduto($request, $marca)
        {
            $produto = $request->except('id');

            DB::beginTransaction();
                $marca->produtos()->create($produto);
            DB::commit();
        }

        public function adicionarComentario($request)
        {
            $marca = Marca::find($request->id);
            $comentarios = $request->except('id');

            DB::beginTransaction();
                $marca->comentarios()->create($comentarios);
            DB::commit();
        }

        public function adicionarModal($request, $marcaId)
        {
            $marca = Marca::find($marcaId);

            DB::beginTransaction();
                $marca->modals()->create($request->all());
            DB::commit();
        }

        public function adicionarCoutdown($marcaId, $request)
        {
            $marca = Marca::find($marcaId);
            $coutdown = $request->except('_token');
    
            DB::begintransaction();
                $marca->coutdown()->create($coutdown);
            DB::commit();
        }
    }