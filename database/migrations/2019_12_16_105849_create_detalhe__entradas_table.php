<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalheEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhe__entradas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entradas');
            $table->unsignedBigInteger('produtos');
            $table->float('preco_compra', 8, 2);
            $table->float('preco_venda', 8, 2);
            $table->integer('estaque_inicial');
            $table->integer('estoque_atual');
            $table->date('data_producao');
            $table->date('data_vencimento');
            $table->timestamps();

            $table->foreign('entradas')->references('id')->on('entradas')->onDelete('cascade');
            $table->foreign('produtos')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalhe__entradas');
    }
}
