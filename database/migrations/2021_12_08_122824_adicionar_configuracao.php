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
            $table->integer('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->boolean('modal')->nullable();
            $table->boolean('icone_produto')->nullable();
            $table->boolean('empresa')->nullable();
            $table->boolean('cnpj')->nullable();
            $table->boolean('rua')->nullable();
            $table->boolean('cidade')->nullable();
            $table->boolean('atendimento')->nullable();
            $table->boolean('telefone')->nullable();
            $table->boolean('email')->nullable();
            $table->boolean('social')->nullable();
            $table->boolean('facebook')->nullable();
            $table->boolean('instagram')->nullable();
            $table->boolean('twitter')->nullable();
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
