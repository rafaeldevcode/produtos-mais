<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionarModal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modals', function(Blueprint $table){
            $table->increments('id');
            $table->integer('marca_id');
            $table->foreign('marca_id')->references('marcas')->on('id');
            $table->string('produto_modal');
            $table->string('porcentagem')->nullable();
            $table->string('preco_sem_desconto');
            $table->string('preco_com_desconto');
            $table->string('link_compra');
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
        Schema::drop('modals');
    }
}
