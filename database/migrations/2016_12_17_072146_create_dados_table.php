<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados', function (Blueprint $table) {
            $table->increments('id');
           $table->integer('cliente_id')->unsigned();
            $table->string('RG');
            $table->string('numero');
            $table->string('orgao');
            $table->string('estadoCivil');
            $table->string('categoria');
            $table->string('empresa');
            $table->string('profissao');
            $table->string('renda');
            $table->timestamps();
        });
        
        Schema::table('dados', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dados');
    }
}
