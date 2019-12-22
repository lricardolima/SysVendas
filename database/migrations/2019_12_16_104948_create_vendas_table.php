<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->bigIncrements('venda_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('funcionario_id');
            $table->date('data');
            $table->string('tipo_comprovante');
            $table->string('serie');
            $table->string('correlativo');
            $table->decimal('imposto', 4, 2);
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
        Schema::dropIfExists('vendas');
    }
}
