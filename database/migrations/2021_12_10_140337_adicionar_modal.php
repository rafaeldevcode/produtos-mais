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
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->string('produto_modal')->nullable();
            $table->string('porcentagem')->nullable();
            $table->string('preco_sem_desconto')->nullable();
            $table->string('preco_com_desconto')->nullable();
            $table->string('link_compra')->nullable();
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
