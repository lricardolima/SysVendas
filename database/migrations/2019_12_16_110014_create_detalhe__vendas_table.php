<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalheVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhe__vendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vendas');
            $table->unsignedBigInteger('detalhe_entradas');
            $table->integer('quantidade');
            $table->float('preco_venda', 8, 2);
            $table->float('desconto', 8, 2);
            $table->timestamps();

            $table->foreign('vendas')->references('id')->on('vendas')->onDelete('cascade');
            $table->foreign('detalhe_entradas')->references('id')->on('detalhe_entradas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalhe__vendas');
    }
}
