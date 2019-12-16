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
            $table->bigIncrements('detalhe_venda_id');
            $table->unsignedBigInteger('venda_id');
            $table->unsignedBigInteger('detalhe_entrada_id');
            $table->integer('quantidade');
            $table->float('preco_venda', 8, 2);
            $table->float('desconto', 8, 2);
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
        Schema::dropIfExists('detalhe__vendas');
    }
}
