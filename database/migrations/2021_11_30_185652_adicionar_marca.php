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
        Schema::create('marca', function(Blueprint $table)
        {
            $table->string('nome_marca');
            $table->string('slug_marca');
            $table->string('logomarca');
            $table->string('favicon');
            $table->string('banner_1');
            $table->string('banner_2');
            $table->string('banner_3');
            $table->string('cor_principal');
            $table->string('pixel');
            $table->string('tagmanager');
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
        Schema::drop('marca');
    }
}
