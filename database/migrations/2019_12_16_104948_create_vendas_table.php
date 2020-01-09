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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clientes');
            $table->unsignedBigInteger('funcionarios');
            $table->date('data');
            $table->string('tipo_comprovante');
            $table->string('serie');
            $table->string('correlativo');
            $table->decimal('imposto', 4, 2);
            $table->timestamps();

            $table->foreign('clientes')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('funcionarios')->references('id')->on('funcionarios')->onDelete('cascade');
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
