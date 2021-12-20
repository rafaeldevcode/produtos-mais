<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionarCoutdown extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coutdowns', function(Blueprint $table){
            $table->increments('id');
            $table->integer('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->string('data');
            $table->string('time');
            $table->string('texto');
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
        Schema::drop('coutdown');
    }
}
