<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionarConfiguracao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracoes', function(Blueprint $table){
            $table->increments('id');
            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->string('modal')->nullable();
            $table->string('icone_produto')->nullable();
            $table->string('comentarios')->nullable();
            $table->string('disclaimer')->nullable();
            $table->string('empresa')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('rua')->nullable();
            $table->string('cidade')->nullable();
            $table->string('atendimento')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('social')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('coutdown')->nullable();
            $table->string('tagmanager')->nullable();
            $table->string('pixel')->nullable();
            $table->string('exibir_link')->nullable();
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
        Schema::drop('configuracoes');
    }
}
