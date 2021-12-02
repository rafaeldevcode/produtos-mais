<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionarProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function(Blueprint $table){
            $table->increments('id');
            $table->string('nome_produto');
            $table->string('link_compra');
            $table->integer('quant_produto');
            $table->string('image_produto');
            $table->float('valor_unit');
            $table->float('valor_cheio');
            $table->float('valor_parcelado');
            $table->integer('parcelas');
            $table->boolean('exibir_produto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
