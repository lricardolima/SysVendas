<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categorias');
            $table->unsignedBigInteger('apresentacaos');
            $table->string('codigo');
            $table->string('nome', 30);
            $table->longText('descricao');
            $table->string('imagem') ->nullable();
            $table->timestamps();

            $table->foreign('categorias')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('apresentacaos')->references('id')->on('apresentacaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
