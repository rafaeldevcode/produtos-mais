<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionarMarca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nome_marca');
            $table->string('slug_marca');
            $table->string('disclaimer')->nullable();
            $table->string('logomarca')->nullable();
            $table->string('favicon')->nullable();
            $table->string('banner_1');
            $table->string('banner_2');
            $table->string('banner_3');
            $table->string('image_desc');
            $table->string('titulo_desc');
            $table->string('item_1')->nullable();
            $table->string('item_2')->nullable();
            $table->string('item_3')->nullable();
            $table->string('item_4')->nullable();
            $table->string('item_5')->nullable();
            $table->string('cor_principal');
            $table->string('cor_titulo');
            $table->string('cor_texto');
            $table->string('tagmanager')->nullable();
            $table->string('pixel')->nullable();
            $table->string('evento')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('cidade')->nullable();
            $table->string('rua')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
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
        Schema::drop('marcas');
    }
}
